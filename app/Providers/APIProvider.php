<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class APIProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->app->bind('App\Interfaces\GrafanaInterface', 'App\APIs\Grafana');
		$this->app->bind('App\Interfaces\NagiosInterface', 'App\APIs\Nagios');
	}

}
