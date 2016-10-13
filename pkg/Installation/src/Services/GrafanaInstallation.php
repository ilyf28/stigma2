<?php
namespace Stigma\Installation\Services ;

use Stigma\Installation\Contracts\InstallationInterface ;
use Stigma\Installation\Services\Installation ; 
use Stigma\Installation\Contracts\ConfigFileGenerator ;

class GrafanaInstallation extends Installation implements InstallationInterface 
{
    protected $validators  ;
    protected $fileGenerator ;
    protected $configurationTempFile ;

    public function __construct($validators = array(), ConfigFileGenerator $fileGenerator)
    { 
        $this->validators = $validators ;
        $this->fileGenerator = $fileGenerator ;
    }

    public function setup($data)
    { 
        if(! $this->validate($data)){
            return false ;
        }
        
        $this->fileGenerator->make($data) ;
    }
}
