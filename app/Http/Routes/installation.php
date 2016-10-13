<?php

Route::get('installation',array('as'=>'installation', 'uses'=>'\App\Http\Controllers\InstallationController@index')) ;

Route::group(array(), function(){
    Route::get('install/database', array('as'=>'installation::database.view', 'uses' => 'InstallationController@installDatabaseView'));
    Route::get('install/nagios', array('as'=>'installation::nagios.view', 'uses' => 'InstallationController@installNagiosView'));
    Route::get('install/grafana', array('as'=>'installation::grafana.view', 'uses' => 'InstallationController@installGrafanaView'));
    Route::get('install/influxdb', array('as'=>'installation::influxdb.view', 'uses' => 'InstallationController@installInfluxdbView'));

    
    Route::post('install/database/setup', array('as'=>'installation::database.install', 'uses' => 'InstallationController@installDatabase'));
    Route::post('install/nagios/setup', array('as'=>'installation::nagios.install', 'uses' => 'InstallationController@installNagios'));
    Route::post('install/grafana/setup', array('as'=>'installation::grafana.install', 'uses' => 'InstallationController@installGrafana'));
    Route::post('install/influxdb/setup', array('as'=>'installation::influxdb.install', 'uses' => 'InstallationController@installInfluxdb'));
});
