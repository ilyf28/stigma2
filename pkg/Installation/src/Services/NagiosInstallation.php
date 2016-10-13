<?php
namespace Stigma\Installation\Services ;

use Stigma\Installation\Contracts\InstallationInterface ;
use Stigma\Installation\Generators\NagiosFileGenerator ;
use Stigma\Installation\Services\Installation ;

class NagiosInstallation extends Installation implements InstallationInterface
{
    protected $fileGenerator ;
    protected $validators ;

    public function __construct(array $validators , NagiosFileGenerator $fileGenerator)
    {
        $this->fileGenerator = $fileGenerator ;
        $this->validators = $validators ;
    }

    public function setup($data)
    {
        if(! $this->validate($data)){
            return false ;
        } 

        $this->fileGenerator->make($data) ;
        return true ;
    }
}
