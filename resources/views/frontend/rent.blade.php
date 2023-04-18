@extends('layouts.hf')

@section('body-content')
    <section>
        <div class="container">
            <h1>Car Detail</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 col-12">
                    <img src="{{ asset($car->image) }}" alt="" width="100%">

                    <h5> Car Name: <span>{{ $car->carName }}</span></h5>

                    <div style="margin-bottom:10px;">
                        <span>Car Model: {{ $car->model }} </span><br>
                        Price for rent: RS.<span>{{ $car->prize }} per day</span>
                    </div>
                </div>
                <div class="col-md-8 col-12">

                    {{-- <a href="" class="btn btn-dark btn-block">Apply Now</a> --}}
                    <h1>Your Rent Detail</h1>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item ">Name: {{ $rent->name }}</li>
                        <li class="list-group-item ">Address: {{ $rent->address }}</li>
                        <li class="list-group-item ">Address: {{ $rent->paddress }}</li>
                        <li class="list-group-item ">Phone: {{ $rent->phone }}</li>
                        <li class="list-group-item ">Email: {{ $rent->email }}</li>
                        <li class="list-group-item ">Licesence: <a href="{{ asset($rent->resume) }}"
                                target="_blank">Licesence View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="list-group-item ">Citizenship Front: <a href="{{ asset($rent->citizenship) }}"
                                target="_blank">citizenship View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="list-group-item ">Citizenship Back: <a href="{{ asset($rent->citizenshipb) }}"
                                target="_blank">citizenshipb View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
@endsection
