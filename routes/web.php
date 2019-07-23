<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::group(['prefix'=>'user','middleware' => 'auth'], function(){
	Route::get('register','Auth\RegisterController@register')->middleware('monitoring');
	Route::get('','UserController@index')->middleware('monitoring');
	Route::get('create','Auth\RegisterController@showRegistrationForm')->middleware('monitoring');
	Route::get('{user}/edit','UserController@edit');
	Route::post('{user}/update','UserController@update')->middleware('monitoring');
	Route::post('delete', 'UserController@delete')->middleware('monitoring');
});

Route::group(['prefix'=>'gerbang','middleware' => 'auth'], function(){
	Route::get('','GerbangController@index')->middleware('monitoring');
	Route::get('create','GerbangController@create')->middleware('monitoring');
	Route::post('create','GerbangController@store')->middleware('monitoring');
	Route::get('{gerbang}/edit','GerbangController@edit')->middleware('monitoring');
	Route::post('{gerbang}/update','GerbangController@update')->middleware('monitoring');
	Route::post('delete', 'GerbangController@destroy')->middleware('monitoring');
});

Route::group(['prefix'=>'gardu','middleware' => 'auth'], function(){
	Route::get('','GarduController@index')->middleware('monitoring');
	Route::get('create','GarduController@create')->middleware('monitoring');
	Route::post('create','GarduController@store')->middleware('monitoring');
	Route::get('{gardu}/edit','GarduController@edit')->middleware('monitoring');
	Route::post('{gardu}/update','GarduController@update')->middleware('monitoring');
	Route::post('delete', 'GarduController@destroy')->middleware('monitoring');
});

Route::group(['prefix'=>'peralatan','middleware' => 'auth'], function(){
	Route::get('','PeralatanController@index')->middleware('monitoring');
	Route::get('create','PeralatanController@create')->middleware('monitoring');
	Route::post('create','PeralatanController@store')->middleware('monitoring');
	Route::get('{peralatan}/edit','PeralatanController@edit')->middleware('monitoring');
	Route::post('{peralatan}/update','PeralatanController@update')->middleware('monitoring');
	Route::post('delete', 'PeralatanController@destroy')->middleware('monitoring');
});

Route::group(['prefix'=>'petugas','middleware' => 'auth'], function(){
	Route::get('','PetugasController@index')->middleware('monitoring');
	Route::get('create','PetugasController@create')->middleware('monitoring');
	Route::post('create','PetugasController@store')->middleware('monitoring');
	Route::get('{petugas}/edit','PetugasController@edit')->middleware('monitoring');
	Route::post('{petugas}/update','PetugasController@update')->middleware('monitoring');
	Route::post('delete', 'PetugasController@destroy')->middleware('monitoring');
});

Route::group(['prefix'=>'pencatatan','middleware' => 'auth'], function(){
	Route::get('','TransaksiPencatatanController@index')->middleware('monitoring');
	Route::get('create','TransaksiPencatatanController@create')->middleware('monitoring');
	Route::post('create','TransaksiPencatatanController@store')->middleware('monitoring');
	Route::get('{pencatatan}/edit','TransaksiPencatatanController@edit')->middleware('monitoring');
	Route::post('{pencatatan}/update','TransaksiPencatatanController@update')->middleware('monitoring');
	Route::post('delete', 'TransaksiPencatatanController@destroy')->middleware('monitoring');
});





Route::group(['prefix'=>'admin-services'], function(){
	Route::get('','AdminServiceController@index')->middleware('monitoring');
	Route::get('create','AdminServiceController@create')->middleware('monitoring');
	Route::post('create', 'AdminServiceController@store')->middleware('monitoring');
	Route::get('{adminService}/edit','AdminServiceController@edit')->middleware('monitoring');
	Route::post('{adminService}/update','AdminServiceController@update')->middleware('monitoring');
	Route::post('report','AdminServiceController@postRepost')->middleware('monitoring');
	Route::get('report','ServicePointLeaderController@report')->middleware('monitoring');
	Route::get('/schedule','AdminServiceController@schedule')->middleware('monitoring');
	Route::get('/completed','AdminServiceController@completed')->middleware('monitoring');
	Route::get('{adminService}/detail-completed','AdminServiceController@detailServicesCompleted')->middleware('monitoring');
});

Route::group(['prefix'=>'service-point-leader'], function(){
	Route::get('/assign-services','ServicePointLeaderController@index')->middleware('spl');
	Route::get('{servicepointleader}/edit','ServicePointLeaderController@edit')->middleware('spl');
	Route::post('{adminService}/update','ServicePointLeaderController@update')->middleware('spl');
	Route::get('schedule','ServicePointLeaderController@schedule')->middleware('spl');
	Route::get('done','ServicePointLeaderController@done')->middleware('spl');
	Route::get('schedule/{servicepointleader}/edit','ServicePointLeaderController@edit')->middleware('spl');
	Route::post('schedule/{servicepointleader}/update','ServicePointLeaderController@updateSchedule')->middleware('spl');
	Route::get('{servicepointleader}/check','ServicePointLeaderController@check')->middleware('spl');
	Route::post('{servicepointleader}/test','ServicePointLeaderController@updateWorkOrder')->middleware('spl');
	Route::get('{servicepointleader}/print-work-order','ServicePointLeaderController@printWorkOrder')->middleware('spl');
	Route::get('/completed','ServicePointLeaderController@completed')->middleware('spl');
	Route::get('{ServicePointLeader}/detail-completed','ServicePointLeaderController@detailServicesCompleted')->middleware('spl');
	Route::get('/dashboard','ServicePointLeaderController@dashboard')->middleware('spl');
	Route::get('/{servicepointleader}/edit-user','ServicePointLeaderController@editUser')->middleware('spl');
	Route::post('/{servicepointleader}/update-user','ServicePointLeaderController@updateUser')->middleware('spl');
	Route::get('report','ServicePointLeaderController@report')->middleware('spl');
	Route::post('report','ServicePointLeaderController@postRepost')->middleware('spl');
});

Route::group(['prefix'=>'engineer'], function(){
	Route::get('/services','EngineerController@index')->middleware('engineer');
	Route::get('/dashboard','EngineerController@dashboard')->middleware('engineer');
	Route::get('/detail','EngineerController@detail')->middleware('engineer');
	Route::get('{adminService}/work-order','EngineerController@workorder')->middleware('engineer');
	Route::post('{adminService}/work-orders','EngineerController@update')->middleware('engineer');
	Route::get('/services-done','EngineerController@servicesDone')->middleware('engineer');
	Route::get('{adminService}/done','EngineerController@detailServicesDone')->middleware('engineer');
	Route::get('{adminService}/completed','EngineerController@detailServicesCompleted')->middleware('engineer');
	Route::get('/services-completed','EngineerController@completed')->middleware('engineer');
	Route::get('/services-completed','EngineerController@completed')->middleware('engineer');
	Route::get('/{user}/edit','EngineerController@edit')->middleware('engineer');
	Route::post('/{user}/update','EngineerController@updateUser')->middleware('engineer');
});
