<?php
namespace App\Controllers\Problem;
use Problem;
use Auth, BaseController, Request,Form, Input, Redirect, Sentry, View;

class ProblemsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/problems
	 *
	 * @return Response
	 */
	public function index()
	{
        return \View::make('problems.index')->with('problems',Problem::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/problems/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('problems.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin/problems
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $problem = new Problem;
        $problem->title = Input::get('title');
        $problem->content = Input::get('content');
        $problem->inputcase = Input::get('inputcase');
        $problem->outputcase = Input::get('outputcase');
        $problem->timelimit = Input::get('timelimit');
        $problem->memorylimit = Input::get('memorylimit');
        $problem->radio = 0.0;
        $problem->accepted = 0;
        $problem->submit = 0;
        if($problem->save())
        {
            return Redirect::route('problems.show',$problem->id);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors("Save error");
        }
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
		//
        return \View::make('problems.show')->with('problem',Problem::find($id));
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
		return \View::make('problems.edit')->with('problem',Problem::find($id));
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
		$problem = Problem::find($id);
        $problem->title = Input::get('title');
        $problem->content = Input::get('content');
        $problem->inputcase = Input::get('inputcase');
        $problem->outputcase = Input::get('outputcase');
        $problem->timelimit = Input::get('timelimit');
        $problem->memorylimit = Input::get('memorylimit');
        if($this->saveInFile($problem))
        {
            return "can't save in file";
        }
        if($problem->save())
        {

            return Redirect::route('problems.show',$problem->id);
        }
        else
        {
            return Redirect::back()->withInput()->withErrors("Save error");
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
		//
        $problem = Problem::find($id);
        $problem->delete();
        return Redirect::route('problems.index');
	}
    public function saveInFile(Problem $problem)
    {
        $fp=fopen("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\problems\\$problem->id.txt",'w');
        if($fp) return false;
        fwrite($fp,"$problem->title \n $problem->content");
        fclose($fp);
        return true;
    }
}