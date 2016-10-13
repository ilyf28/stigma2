<?php
namespace Stigma\ObjectManager;
use Stigma\ObjectManager\UnitTester;

class HostManagerCest
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
            'host_name' => 'localhost' , 
            //'description' => 'localhost-desc' ,
            //'template_name' => 'localhost_tmpl' , 
            //'alias' => 'localhost_alias' ,
            'template_ids' => '1,2,3' ,
            'command_id' => 1 ,
            'command_argument' => 'abc' ,
            'service_ids' => '1,2,3' ,
            'is_template' => 'N' ,
            'address' => '127.0.0.1' ,
            'data' => '' 
            ];

        $hostManager = \App::make('Stigma\ObjectManager\HostManager') ;
        $ret = $hostManager->register($data) ;

        $I->assertEquals($data['host_name'] , $ret->host_name) ;
        //$I->assertEquals($data['description'] , $ret->description) ;
        //$I->assertEquals($data['template_name'] , $ret->template_name) ;
        //$I->assertEquals($data['alias'] , $ret->alias) ;
        $I->assertEquals($data['address'] , $ret->address) ;
        $I->assertEquals($data['is_template'] , $ret->is_template) ;
        $I->assertEquals($data['template_ids'] , $ret->template_ids) ;
        $I->assertEquals($data['command_id'] , $ret->command_id) ;
        $I->assertEquals($data['command_argument'] , $ret->command_argument) ;
        $I->assertEquals($data['service_ids'] , $ret->service_ids) ;
        $I->assertEquals(json_encode($data) , $ret->data) ;

        $I->seeRecord('hosts',array('host_name' => $data['host_name'])) ;
    }
}
