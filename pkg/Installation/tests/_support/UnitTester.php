<?php
namespace Stigma\Installation;

use Stigma\Installation\Exceptions\InvalidParameterException ;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
*/
class UnitTester extends \Codeception\Actor
{
    use _generated\UnitTesterActions;

   /**
    * Define custom actions here
    */

    public function expectedInvalidParameterException($fn)
    {
        try {
            $fn() ;
            $this->fail("Expected exception is InvalidParameterException "); 
        } catch(InvalidParameterException $e) { 
            $this->assertTrue(true);
        } catch( \Exception $e) {
            $this->fail("Expected exception is InvalidParameterException,But actual exceptions is ".get_class($e) ); 
        }
    }

    public function expectedPdoException($fn)
    {
        try {
            $fn() ;
            $this->fail("Expected exception is PDOException "); 
        } catch(\PDOException $e) { 
            $this->assertTrue(true);
        } catch (\Exception $e){
            $this->fail("Expected exception is PDOException "); 
        }
    }
}
