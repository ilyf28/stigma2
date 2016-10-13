<?php

namespace spec\Stigma\Installation\Services;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Stigma\Installation\Validators\DatabaseValidation ;
use Stigma\Installation\Contracts\ConfigFileGenerator ;

class DatabaseInstallationSpec extends ObjectBehavior
{
    protected $data = array(
        'host' => 'localhost',
        'dbuser' => 'homestead', 
        'password' => 'secret', 
        'database' => 'homestead',
        'port' => '3306'
    );

    function it_is_initializable()
    {
        $this->shouldHaveType('Stigma\Installation\Services\DatabaseInstallation');
    }

    public function let(ConfigFileGenerator $fileGenerator)
    {
        $this->beConstructedWith([], $fileGenerator);
    } 
}
