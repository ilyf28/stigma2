<?php
namespace Stigma\Installation\Services ;

use Stigma\Installation\Contracts\InstallCheckerInterface ;

class InstallChecker implements InstallCheckerInterface
{
    protected $configPath ;

    public function __construct($configPath)
    {
        $this->configPath = $configPath ;
    }

    public function check()
    {
        foreach(['nagios','grafana','influxdb']  as $fileName) { 
            if(! file_exists($this->configPath."/$fileName.php")) {
                return false ;
            }
        } 
        return true ;
    }
}
