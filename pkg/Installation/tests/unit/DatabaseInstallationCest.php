<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;
use Stigma\Installation\Exceptions\InvalidParameterException;

class DatabaseInstallationCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    /*
    // tests
    public function testValidate(UnitTester $I)
    {
        $data = [
            'host'=> 'localhost',
            'dbuser'=> 'homestead', 
            'password'=>'secret',
            'port'=>'3306', 
            'database'=> 'stigma'
        ];

        $installManager = \App::make('Stigma\Installation\InstallManager');
        $databaseInstallation = $installManager->getDatabaseInstallation() ;

        $I->assertTrue($databaseInstallation->setup($data)) ;

        $I->expectedInvalidParameterException( function() use($data,$databaseInstallation){ 
            $tmpData = $data ;
            unset($tmpData['host']);
            $databaseInstallation->setup($tmpData);
        }) ; 

        $I->expectedInvalidParameterException(function() use($data,$databaseInstallation){ 
            $tmpData = $data ;
            unset($tmpData['dbuser']);
            $databaseInstallation->setup($tmpData);
        }) ; 

        $I->expectedInvalidParameterException( function() use($data,$databaseInstallation){ 
            $tmpData = $data ;
            unset($tmpData['password']);
            $databaseInstallation->setup($tmpData);
        }) ; 

        $I->expectedInvalidParameterException(function() use($data,$databaseInstallation){ 
            $tmpData = $data ;
            unset($tmpData['port']);
            $databaseInstallation->setup($tmpData);
        }) ; 
    }

    public function testGenerationConfiguration(UnitTester $I)
    {
        $installManager = \App::make('Stigma\Installation\InstallManager');
        $databaseInstallation = $installManager->getDatabaseInstallation() ;

        $data = [
            'host'=> 'localhost',
            'dbuser'=> 'homestead', 
            'password'=>'secret',
            'port'=>'3306', 
            'database'=> 'stigma'
        ];

        $databaseInstallation->setup($data);

    }*/
}
