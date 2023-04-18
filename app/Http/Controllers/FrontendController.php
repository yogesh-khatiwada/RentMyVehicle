<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Bike;
use App\Models\offer;
use App\Models\booked;
use App\Models\testimonial;
// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\rent;




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
    public function mybooking()
    {
        $bookeds = booked::where('user_id',Auth::user()->id)->get();
        
        // return view('mybooking',compact('bookeds'));
        $rents = rent::where('user_id',Auth::user()->id)->get();
        return view('mybooking',compact('bookeds','rents'));

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
    public function carrent($id)
    {
        $car = car::findOrFail($id);
        $rent = rent::where('car_id',$id)
                ->where('user_id',Auth::user()->id)
                ->first();
                if(!$rent)
                abort (404);
        return view('frontend.rent', compact('car','rent'));
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
    public function rentdetail($id)
    {
        $car = car::findOrFail($id);
        return view('frontend.rentdetail', compact('car'));
    }
    public function offerdetail($id)
    {
        $offer = offer::findOrFail($id);
        return view('frontend.offerdetail', compact('offer'));
    }
    public function Car(Request $request) {
        $car = Car::query();
        if ($request->search ) {
            $car = $car->where('carName','like','%'.$request->search.'%'); 
        // $car = Car::all();
        }
         $car = $car->get();
       
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
    public function Bike(Request $request){
        $bike = Bike::query();
        if ($request->searchbike ) {
            $bike = $bike->where('bikeName','like','%'.$request->searchbike.'%'); 
       
        }
         $bike = $bike->get();
        return view('bike', compact('bike'));

    }



public function testimonial(){
    $testimonials = testimonial::all();
    return view('testimonial', compact('testimonials'));

}
}
