<?php
namespace Stigma\Installation\Services ;

use Stigma\Installation\Contracts\InstallationInterface ;
use Stigma\Installation\Services\Installation ; 
use Stigma\Installation\Contracts\ConfigFileGenerator ;
use Stigma\Installation\Generators\InfluxdbFileGenerator ;

class InfluxdbInstallation extends Installation implements InstallationInterface 
{
    protected $fileGenerator ;
    protected $validators ;

    public function __construct(array $validators , InfluxdbFileGenerator $fileGenerator)
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
