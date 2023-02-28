<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use Illuminate\Http\Request;

use App\Models\car;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BookedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booked = booked::where('status','pending')->get();
        return view('backend.pages.booked.index', compact('booked'));
    }
    public function indexone()
    {
        $booked = booked::where('status','accepted')->get();
        return view('backend.pages.booked.index', compact('booked'));
    }
    public function indextwo()
    {
        $booked = booked::where('status','cancel')->get();
        return view('backend.pages.booked.index', compact('booked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate($type, $id)
    {
        $booked = booked::findOrFail($id);
        if ($type == 'pending') {
            $booked->status = 'pending';
        } else if ($type == 'cancel') {
            $booked->status = 'cancel';
        } else if ($type == 'accepted') {
            $booked->status = 'accepted';
        } else {
            $booked->status = 'pending';
        }
        $booked->save();
        return back()->with('success', 'updated succesfully');
    }
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
    public function store(Request $request, $id)
    {
        $car = car::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'resume' => 'required|file|mimes:pdf,docx,txt|max:2048',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['car_id'] = $id;
        // store resume to public file
        $data['resume'] = null;
        if ($request->hasFile('resume')) { // check condition is resume exists or not
            $img = $request->file('resume'); // get resume file in img variable
            $img_path = 'upload/resume/'; // set path to save the resume
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save resume
            $img->move($img_path, $img_name); // move the resume file to the destination path with the name
            // pass resume name to the datbase
            $data['resume'] = $img_path . $img_name;
        }
        Booked::create($data);
        // return back()->
        return redirect()->route('car.booked',$id)->with('success','Booked successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function show(Booked $booked)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function edit(Booked $booked)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booked $booked)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booked  $booked
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booked $booked)
    {
        //
    }
}