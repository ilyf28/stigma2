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
        $this->registerHostgroupManager();
        $this->registerServiceManager();
        $this->registerServicegroupManager();
        $this->registerCommandManager();
        $this->registerContactManager();
        $this->registerContactgroupManager();
        $this->registerTimeperiodManager();
    }

    private function registerHostManager()
    {
        $this->app->bind('Stigma\ObjectManager\HostManager', function() {
            return new HostManager(
                \App::make('Stigma\ObjectManager\Repositories\HostRepository')
            );
        });
    }

    private function registerHostgroupManager()
    {
        $this->app->bind('Stigma\ObjectManager\HostgroupManager', function() {
            return new HostgroupManager(
                \App::make('Stigma\ObjectManager\Repositories\HostgroupRepository')
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

    private function registerServicegroupManager()
    {
        $this->app->bind('Stigma\ObjectManager\ServicegroupManager', function() {
            return new ServicegroupManager(
                \App::make('Stigma\ObjectManager\Repositories\ServicegroupRepository')
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

    private function registerContactgroupManager()
    {
        $this->app->bind('Stigma\ObjectManager\ContactgroupManager', function() {
            return new ContactgroupManager(
                \App::make('Stigma\ObjectManager\Repositories\ContactgroupRepository')
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
