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
        $bookeds = booked::where('status','pending')->get();
        return view('backend.pages.booked.index', compact('bookeds'));
    }
    public function indexone()
    {
        $bookeds = booked::where('status','accepted')->get();
        return view('backend.pages.booked.index', compact('bookeds'));
    }
    public function indextwo()
    {
        $bookeds = booked::where('status','cancel')->get();
        return view('backend.pages.booked.index', compact('bookeds'));
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
            'paddress' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'LicesencePhoto' => 'required|file|mimes:pdf,docx,txt|max:2048',
            'citizenship' => 'required|file|mimes:pdf,docx,txt|max:2048',
            'citizenshipb' => 'required|file|mimes:pdf,docx,txt|max:2048',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['car_id'] = $id;
        // store LicesencePhoto to public file
        $data['LicesencePhoto'] = null;
        if ($request->hasFile('LicesencePhoto')) { // check condition is LicesencePhoto exists or not
            $img = $request->file('LicesencePhoto'); // get LicesencePhoto file in img variable
            $img_path = 'upload/LicesencePhoto/'; // set path to save the LicesencePhoto
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save resume
            $img->move($img_path, $img_name); // move the LicesencePhoto file to the destination path with the name
            // pass LicesencePhoto name to the datbase
            $data['LicesencePhoto'] = $img_path . $img_name;
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
