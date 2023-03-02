<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();
        return view('backend.pages.message.index', compact('messages'));
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
         // validation
         $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|',
            'subject' => 'required|string|',
            'message' => 'required|string|',
    
]);
// dd($request->all());
$data = $request->all();     
Message::create($data);
return back()->with('success', 'Message Stored Successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          // validation
          $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|',
            'subject' => 'required|string|',
            'message' => 'required|string|',
          
]);
    
// dd($request->all());
$data = $request->all(); 
messages->update($data);
return redirect(route('message.index'))->with('success', 'message Updated Successfully!');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messages  = Message::findOrFail($id);
        $messages->delete();
        return back()->with('success', 'message Deleted Successfully!');
    }

}