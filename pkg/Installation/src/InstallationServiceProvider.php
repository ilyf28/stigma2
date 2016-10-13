<?php
namespace Stigma\Installation ;

use Illuminate\Support\ServiceProvider;
use Stigma\Installation\Validators\DatabaseValidation ;
use Stigma\Installation\Generators\DatabaseFileGenerator ;
use Stigma\Installation\InstallManager ;
use Stigma\Installation\Services\InstallChecker ;

class InstallationServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->registerInstallManager() ;
        $this->registerDatabaseInstallation();
        $this->registerNagiosInstallation(); 
        $this->registerGrafanaInstallation(); 
        $this->registerInfluxdbInstallation() ;
        $this->registerProvisioning() ;
    }

    private function registerInstallManager()
    {
        $this->app->bind('Stigma\Installation\InstallManager',function(){
            return new InstallManager($this->app,new InstallChecker(config_path()));
        });
    }

    private function registerProvisioning()
    {
        $this->app->bind('Stigma\Installation\Generators\ProvisioningFileGenerator', function(){
            return new \Stigma\Installation\Generators\ProvisioningFileGenerator(
                __DIR__.'/tmpl/provisioning.php', 
                config_path().'/provisioning.php') ;
        }) ; 
    }


    private function registerNagiosInstallation()
    {
        $this->app->bind('Stigma\Installation\Generators\NagiosFileGenerator', function(){
            return new \Stigma\Installation\Generators\NagiosFileGenerator(
                __DIR__.'/tmpl/nagios.php', 
                config_path().'/nagios.php') ;
        }) ;


        $this->app->bind('Stigma\Installation\Services\NagiosInstallation',function(){
            return new \Stigma\Installation\Services\NagiosInstallation(
                [
                    \App::make('Stigma\Installation\Validators\NagiosParameterValidation'), 
                ],
                \App::make('Stigma\Installation\Generators\NagiosFileGenerator') 
            );
        });

    }

    private function registerDatabaseInstallation()
    {
        $this->app->bind('Stigma\Installation\Generators\DatabaseFileGenerator', function(){
            return new \Stigma\Installation\Generators\DatabaseFileGenerator(
                __DIR__.'/tmpl/database.php', 
                config_path().'/database.php') ;
        }) ;

        $this->app->bind('Stigma\Installation\Services\DatabaseInstallation',function(){
            return new \Stigma\Installation\Services\DatabaseInstallation(
                [
                    \App::make('Stigma\Installation\Validators\DatabaseValidation'), 
                    \App::make('Stigma\Installation\Validators\DatabaseConnectionValidation')
                ],
                \App::make('Stigma\Installation\Generators\DatabaseFileGenerator') 
            );
        });

    }

    private function registerGrafanaInstallation()
    {
        $this->app->bind('Stigma\Installation\Generators\GrafanaFileGenerator', function(){
            return new \Stigma\Installation\Generators\GrafanaFileGenerator(
                __DIR__.'/tmpl/grafana.php', 
                config_path().'/grafana.php') ;
        }) ;

        $this->app->bind('Stigma\Installation\Services\GrafanaInstallation',function(){
            return new \Stigma\Installation\Services\GrafanaInstallation(
                [ 
                    \App::make('Stigma\Installation\Validators\GrafanaParameterValidation'), 
                ],
                \App::make('Stigma\Installation\Generators\GrafanaFileGenerator') 
            );
        });
    }

    private function registerInfluxdbInstallation()
    {
        $this->app->bind('Stigma\Installation\Generators\InfluxdbFileGenerator', function(){
            return new \Stigma\Installation\Generators\InfluxdbFileGenerator(
                __DIR__.'/tmpl/influxdb.php', 
                config_path().'/influxdb.php') ;
        }) ;


        $this->app->bind('Stigma\Installation\Services\InfluxdbInstallation',function(){
            return new \Stigma\Installation\Services\InfluxdbInstallation(
                [
                    \App::make('Stigma\Installation\Validators\InfluxdbParameterValidation'), 
                ],
                \App::make('Stigma\Installation\Generators\InfluxdbFileGenerator') 
            );
        });
    }
}
