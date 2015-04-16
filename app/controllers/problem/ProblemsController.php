<?php
namespace App\Controllers\Problem;
use Problem;
use Auth, BaseController, Request,Form, Input, Redirect, Sentry, View;
use App\Services\Validators\ProblemValidator;

class ProblemsController extends BaseController {
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
        return \View::make('problems.index')->with('problems',Problem::paginate(10))->with('power',$power);
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
        $validation = new ProblemValidator;
        if($validation->passes())
        {
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
                $this->saveInFile($problem);
                return Redirect::route('problems.show',$problem->id);
            }
            else
            {
                return Redirect::back()->withInput()->withErrors("Save error");
            }
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
        $validation = new ProblemValidator;
        if($validation->passes()) {
            $problem = Problem::find($id);
            $problem->title = Input::get('title');
            $problem->content = Input::get('content');
            $problem->inputcase = Input::get('inputcase');
            $problem->outputcase = Input::get('outputcase');
            $problem->timelimit = Input::get('timelimit');
            $problem->memorylimit = Input::get('memorylimit');

            if ($problem->save() && $this->saveInFile($problem)) {

                return Redirect::route('problems.show', $problem->id);
            }
            else
            {
                return Redirect::back()->withInput()->withErrors("Save error");
            }
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
        $this->deleteFile($problem->id);
        $problem->delete();
        return Redirect::route('problems.index');
	}

    public function refresh()
    {
        $problems =Problem::paginate(10);
        foreach($problems as $problem)
        {
            $this->saveInFile($problem);
        }
        if(Sentry::getUser()->hasAccess('admin'))
        {
            $power = 1;
        }
        else{
            $power = -1;
        }
        return \View::make('problems/index')->with('problems',$problems)->with('power',$power);
    }
    public function saveInFile(Problem $problem)
    {
        $fp=fopen("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\problems\\$problem->id.txt",'w');
        if(!$fp) return false;
        fwrite($fp,"Problem Title:$problem->title \n Problem Content:$problem->content\n");
        fclose($fp);
        $fp = fopen("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\inputcases\\$problem->id.txt",'w');
        fwrite($fp,"$problem->inputcase\n");
        fclose($fp);
        $fp = fopen("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\outputcases\\$problem->id.txt",'w');
        fwrite($fp,"$problem->outputcase");
        fclose($fp);
        return true;
    }
    public function deleteFile($id)
    {
        try {
            unlink("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\problems\\$id.txt");
        }
        catch(\Exception $e)
        {

        }
    }
}