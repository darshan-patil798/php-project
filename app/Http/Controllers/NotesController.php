<?php

namespace App\Http\Controllers;

use App\Models\notes;
use Illuminate\Http\Request;
use Session;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->session()->has('user')){
            $userId=$req->session()->get('user')['id'];
            $data= notes::where('user_id',$userId)->where('completed',false)->get();
            return view('welcome',['notes'=>$data]);
        }else{
            return redirect('/login');
        }

        // return view('welcome',['notes'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {

            if($req->session()->has('user'))
            {
               $note= new notes;
               $note->user_id=$req->session()->get('user')['id'];
               $note->note=$req->note;
               $note->completed=false;
               $note->save();
               return redirect('/');
            }
            else
            {
                return redirect('/login');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function complete($id)
    {
        if(Session::has('user'))
        {
           $note= notes::find($id);
           $note->completed=true;
           $note->save();
           return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(notes $notes)
    {
        //
    }
}
