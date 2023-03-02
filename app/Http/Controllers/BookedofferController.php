<?php

namespace App\Http\Controllers;

use App\Models\bookedoffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BookedofferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookedoffer = bookedoffer::where('status','pending')->get();
        return view('backend.pages.booked.index', compact('bookedoffer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bookedoffer  $bookedoffer
     * @return \Illuminate\Http\Response
     */
    public function show(bookedoffer $bookedoffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bookedoffer  $bookedoffer
     * @return \Illuminate\Http\Response
     */
    public function edit(bookedoffer $bookedoffer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bookedoffer  $bookedoffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bookedoffer $bookedoffer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bookedoffer  $bookedoffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(bookedoffer $bookedoffer)
    {
        //
    }
}
