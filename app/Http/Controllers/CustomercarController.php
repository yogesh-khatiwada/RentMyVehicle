<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use Illuminate\Support\Str;
use Auth;



class CustomercarController extends Controller
{
    public function index()
    {
        $cars = car::where ('added',Auth::user()->id)->get();
        return view('customer.pages.car.index', compact('cars'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('company.pages.job.create', compact('categories'));
        return view('customer.pages.car.create');
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
        'carName' => 'required|string|max:200|unique:cars,carName',
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
    Car::create($data);
    return redirect(route('customer.car.index'))->with('success', 'Car Stored Successfully!'); 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars  = Car::findOrFail($id);
        return view('customer.pages.car.edit', compact('cars'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cars = Car::findOrFail($id);
        // validation
        $request->validate([
            'carName' => 'required|string|max:200|unique:cars,carName,' . $id,
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
        $data['added']= $cars->added;
        // store image to public file
        $data['image'] = $cars->image; // set deafult category image
        if ($request->hasFile('image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/car/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['image'] = $img_path . $img_name;
        }
        // update category
        $cars->update($data);
        return redirect(route('customer.car.index'))->with('success', 'Car Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars  = Car::findOrFail($id);
        $cars->delete();
        return back()->with('success', 'Car Deleted Successfully!');
    }
}
