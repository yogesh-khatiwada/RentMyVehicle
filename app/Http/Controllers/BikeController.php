<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Bike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all();
        return view('backend.pages.bike.index', compact('bikes'));
        if (Auth::user()->role == 'customer') {
            return view('customer.pages.bike.index', compact('bikes'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countbikedata = new Bike();
        $data = $countbikedata->getbikedatacount();
        return view('backend.pages.bike.create');
        
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
            'bikeName' => 'required|string|max:200|unique:cars,carName',
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'model' => 'required|string|',
            'quantity' => 'required|string|',
            'prize' => 'required|string|',
            'date' => 'required|date|',
            'day' => 'required|string|',
            'added' => 'required|string|',
            'status' => 'required|in:available,notavailable'
        ]);
        // dd($request->all());
        $data = $request->all();
        $data['added']=Auth::user()->id;
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
        Bike::create($data);
        return redirect(route('bike.index'))->with('success', 'Bike Stored Successfully!');
}
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bikes  = Bike::findOrFail($id);
        return view('backend.pages.bike.edit', compact('bikes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $bikes = Bike::findOrFail($id);
        // validation
        $request->validate([
            'bikeName' => 'required|string|max:200|unique:cars,carName,' . $id,
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'model' => 'required|string|',
            'quantity' => 'required|string|',
            'prize' => 'required|string|',
            'date' => 'required|date|',
            'day' => 'required|string|',
            'added' => 'required|string|',
            'status' => 'required|in:available,notavailable'
        ]);
        // take request data
        $data = $request->all();
        $data['added']= $bikes->added;
        // store image to public file
        $data['image'] = $bikes->image; // set deafult category image
        if ($request->hasFile('image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/car/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['image'] = $img_path . $img_name;
        }
        // update category
        $bikes->update($data);
        return redirect(route('bike.index'))->with('success', 'Bike Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bikes  = Bike::findOrFail($id);
        $bikes->delete();
        return back()->with('success', 'Bike Deleted Successfully!');
    }
}
