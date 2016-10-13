<?php 
namespace Stigma\Database\Repository;

use Illuminate\Support\ServiceProvider ;

class RepositoryServiceProvider extends ServiceProvider
{ 
    public function register()
    { 
        $this->app->bind('Stigma\Database\Repository\Contracts\ModelFactoryInterface','Stigma\Database\Repository\ModelFactory') ;
    }
} 
