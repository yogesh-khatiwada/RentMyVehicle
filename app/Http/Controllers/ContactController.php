<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.pages.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.contact.create'); 
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
            'phone' => 'required|string|max:200|unique:contact,number',
            'email' => 'required|string|',
            'location' => 'required|string|',
        ]);
       
        $data = $request->all();
    
    Contact::create($data);
    return redirect(route('contact.index'))->with('success', 'Detail Stored Successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts  = Contact::findOrFail($id);
        return view('backend.pages.contact.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacts = Contact::findOrFail($id);
        // validation
        $request->validate([
            'phone' => 'required|string|max:200|unique:contact,number',
            'email' => 'required|string|',
            'location' => 'required|string|',
        ]);
       
        $data = $request->all();

        $contacts->update($data);
        return redirect(route('contact.index'))->with('success', 'Detail Updated Successfully!');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contacts  = Contact::findOrFail($id);
        $contacts->delete();
        return back()->with('success', 'Detail Deleted Successfully!');
    }
}
