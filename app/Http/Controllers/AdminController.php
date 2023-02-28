<?php

namespace App\Http\Controllers;
use App\Models\Bike;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Renter;
use App\Models\Offer;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        
        $countdata = new Car();
        $data = $countdata->getdatacount();
        $countbikedata = new Bike();
        $databike = $countbikedata->getbikedatacount();
        $countcustomerdata = new Customer();
        $datacustomer = $countcustomerdata->getcustomerdatacount();
        $countrenterdata = new Renter();
        $datarenter = $countrenterdata->getrenterdatacount();
        $countofferdata = new Offer();
        $dataoffer = $countofferdata->getofferdatacount();
        return view('backend.pages.dashboard',compact('data','databike','datarenter','datacustomer','dataoffer'));

    }
}
