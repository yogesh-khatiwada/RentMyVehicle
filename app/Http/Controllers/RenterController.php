<?php

namespace App\Http\Controllers;

use App\Models\renter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::all();
        $countrenterdata = new Renter();
        $data = $countrenterdata->getrenterdatacount();
        return view('backend.pages.renter.index', compact('renters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.renter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /*my comment*/
    public function store(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|string|max:200|unique:renters,name',
            'email' => 'required|string|',
            'number' => 'required|string|',
            'age' => 'required|string|',
            'tadd' => 'required|string|',
            'padd' => 'required|string|',
            
            'c_image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'b_image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'l_image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',

        ]);
        // dd($request->all());
        $data = $request->all();
        // store image to public file
        $data['c_image'] = null;
        if ($request->hasFile('c_image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/category/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['c_image'] = $img_path . $img_name;
           
        }
        $data['b_image'] = null;
        if ($request->hasFile('b_image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/category/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['b_image'] = $img_path . $img_name;
           
        }
        $data['l_image'] = null;
        if ($request->hasFile('l_image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/category/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['l_image'] = $img_path . $img_name;
           
        }
        Renter::create($data);
        return redirect(route('renter.index'))->with('success', 'Renter Stored Successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function show(renter $renter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $renters = Renter::findOrFail($id);
        return view('backend.pages.renter.edit', compact('renters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $renters = Renter::findOrFail($id);
        // validation
        $request->validate([
            'name' => 'required|string|max:200|unique:renters,name',
            'email' => 'required|string|',
            'number' => 'required|string|',
            'age' => 'required|string|',
            'tadd' => 'required|string|',
            'padd' => 'required|string|', 
            'c_image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'b_image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'l_image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',

        ]);
        // dd($request->all());
        $data = $request->all();
        // store image to public file
        $data['c_image'] = null;
        if ($request->hasFile('c_image')) { // check condition is image exists or not
            $img = $request->file('c_image'); // get image file in img variable
            $img_path = 'upload/category/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['c_image'] = $img_path . $img_name;
           
        }
        $data['b_image'] = null;
        if ($request->hasFile('b_image')) { // check condition is image exists or not
            $img = $request->file('b_image'); // get image file in img variable
            $img_path = 'upload/category/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['b_image'] = $img_path . $img_name;
           
        }
        $data['l_image'] = null;
        if ($request->hasFile('l_image')) { // check condition is image exists or not
            $img = $request->file('l_image'); // get image file in img variable
            $img_path = 'upload/category/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['l_image'] = $img_path . $img_name;
           
        }
    


        // update category
        $renters->update($data);
        return redirect(route('renter.index'))->with('success', 'Renter Updated Successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\renter  $renter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renters = Renter::findOrFail($id);
        $renters->delete();
        return back()->with('success', 'Renter user Deleted Successfully!');

    }
}

