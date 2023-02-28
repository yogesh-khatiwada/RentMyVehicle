<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Bike;
use App\Models\offer;
use App\Models\booked;
use Auth;



class FrontendController extends Controller
{
    public function homepage()
    {
        $offers = offer::all();
        return view('index',compact('offers'));
    
    }
    public function bikedetail()
    {
        return view('bike');
    }
    public function cardetaill()
    {
        return view('car');
    }
    public function teampage()
    {
        return view('team');
    }
    public function detail()
    {
        return view('detail');
    }
    public function carbooked($id)
    {
        $car = car::findOrFail($id);
        $booked = booked::where('car_id',$id)
                ->where('user_id',Auth::user()->id)
                ->first();
        return view('frontend.Booked', compact('car','booked'));
    }
    public function detailFinish()
    {
        return view('finishbooking');
    }
    public function cardetail($id)
    {
        $car = car::findOrFail($id);
        return view('frontend.cardetail', compact('car'));
    }
    public function Car() {
        $car = Car::all();
        return view('Car', compact('car'));

    }
    // public function Bike() {
    //     $bike = Bike::all();
    //     return view('Bike', compact('bike'));

    // }
    public function offer(){
        $offers = offer::all();
        return view('offer', compact('offers'));

    }
    public function bike(){
        $bike = bike::all();
        return view('bike', compact('bike'));

    }
}
