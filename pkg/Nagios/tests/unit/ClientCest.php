<?php
namespace Stigma\Nagios;
use Stigma\Nagios\UnitTester;

use Stigma\Nagios\Client ;

class ClientCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testToGenerateCommand(UnitTester $I)
    { 
        $client = \App::make('Stigma\Nagios\Client'); 
        
        $data = [] ;
        $response = $client->generateCommand($data) ; 

        $I->assertEquals('200',$response) ; 
    } 
    
    public function testToRestart(UnitTester $I)
    {
        $client = \App::make('Stigma\Nagios\Client'); 

        $ret = $client->requestToRestart() ;

        $I->assertTrue(true,$ret) ;
    } 
    
    public function testToGenerateHost(UnitTester $I)
    {
        $client = \App::make('Stigma\Nagios\Client'); 

        $data = [] ;
        $response = $client->generateHost($data) ; 

        $I->assertEquals('200',$response) ; 
    }


    public function testToGenerateService(UnitTester $I)
    {
        $client = \App::make('Stigma\Nagios\Client'); 

        $data = [] ;
        $response = $client->generateService($data) ; 

        $I->assertEquals('200',$response) ; 
    }
}
