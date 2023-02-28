<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('backend.pages.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $countcustomerdata = new Customer();
        $data = $countcustomerdata->getcustomerdatacount();
        return view('backend.pages.customer.create');
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
            'customerName' => 'required|string|max:200',
            'email' => 'required|string|',
            'phone' => 'required|numeric|',
            'type' => 'required|string|',
            'Name' => 'required|string|',
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
           
           
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
        
        
        Customer::create($data);
        return redirect(route('customer.index'))->with('success', 'Customer Stored Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $customers  = Customer::findOrFail($id);
        return view('backend.pages.customer.edit', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $custome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $customers  = Customer::findOrFail($id);
        // validation
        $request->validate([ 
            'customerName' => 'required|string|max:200',
            'email' => 'required|string|',
            'phone' => 'required|numeric|',
            'type' => 'required|string|',
            'Name' => 'required|string|',
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            
        ]);
        // take request data
        $data = $request->all();
        // store image to public file
        $data['image'] = $customers->image; // set deafult category image
        if ($request->hasFile('image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/car/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['image'] = $img_path . $img_name;
        }
        // update category
        $customers->update($data);
        return redirect(route('customer.index'))->with('success', 'Car Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $custome
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers  = Car::findOrFail($id);
        $customers->delete();
        return back()->with('success', 'Customer Deleted Successfully!');
    }
    }

