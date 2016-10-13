<?php
namespace Stigma\Installation;

use Stigma\Installation\Generators\DatabaseFileGenerator ;

class DatabaseFileGeneratorTest extends \Codeception\TestCase\Test
{
    use \Codeception\Specify;
    /**
     * @var \Stigma\Installation\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /*
    // tests
    public function testGenerateFile()
    { 
        $data = [
            'host'=> 'localhost',
            'dbuser'=> 'homestead', 
            'password'=>'secret',
            'port'=>'3306', 
            'database'=> 'stigma'
        ];

        $fileGenerator = new DatabaseFileGenerator(__DIR__.'../../../src/tmpl/database.php',config_path().'/database.php') ; 
        $fileGenerator->make($data) ;

        $stubFile = file_get_contents(__DIR__.'/../'.'_stubs/database.php') ;
        $createdDbFile = file_get_contents(config_path().'/database.php') ;

        $this->assertFileExists((config_path().'/database.php')) ; 
        $this->assertEquals($stubFile, $createdDbFile) ; 
    }
     */
}
