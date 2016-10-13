<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;

class GrafanaInstallationCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        
        $data = [
            'host'=> 'localhost',
            'username'=> 'grafana', 
            'password'=>'secret',
            'port'=>'80'
        ];

        $installManager = \App::make('Stigma\Installation\InstallManager');
        $grafanaInstallation = $installManager->getGrafanaInstallation() ; 

        $grafanaInstallation->setup($data) ;

        $I->assertFileExists(config_path().'/grafana.php') ;
        $generatedFile = file_get_contents(config_path().'/grafana.php') ;
        $comparedFile = file_get_contents(__DIR__.'/../_stubs/grafana.php') ;

        $I->assertEquals($comparedFile,$generatedFile ); 
    }

    public function testToFailWhenParametersAreInvalid(UnitTester $I)
    {
        $I->expectedInvalidParameterException(function(){ 
            $data = [
                'host' => 'localhost'
                ] ;
            $installManager = \App::make('Stigma\Installation\InstallManager');
            $grafanaInstallation = $installManager->getGrafanaInstallation() ;
            $grafanaInstallation->setup($data) ;
        }); 
    }

}
