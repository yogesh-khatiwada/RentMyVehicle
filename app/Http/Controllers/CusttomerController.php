<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CusttomerController extends Controller
{
    public function customer()
    {
   return view('customer.pages.dashboard');
}
}