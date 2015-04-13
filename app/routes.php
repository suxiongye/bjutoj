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
Route::get('problems/index',array('as' => 'problems.index', 'uses' => 'App\Controllers\Problem\ProblemsController@index'));
Route::get('problems/edit/{id}','App\Controllers\Problem\ProblemsController@edit');
Route::get('problems/delete/{id}','App\Controllers\Problem\ProblemsController@destroy');
Route::get('problems/show/{id}',array('as' => 'problems.show', 'uses' => 'App\Controllers\Problem\ProblemsController@show'));
Route::post('problems/update/{id}','App\Controllers\Problem\ProblemsController@update');
Route::post('problems/store','App\Controllers\Problem\ProblemsController@store');
Route::get('problems/create','App\Controllers\Problem\ProblemsController@create');
Route::get('problems/store','App\Controllers\Problem\ProblemsController@store');
Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::any('/', 'App\Controllers\Admin\ProblemsController@index');
    Route::resource('problems', 'App\Controllers\Admin\ProblemsController');
    Route::resource('codes', 'App\Controllers\Admin\CodesController');
});