<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Note::all();
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
            'day'=>'required|integer',
            'content' => 'required']
        );

        Note::create(['day'=>$request->day,'content'=>$request->content]);

        return ["message"=>"Noted Added","success"=>true];
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
        return Note::find($id);
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
        $request->validate([
            'content'=>'required'
        ]);

        $note = Note::find($id);
        $note->content = $request->content;
        $note->save();

        return ["message"=>"Note updated successfully","success"=>true];
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
        Note::destroy($id);
    }
}
