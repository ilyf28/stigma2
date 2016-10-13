<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;
use Stigma\Installation\Validators\NagiosParameterValidation ;

class NagiosParameterValidationCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testPasses(UnitTester $I)
    {
        $nagiosParameterValidation = \App::make('Stigma\Installation\Validators\NagiosParameterValidation') ;

        $data = [
            'host' => 'localhost', 
            'port' => 80
            ];

        $I->assertTrue($nagiosParameterValidation->passes($data)) ;

        $I->expectedInvalidParameterException(function() use($nagiosParameterValidation) {
            $data = [
            ];

            $nagiosParameterValidation->passes($data) ;
        }); 
        

    }
}
