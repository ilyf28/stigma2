<?php

Route::group(array('prefix'=>'admin'),function(){
    Route::get('commands/generate', '\App\Http\Controllers\Admin\CommandController@generate') ;
    Route::get('hosts/generate', '\App\Http\Controllers\Admin\HostController@generate') ;
    Route::get('services/generate', '\App\Http\Controllers\Admin\ServiceController@generate') ;
    Route::get('dashboard/nagios_restart', '\App\Http\Controllers\Admin\DashboardController@nagiosRestart') ;

    Route::resource('hosts','\App\Http\Controllers\Admin\HostController');
    Route::resource('services','\App\Http\Controllers\Admin\ServiceController');
    Route::resource('commands','\App\Http\Controllers\Admin\CommandController');
    Route::resource('dashboard','\App\Http\Controllers\Admin\DashboardController'); 

    Route::get('configuration/provisioning/request',array('as' => 'admin.configuration.provisioning.request','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@provisioningRequest')) ;
    Route::get('configuration/system',array('as' => 'admin.configuration.system','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@system')) ;
    Route::get('configuration/provisioning',array('as' => 'admin.configuration.provisioning','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@provisioning')) ;
    Route::put('configuration/nagios/update',array('as' => 'admin.configuration.nagios.update','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@nagiosUpdate')) ;

    Route::put('configuration/grafana/update',array('as' => 'admin.configuration.grafana.update','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@grafanaUpdate')) ;
    Route::put('configuration/influxdb/update',array('as' => 'admin.configuration.influxdb.update','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@influxdbUpdate')) ;
    Route::put('configuration/provisioning/update',array('as' => 'admin.configuration.provisioning.update','uses'=>'\App\Http\Controllers\Admin\ConfigurationController@provisioningUpdate')) ;

});
