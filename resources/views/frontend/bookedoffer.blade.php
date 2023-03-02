@extends('layouts.hf')

@section('body-content')
    <section>
        <div class="container">
            <h1>Booked Detail</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 col-12">
                    <img src="{{ asset($offer->image) }}" alt="" width="100%">
                   
                    <h5>  Name: <span>{{ $offer->carName }}</span></h5>

                    <div style="margin-bottom:10px;">
                <span>Car Model: {{ $offer->model }} </span><br>
                 Price for rent: RS.<span>{{ $offer->prize }} per day</span>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <p class="alert alert-success" role="alert">Car Booked succesfully</p>

                    {{-- <a href="" class="btn btn-dark btn-block">Apply Now</a> --}}
                    <h1>Your Booked Detail</h1>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item ">Name: {{ $bookedoffer->name }}</li>
                        <li class="list-group-item ">Address: {{ $bookedoffer->address }}</li>
                        <li class="list-group-item ">Address: {{ $bookedoffer->paddress }}</li>
                        <li class="list-group-item ">Phone: {{ $bookedoffer->contact }}</li>
                        <li class="list-group-item ">Email: {{ $bookedoffer->email }}</li>
                        <li class="list-group-item ">Resume: <a href="{{ asset($bookedoffer->resume) }}" target="_blank">Resume View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="list-group-item ">Resume: <a href="{{ asset($bookedoffer->citizenship) }}" target="_blank">citizenship View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="list-group-item ">Resume: <a href="{{ asset($bookedoffer->citizenshipb) }}" target="_blank">citizenshipb View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
@endsection