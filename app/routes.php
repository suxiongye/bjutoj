<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/','App\Controllers\HomeController@index');
Route::get('ranklist','App\Controllers\HomeController@rankList');
Route::group(array('prefix'=>'problems','before'=>'auth.admin'),function()
{
    //problems route
    Route::get('index',array('as' => 'problems.index', 'uses' => 'App\Controllers\Problem\ProblemsController@index'));
    Route::get('edit/{id}','App\Controllers\Problem\ProblemsController@edit');
    Route::get('delete/{id}','App\Controllers\Problem\ProblemsController@destroy');
    Route::get('show/{id}',array('as' => 'problems.show', 'uses' => 'App\Controllers\Problem\ProblemsController@show'));
    Route::post('update/{id}','App\Controllers\Problem\ProblemsController@update');
    Route::post('store','App\Controllers\Problem\ProblemsController@store');
    Route::get('create','App\Controllers\Problem\ProblemsController@create');
    Route::get('store','App\Controllers\Problem\ProblemsController@store');
    Route::get('refresh','App\Controllers\Problem\ProblemsController@refresh');
}
);

Route::group(array('prefix'=>'users','before'=>'auth.admin'),function() {
    //users route
    Route::get('index',array('as' => 'users.index', 'uses' => 'App\Controllers\User\UsersController@index'));
    Route::get('create','App\Controllers\User\UsersController@create');
    Route::get('edit/{id}','App\Controllers\User\UsersController@edit');
    Route::get('delete/{id}','App\Controllers\User\UsersController@destroy');
    Route::get('show/{id}',array('as' => 'users.show', 'uses' => 'App\Controllers\User\UsersController@show'));
    Route::post('update/{id}','App\Controllers\User\UsersController@update');
    Route::get('refresh','App\Controllers\User\UsersController@refresh');
});

Route::group(array('prefix'=>'codes','before'=>'auth.admin'),function() {
//codes route
    Route::get('index',array('as'=>'codes.index','uses'=>'App\Controllers\Code\CodesController@index'));
    Route::get('show/{id}',array('as'=>'codes.show','uses'=>'App\Controllers\Code\CodesController@show'));
    Route::get("/create/{id}",array('as'=>'codes.create','uses'=>'App\Controllers\Code\CodesController@create'));
    Route::post("store",array('as'=>'codes.store','uses'=>'App\Controllers\Code\CodesController@store'));
    Route::get('refresh','App\Controllers\Code\CodesController@refresh');
}
);


Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));
Route::get('admin/register',array('as'=>'admin.register','uses' => 'App\Controllers\Admin\AuthController@create'));
Route::post('admin/store',array('as'=>'admin.store','uses'=>'App\Controllers\Admin\AuthController@store'));
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::any('/', 'App\Controllers\Admin\ProblemsController@index');
    Route::resource('problems', 'App\Controllers\Admin\ProblemsController');
    Route::resource('codes', 'App\Controllers\Admin\CodesController');
});