<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;

class InfluxdbInstallationCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function tryToSetup(UnitTester $I)
    { 
        if(file_exists(config_path().'/influxdb.php')){
            $I->deleteFile(config_path().'/influxdb.php') ;
        }

        $data = [
            'host' => 'localhost' , 
            'database' => 'stigma',
            'username' => 'username',
            'password' => 'password' ,
            ];

        $installManager = \App::make('Stigma\Installation\InstallManager');
        $influxdbInstallation = $installManager->getInfluxdbInstallation() ;
        $ret = $influxdbInstallation->setup($data) ; 

        $stubFile = file_get_contents(__DIR__.'/../'.'_stubs/influxdb.php') ;
        $createdFile = file_get_contents(config_path().'/influxdb.php') ; 

        $I->assertTrue($ret) ;
        $I->assertFileExists((config_path().'/influxdb.php')) ; 
        $I->assertEquals($stubFile, $createdFile) ; 
    }

    public function testToFailWhenParametersAreInvalid(UnitTester $I)
    {
        $I->expectedInvalidParameterException(function(){ 
            $data = [
                'host' => 'localhost'
                ] ;
            $installManager = \App::make('Stigma\Installation\InstallManager');
            $influxdbInstallation = $installManager->getInfluxdbInstallation() ;
            $influxdbInstallation->setup($data) ;
        }); 
    }
}
