<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('backend.pages.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countofferdata = new Offer();
        $data = $countofferdata->getOFFERdatacount();
        return view('backend.pages.offer.create'); 
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
            'vehicleName' => 'required|string|max:200|unique:cars,carName',
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'model' => 'required|string|',
            'prize' => 'required|string|',
            
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
        Offer::create($data);
        return redirect(route('offer.index'))->with('success', 'Offer Stored Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offers  = Offer::findOrFail($id);
        return view('backend.pages.offer.edit', compact('offers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offers  = Offer::findOrFail($id);
        return view('backend.pages.offer.edit', compact('offers')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $offers = Offer::findOrFail($id);
        // validation
        $request->validate([
            'vehicleName' => 'required|string|max:200|unique:cars,carName,' . $id,
            'image' => 'nullable|image|mimes:jpg,png,gif,webp,svg|max:2048',
            'model' => 'required|string|',
            
            'prize' => 'required|string|',
           
        ]);
        // take request data
        $data = $request->all();
        // store image to public file
        $data['image'] = $offers->image; // set deafult category image
        if ($request->hasFile('image')) { // check condition is image exists or not
            $img = $request->file('image'); // get image file in img variable
            $img_path = 'upload/car/'; // set path to save the image
            $img_name = Str::random(3) . now()->format('Y-m-d-his') . '.' . $img->getClientOriginalExtension(); // set name with time and extention to save image
            $img->move($img_path, $img_name); // move the image file to the destination path with the name
            // pass image name to the datbase
            $data['image'] = $img_path . $img_name;
        }
        // update category
        $offers->update($data);
        return redirect(route('offer.index'))->with('success', 'Offer Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offers  = Offer::findOrFail($id);
        $offers->delete();
        return back()->with('success', 'Offer Deleted Successfully!');
    } 
    }

