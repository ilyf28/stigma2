<?php
namespace Stigma\GlusterFS;

use Illuminate\Support\ServiceProvider;

use Stigma\GlusterFS\GlusterFSManager;

class GlusterFSServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->registerGlusterFSManager();
    }

    private function registerGlusterFSManager()
    {
        $this->app->bind('Stigma\GlusterFS\GlusterFSManager', function() {
            return new GlusterFSManager($this->app);
        });
    }
}
