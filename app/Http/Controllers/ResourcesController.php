<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resource;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Resource::all();
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
        return Resource::find($id);
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
            "resource_name"=>"required",
            "resource_link"=>"required"
        ]);

        Resource::create(["name"=>$request->resource_name,"link"=>$request->resource_link]);

        return ["message"=>"Resource created","success"=>true];
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
        $resource = Resource::find($id);

        $resource->name = $request->resource_name;
        $resource->link = $request->resource_link;

        $resource->save();

        return ["message"=>"Data updated","status"=>true];
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
        Resource::destroy($id);

        return Resource::all();
    }
}
