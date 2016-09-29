<?php

Route::group(array('prefix'=>'admin', 'middleware' => 'auth'), function() {
    Route::get('hosts/generate', '\App\Http\Controllers\Admin\HostController@generate');
    Route::get('services/generate', '\App\Http\Controllers\Admin\ServiceController@generate');
    Route::get('contacts/generate', '\App\Http\Controllers\Admin\ContactController@generate');
    Route::get('commands/generate', '\App\Http\Controllers\Admin\CommandController@generate');
    Route::get('timeperiods/generate', '\App\Http\Controllers\Admin\TimeperiodController@generate');

    Route::get('dashboard/refresh', '\App\Http\Controllers\Admin\DashboardController@refresh');
    Route::get('dashboard/nagios_restart', '\App\Http\Controllers\Admin\DashboardController@nagiosRestart');
    
    Route::resource('dashboard','\App\Http\Controllers\Admin\DashboardController'); 
    Route::resource('hosts', '\App\Http\Controllers\Admin\HostController');
    Route::resource('hostgroups', '\App\Http\Controllers\Admin\HostGroupController');
    Route::resource('services','\App\Http\Controllers\Admin\ServiceController');
    Route::resource('servicegroups','\App\Http\Controllers\Admin\ServiceGroupController');
    Route::resource('commands','\App\Http\Controllers\Admin\CommandController');
    Route::resource('contacts','\App\Http\Controllers\Admin\ContactController');
    Route::resource('contactgroups','\App\Http\Controllers\Admin\ContactGroupController');
    Route::resource('timeperiods','\App\Http\Controllers\Admin\TimeperiodController');

    Route::resource('glusterfs/clusters', '\App\Http\Controllers\Admin\GlusterfsClusterController');
    // Route::get('glusterfs/clusters', array('as' => 'admin.glusterfs.clusters.index', 'uses'=>'\App\Http\Controllers\Admin\GlusterfsClusterController@index'));
    // Route::get('glusterfs/clusters/create', array('as' => 'admin.glusterfs.clusters.create', 'uses'=>'\App\Http\Controllers\Admin\GlusterfsClusterController@create'));
    // Route::post('glusterfs/clusters', array('as' => 'admin.glusterfs.clusters.store', 'uses'=>'\App\Http\Controllers\Admin\GlusterfsClusterController@store'));
    // Route::get('glusterfs/clusters/{id}/edit', array('as' => 'admin.glusterfs.clusters.edit', 'uses'=>'\App\Http\Controllers\Admin\GlusterfsClusterController@edit'));
    // Route::put('glusterfs/clusters/{id}', array('as' => 'admin.glusterfs.clusters.update', 'uses'=>'\App\Http\Controllers\Admin\GlusterfsClusterController@update'));
    // Route::delete('glusterfs/clusters/{id}', array('as' => 'admin.glusterfs.clusters.destroy', 'uses'=>'\App\Http\Controllers\Admin\GlusterfsClusterController@destroy'));

    Route::get('system/configuration', array('as' => 'admin.system.configuration', 'uses'=>'\App\Http\Controllers\Admin\SystemController@configuration'));
    Route::put('system/configuration/nagios/update',
        array('as' => 'admin.system.configuration.nagios.update', 'uses'=>'\App\Http\Controllers\Admin\SystemController@nagiosUpdate'));
    Route::put('system/configuration/database/update',
        array('as' => 'admin.system.configuration.database.update', 'uses'=>'\App\Http\Controllers\Admin\SystemController@databaseUpdate'));
    Route::put('system/configuration/grafana/update',
        array('as' => 'admin.system.configuration.grafana.update', 'uses'=>'\App\Http\Controllers\Admin\SystemController@grafanaUpdate'));
    Route::put('system/configuration/influxdb/update',
        array('as' => 'admin.system.configuration.influxdb.update', 'uses'=>'\App\Http\Controllers\Admin\SystemController@influxdbUpdate'));

    Route::get('system/account', array('as' => 'admin.system.account', 'uses'=>'\App\Http\Controllers\Admin\SystemController@getAccount'));
    Route::post('system/account/changePassword',
        array('as' => 'admin.system.account.changePassword', 'uses'=>'\App\Http\Controllers\Admin\SystemController@changePassword'));

});
