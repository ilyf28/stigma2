<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;
use Stigma\Installation\Generators\NagiosFileGenerator ;

class NagiosFileGeneratorCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testFileGenerate(UnitTester $I)
    {
        $data = [
            'host'=> 'localhost',
            'port'=>'80'
        ];

        $fileGenerator = new NagiosFileGenerator(__DIR__.'../../../src/tmpl/nagios.php',config_path().'/nagios.php') ; 
        $fileGenerator->make($data) ;

        $stubFile = file_get_contents(__DIR__.'/../'.'_stubs/nagios.php') ;
        $createdDbFile = file_get_contents(config_path().'/nagios.php') ;

        $I->assertFileExists((config_path().'/nagios.php')) ; 
        $I->assertEquals($stubFile, $createdDbFile) ; 
    }
}
