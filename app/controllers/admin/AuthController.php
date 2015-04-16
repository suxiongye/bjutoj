<?php
namespace App\Controllers\Admin;

use Auth, BaseController, Form, Input, Redirect, Sentry, View;
use App\Services\Validators\RegisterValidator;

class AuthController extends BaseController{

    /**
     * 显示登录页面
     * @return View
     */
    public function getLogin()
    {
        if(Sentry::check())
        {
            return Redirect::route('problems.index');
        }
        return View::make('admin.auth.login');
    }

    /**
     * POST 登录验证
     * @return Redirect
     */
    public function postLogin()
    {
        $credentials = array(
            'username'    => Input::get('username'),
            'password' => Input::get('password')
        );

        try
        {
            $user = Sentry::authenticate($credentials, false);

            if ($user)
            {
                return Redirect::route('problems.index');
            }
        }
        catch(\Exception $e)
        {
            return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
        }
    }
    /**
     * 注销
     * @return Redirect
     */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('admin.login');
    }

    /**
	 * Display a listing of the resource.
	 * GET /admin/auth
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/auth/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return  \View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/auth
	 *
	 * @return Response
	 */
	public function store()
	{
        $validation = new RegisterValidator;
        if(Input::get('password')==null||Input::get('password')!=Input::get("password2"))
        {
            return Redirect::back()->withInput()->withErrors("The password should be same and at least 5 character");
        }
        if($validation->passes()) {
            $user = Sentry::createUser(array(
                'username' => Input::get('username'),
                'password' => Input::get('password'),
                'solved' => 0,
                'submit' => 0,
                'activated' => true,
            ));
            if (Input::get('code') == 'teacher') {
                $group = Sentry::findGroupByName('Admin');
            } else {
                $group = Sentry::findGroupByName('Student');
            }
            $user->addGroup($group);
            return Redirect::route('admin.login');
        }
        else{
            return Redirect::back()->withInput()->withErrors("The username exist");
        }
	}

	/**
	 * Display the specified resource.
	 * GET /admin/auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /admin/auth/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	}

}