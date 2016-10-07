<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('prefix' => 'api/v1', 'middleware' => 'auth'), function() {
    // Route::get('dashboard/systemstatus', 'DashboardController@systemstatus');
    Route::get('dashboard/hoststatus', 'DashboardController@hoststatus');
    Route::get('dashboard/servicestatus', 'DashboardController@servicestatus');
    Route::get('dashboard/glusterfsstatus', 'DashboardController@glusterfsstatus');
    Route::get('dashboard/event/type/{type}/starttime/{starttime}/endtime/{endtime}', 'DashboardController@event');
    Route::get('report/graph/{dashboard}', 'ReportController@show');
    Route::get('server/hosts/status/{status?}', 'ServerHostsController@index');
    Route::get('server/hosts/name/{name}', 'ServerHostsController@show');
    Route::get('server/services/status/{status?}', 'ServerServicesController@index');
    Route::get('server/services/name/{name}/servicedescription/{servicedescription}', 'ServerServicesController@show');

    Route::get('glusterfs/clusters', 'GlusterFSController@getAllClusters');
    Route::get('glusterfs/clusters/id/{id}', 'GlusterFSController@getClusterStatus');
});

Route::get('/', ['middleware' => 'auth', function () {
    return view('index');
}]);


foreach(File::allFiles(__DIR__.'/Routes') as $partial)
{
    require_once $partial->getPathname();
} 


Route::get('/auth/login','\App\Http\Controllers\Auth\AuthController@getLogin');
Route::get('/auth/register','\App\Http\Controllers\Auth\AuthController@getRegister');
Route::get('/auth/reset','\App\Http\Controllers\Auth\AuthController@getReset');
Route::post('/auth/register','\App\Http\Controllers\Auth\AuthController@postRegister');
Route::post('/auth/login','\App\Http\Controllers\Auth\AuthController@postLogin');
Route::get('/auth/logout','\App\Http\Controllers\Auth\AuthController@getLogout');
