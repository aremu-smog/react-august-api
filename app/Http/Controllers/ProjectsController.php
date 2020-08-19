<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "project_name" => "required",
            "project_slug" => "required",
            "project_image" => "file|mimes:jpeg,jpg,png,gif"
        ]);

        $project_name = $request->project_name;
        $project_slug = $request->project_slug;

        $project_image = $request->file('project_image')->storeOnCloudinary('React August');
        $project_image_id = $project_image->getPublicId();
        $project_image_url = $project_image->getPath();

        Project::create(["name"=>$project_name,"slug"=>$project_slug,"image_url"=>$project_image_url,"image_id"=>$project_image_id]);
        
        // return["message"=>$request->file("project_image")];
        return ["message"=>"Project created","success"=>true];

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Project::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        /*$request->validate([
            "project_name" => "required",
            "project_slug" => "required",
            "project_image" => "file|mimes:jpeg,jpg,png,gif"
        ]);*/

        $project = Project::find($id)
        $project_name = $request->project_name;
        $project_slug = $request->project_slug;
        
        if(isset($request->file('project_image'))){
            $project_image = $request->file('project_image')->storeOnCloudinary('React August');
            $project->image_id = $project_image->getPublicId();
            $project->image_url = $project_image->getPath();
        }

        $project->name = $project_name
        $project->slug = $project_slug

        $project->save()
        
        // return["message"=>$request->file("project_image")];
        return ["message"=>"Project updated","success"=>true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Project::destroy($id);
    }
}
