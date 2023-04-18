<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


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


    public function testimonial()
    {
        return view('testimonial');
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
        // dd($request->all());
        // validation
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'testimonial' => 'required|string',

        ]);
        // dd($request->all());
        $data = $request->all();
         // dd($request->all());
         $data = $request->all();
         // store image to public file
         $data['image'] = null;
         if ($request->hasFile('image')) { // check condition is image exists or not
             $img = $request->file('image'); // get image file in img variable
             $img_path = 'upload/category/'; // set path to save the image
             $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
             $img->move($img_path, $img_name); // move the image file to the destination path with the name
             // pass image name to the datbase
             $data['image'] = $img_path . $img_name;
         }
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
            'email' => 'required|string',
            'image' => 'required|file',
            'testimonial' => 'required|string',

        ]);

        // dd($request->all());
        $data = $request->all();
          // store image to public file
          $data['image'] = $testimonial->image; // set deafult category image
          if ($request->hasFile('image')) { // check condition is image exists or not
              $img = $request->file('image'); // get image file in img variable
              $img_path = 'upload/car/'; // set path to save the image
              $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
              $img->move($img_path, $img_name); // move the image file to the destination path with the name
              // pass image name to the datbase
              $data['image'] = $img_path . $img_name;
          }
        $testimonial->update($data);
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