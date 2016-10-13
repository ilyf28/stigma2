<?php
namespace Stigma\Installation\Services ;

use Stigma\Installation\Validators\DatabaseValidation ;
use Stigma\Installation\Contracts\ConfigFileGenerator ;
use Stigma\Installation\Contracts\InstallationInterface ;
use Stigma\Installation\Services\Installation ;

class DatabaseInstallation extends Installation implements InstallationInterface
{
    protected $validators  ;
    protected $fileGenerator ;
    protected $configurationTempFile ;

    public function __construct($validators = array(), ConfigFileGenerator $fileGenerator)
    { 
        $this->validators = $validators ;
        $this->fileGenerator = $fileGenerator ;
    }
    
    public function setup($value)
    {
        if(! $this->validate($value)){
            return false ;
        } 

        return $this->fileGenerator->make($value) ; 
    } 
}
