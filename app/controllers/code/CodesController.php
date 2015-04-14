<?php
namespace App\Controllers\Code;
use Problem, Code;
use Auth, BaseController, Request,Form, Input, Redirect, Sentry, View;

class CodesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin/problems
	 *
	 * @return Response
	 */
	public function index()
	{
        return \View::make('codes.index')->with('codes',Code::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/problems/create
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return \View::make('codes.create')->with('problem',Problem::find($id));
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
        $code = new Code;
        $code->content = Input::get('content');
        $code->pro_id = Input::get('pro_id');
        $code->user_id = Sentry::getUser()->id;
        $code->status = "Waiting";
        $code->remarks = "";
        if($code->save())
        {
            $this->saveInFile($code);
            return Redirect::route('codes.show',$code->id);
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
        return \View::make('codes.show')->with('code',Code::find($id));
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
        $code = Code::find($id);
        $code->delete();
	}

    public function refresh()
    {
        $codes = Code::all();
        foreach($codes as $code)
        {
            if(Problem::where("id",$code->pro_id)->first() == null)
            {
                $this->deleteInFile($code->id);
                $this->destroy($code->id);
            }
            else{
                $this->saveInFile($code);
            }
        }
        return \View::make('codes/index')->with('codes',$codes);
    }

    public function saveInFile(Code $code)
    {
        $fp=fopen("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\codes\\$code->id.c",'w');
        if(!$fp) return false;
        fwrite($fp,$code->content);
        fclose($fp);
        return true;
    }

    public function deleteInFile($id)
    {
        try {
            unlink("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\codes\\$id.c");
        }
        catch(\Exception $e)
        {

        }
    }
}