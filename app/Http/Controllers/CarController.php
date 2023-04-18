<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $cars = Car::query();
        if ($request->search ) {
            $cars = $cars->where('carName','like','%'.$request->search.'%');
        }
        // current month
        // $from = Carbon::now()->startOfMonth();
        // $to = Carbon::now();
        $cars = $cars->get();
        $countdata = new Car();
        $data = $countdata->getdatacount();
        // $count = DB::table('Car')->count();
        return view('backend.pages.car.index', compact('cars','data'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.car.create');
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
                return redirect(route('car.index'))->with('success', 'Car Stored Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cars  = Car::findOrFail($id);
        return view('backend.pages.car.edit', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cars  = Car::findOrFail($id);
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
        return redirect(route('car.index'))->with('success', 'Car Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $cars
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars  = Car::findOrFail($id);
        $cars->delete();
        return back()->with('success', 'Car Deleted Successfully!');
    }
}
