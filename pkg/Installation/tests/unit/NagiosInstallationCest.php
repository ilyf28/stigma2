<?php
namespace Stigma\Installation;

use Stigma\Installation\UnitTester;
use Stigma\Installation\Exceptions\InvalidParameterException;

class NagiosInstallationCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testSetup(UnitTester $I)
    { 
        $data = [
            'host' => 'localhost' , 
            'port' => '80'
            ];

        $installManager = \App::make('Stigma\Installation\InstallManager');
        $nagiosInstallation = $installManager->getNagiosInstallation() ;
        $ret = $nagiosInstallation->setup($data) ; 

        $stubFile = file_get_contents(__DIR__.'/../'.'_stubs/nagios.php') ;
        $createdFile = file_get_contents(config_path().'/nagios.php') ;

        $I->assertTrue($ret) ;
        $I->assertFileExists((config_path().'/nagios.php')) ; 
        $I->assertEquals($stubFile, $createdFile) ; 

    }

    public function testValidate(UnitTester $I)
    {
        $I->expectedInvalidParameterException(function(){ 
            $data = [
                ] ;
            $installManager = \App::make('Stigma\Installation\InstallManager');
            $nagiosInstallation = $installManager->getNagiosInstallation() ;
            $nagiosInstallation->setup($data) ;
        });
    }
}
