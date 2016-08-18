<?php
namespace Stigma\ObjectManager ;

use Illuminate\Support\ServiceProvider ;

class ObjectManagerServiceProvider extends ServiceProvider 
{
    public function boot()
    {
    }

    public function register()
    {
        $this->registerHostManager();
        $this->registerServiceManager();
        $this->registerCommandManager();
    }

    private function registerHostManager()
    {
        $this->app->bind('Stigma\ObjectManager\HostManager', function() {
            return new HostManager(
                \App::make('Stigma\ObjectManager\Repositories\HostRepository')
            );
        });
    }

    private function registerServiceManager()
    {
        $this->app->bind('Stigma\ObjectManager\ServiceManager', function() {
            return new ServiceManager(
                \App::make('Stigma\ObjectManager\Repositories\ServiceRepository')
            );
        });
    }

    private function registerCommandManager()
    {
        $this->app->bind('Stigma\ObjectManager\CommandManager', function() {
            return new CommandManager(
                \App::make('Stigma\ObjectManager\Repositories\CommandRepository')
            );
        });
    }

    private function registerContactManager()
    {
        $this->app->bind('Stigma\ObjectManager\ContactManager', function() {
            return new ContactManager(
                \App::make('Stigma\ObjectManager\Repositories\ContactRepository')
            );
        });
    }

    private function registerTimeperiodManager()
    {
        $this->app->bind('Stigma\ObjectManager\TimeperiodManager', function() {
            return new TimeperiodManager(
                \App::make('Stigma\ObjectManager\Repositories\TimeperiodRepository')
            );
        });
    }

}
