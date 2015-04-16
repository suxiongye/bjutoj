<?php
namespace App\Controllers\User;
use User,Solve;
use Auth, BaseController, Request,Form, Input, Redirect, Sentry, View;
use App\Services\Validators\RegisterValidator;

class UsersController extends BaseController {
	/**
	 * Display a listing of the resource.
	 * GET /admin/problems
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Sentry::getUser()->hasAccess('admin'))
        {
            $power = 1;
        }
        else{
            $power = -1;
        }
        return \View::make('users.index')->with('users',User::all())->with('power',$power);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/problems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/problems
	 *
	 * @return Response
	 */
	public function store()
	{
		/*
		 * it is the job of authcontroller
       */
	}

	/**
	 * Display the specified resource.
	 * GET /admin/problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $solves = Solve::where('user_id','=',$id)->orderBy('pro_id')->get();
        return \View::make('users.show')->with('user',User::find($id))->with('solves',$solves);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/problems/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(Sentry::getUser()->hasAccess('admin')||Sentry::getUser()->id == $id)
		return \View::make('users.edit')->with('user',User::find($id));
        else
        {
            return Redirect::route('users.show',$id);
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {
        $user = User::find($id);
        $user->username = Input::get('username');
        if(Sentry::getUser()->username != $user->username && Sentry::where('username',$user->username)->first()!=null)
        {
            return Redirect::back()->withInput()->withErrors("The username exist");
        }
        else{
            if ($user->save()) {
                return Redirect::route('users.show', $user->id);
            } else {
                return Redirect::back()->withInput()->withErrors("Save error");
            }
        }
    }
	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/problems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user = Sentry::findUserById($id);
        $user->delete();
        return Redirect::route('users.index');
	}

    public function refresh()
    {
        if(Sentry::getUser()->hasAccess('admin'))
        {
            $power = 1;
        }
        else{
            $power = -1;
        }
        return \View::make('users/index')->with('users',User::all())->with('power',$power);
    }

}