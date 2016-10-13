<?php
namespace Stigma\Installation;
use Stigma\Installation\UnitTester;
use Stigma\Installation\Services\InstallChecker ;

class InstallCheckerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function testToCheck(UnitTester $I)
    {
        $installChecker = new InstallChecker(__DIR__.'/../_tmp') ; 
        $ret = $installChecker->check() ;

        $I->assertTrue($ret) ;
    }

    
    public function testToCheckWhenFilesAreNotExisted(UnitTester $I)
    {
        $installChecker = new InstallChecker(__DIR__.'/../_tmps') ; 
        $ret = $installChecker->check() ;

        $I->assertFalse($ret) ;
    }
}
