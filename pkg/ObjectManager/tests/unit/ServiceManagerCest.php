<?php
namespace Stigma\ObjectManager;
use Stigma\ObjectManager\UnitTester;

class ServiceManagerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testToRegister(UnitTester $I)
    {
        $data = [
            'service_name' => 'ping service' , 
            //'service_description' => 'this is ping service' ,
            'template_ids' => '1,2,3,4' , 
            'is_template' => 'N' ,
            'data' => '' 
            ];

        $serviceManager = \App::make('Stigma\ObjectManager\ServiceManager') ;
        $ret = $serviceManager->register($data) ;

        $I->assertEquals($data['service_name'] , $ret->service_name) ;
        $I->assertEquals($data['service_name'], $ret->service_description) ;
        $I->assertEquals($data['template_ids'] , $ret->template_ids) ;
        $I->assertEquals($data['is_template'] , $ret->is_template) ;
        $I->assertEquals(json_encode($data) , $ret->data) ;

        $I->seeRecord('services',array('service_name' => $data['service_name'])) ; 
    }
}
