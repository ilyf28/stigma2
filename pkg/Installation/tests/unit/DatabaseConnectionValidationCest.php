<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;
use Stigma\Installation\Validators\DatabaseConnectionValidation ;

class DatabaseConnectionValidationCest
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

        $dbConnectionValidation = new DatabaseConnectionValidation;
        $I->assertTrue($dbConnectionValidation->passes($data));


        $I->expectedPdoException(function(){ 
            $data = [
                'host'=> 'localhost',
                'dbuser'=> 'homestead', 
                'password'=>'secret2',
                'port'=>'3306', 
                'database'=> 'stigma'
            ];

            $dbConnectionValidation = new DatabaseConnectionValidation;
            $dbConnectionValidation->passes($data);
        }); 
    }
     */
}
