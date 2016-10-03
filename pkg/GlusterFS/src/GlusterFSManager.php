<?php
namespace Stigma\GlusterFS;

use Illuminate\Contracts\Foundation\Application;

class GlusterFSManager
{ 
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getClusterGenerator()
    {
        return $this->app->make('Stigma\GlusterFS\Generators\ClusterGenerator');
    }

    public function getVolumeGenerator()
    {
        return $this->app->make('Stigma\GlusterFS\Generators\VolumeGenerator');
    }

    public function execute($data)
    {
        try {
            $command = 'sudo gdeploy -c '.$data.' 2>&1';
            $output = [];
            $return = 0;

            exec($command, $output, $return);
        } catch (Exception $e) {
            
        }
    }

}