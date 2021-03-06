<?php
namespace App\Controllers;
use Problem,User;
class HomeController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return \View::make('hello');
	}

    public function index()
    {
        return \View::make('home')->with('problems',Problem::paginate(10));
    }

    public function rankList()
    {
        return \View::make('ranklist')->with('users',User::where('id','>',0)
            ->orderBy('solved','desc')->orderBy('submit') ->paginate(10));
    }
}
