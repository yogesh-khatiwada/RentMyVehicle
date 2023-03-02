<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = testimonial::all();
        return view('backend.pages.testimonial.index', compact('testimonials'));
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
            'image' => 'required|file|',
            'testimonial' => 'required|string|',
    
]);
// dd($request->all());
$data = $request->all();     
Testimonial::create($data);
return back()->with('success', 'Testimonials Stored Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(testimonial $testimonial)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testimonial $testimonial)
    {
         // validation
         $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|',
            'image' => 'required|string|',
            'testimonial' => 'required|string|',
          
]);
    
// dd($request->all());
$data = $request->all(); 
Testimonial->update($data);
return redirect(route('testimonial.index'))->with('success', 'Testimonial Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonial $testimonial)
    {
        $testimonials  = Testimonial::findOrFail();
        $testimonials->delete();
        return back()->with('success', 'message Deleted Successfully!');
    }
}
