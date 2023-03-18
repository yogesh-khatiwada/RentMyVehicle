<?php

namespace App\Http\Controllers;

use App\Models\rent;
use Illuminate\Http\Request;



use App\Models\car;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rent = rent::where('status','pending')->get();
        return view('backend.pages.rent.index', compact('rent'));
    }
    public function indexone()
    {
        $rent = rent::where('status','accepted')->get();
        return view('backend.pages.rent.index', compact('rent'));
    }
    public function indextwo()
    {
        $rent = rent::where('status','cancel')->get();
        return view('backend.pages.rent.index', compact('rent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate($type, $id)
    {
        $rent = rent::findOrFail($id);
        if ($type == 'pending') {
            $rent->status = 'pending';
        } else if ($type == 'cancel') {
            $rent->status = 'cancel';
        } else if ($type == 'accepted') {
            $rent->status = 'accepted';
        } else {
            $rent->status = 'pending';
        }
        $rent->save();
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
            'paddress' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'resume' => 'required|file|mimes:pdf,docx,txt|max:2048',
            'citizenship' => 'required|file|mimes:pdf,docx,txt|max:2048',
            'citizenshipb' => 'required|file|mimes:pdf,docx,txt|max:2048',
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
        if ($request->hasFile('citizenship')) { // check condition is resume exists or not
            $img = $request->file('citizenship'); // get resume file in img variable
            $img_path = 'upload/citizenship/'; // set path to save the resume
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save resume
            $img->move($img_path, $img_name); // move the resume file to the destination path with the name
            // pass resume name to the datbase
            $data['citizenship'] = $img_path . $img_name;
        }
        if ($request->hasFile('citizenshipb')) { // check condition is resume exists or not
            $img = $request->file('citizenshipb'); // get resume file in img variable
            $img_path = 'upload/citizenshipb/'; // set path to save the resume
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save resume
            $img->move($img_path, $img_name); // move the resume file to the destination path with the name
            // pass resume name to the datbase
            $data['citizenshipb'] = $img_path . $img_name;
        }
        rent::create($data);
        // return back()->
        return redirect()->route('car.rent',$id)->with('success','rent successfully!');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(rent $rent)
    {
        //
    }
}
