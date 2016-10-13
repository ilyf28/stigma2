<?php

namespace Stigma\Installation;

use Illuminate\Contracts\Foundation\Application ;
use Stigma\Installation\Contracts\InstallCheckerInterface ;

class InstallManager
{
    protected $app ; 
    protected $installChecker ; 

    public function __construct(Application $app, InstallCheckerInterface $installChecker)
    {
        $this->app = $app ;
        $this->installChecker = $installChecker ;
    }

    public function getDatabaseInstallation()
    {
        return $this->app->make('Stigma\Installation\Services\DatabaseInstallation');
    }

    public function getNagiosInstallation()
    {
        return $this->app->make('Stigma\Installation\Services\NagiosInstallation');
    }

    public function getGrafanaInstallation()
    {
        return $this->app->make('Stigma\Installation\Services\GrafanaInstallation');
    } 

    public function getInfluxdbInstallation()
    {
        return $this->app->make('Stigma\Installation\Services\InfluxdbInstallation');
    }

    public function verifyToBeInstalled()
    {
        $ret = $this->installChecker->check() ;
        return $ret ;
    }
}
