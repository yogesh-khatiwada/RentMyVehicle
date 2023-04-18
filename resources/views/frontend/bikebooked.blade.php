@extends('layouts.hf')

@section('body-content')
    <section>
        <div class="container">
            <h1>bike Detail</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 col-12">
                    <img src="{{ asset($bike->image) }}" alt="" width="100%">

                    <h5> Bike Name: <span>{{ $bike->bikeName }}</span></h5>

                    <div style="margin-bottom:10px;">
                        <span>Bike Model: {{ $bike->model }} </span><br>
                        Price for rent: RS.<span>{{ $bike->prize }} per day</span>
                    </div>
                </div>
                <div class="col-md-8 col-12">

                    {{-- <a href="" class="btn btn-dark btn-block">Apply Now</a> --}}
                    <h1>Your Booked Detail</h1>
                    <hr>
                    <ul class="list-group">
                        <li class="list-group-item ">Name: {{ $booked->name }}</li>
                        <li class="list-group-item ">Permanent Address: {{ $booked->paddress }}</li>
                        <li class="list-group-item ">Temporary Address: {{ $booked->address }}</li>
                        <li class="list-group-item ">Phone: {{ $booked->phone }}</li>
                        <li class="list-group-item ">Email: {{ $booked->email }}</li>
                        <li class="list-group-item ">Licesence: <a href="{{ asset($booked->resume) }}"
                                target="_blank">Licesence View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="list-group-item ">Citizenship Front: <a href="{{ asset($booked->citizenship) }}"
                                target="_blank">citizenship View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="list-group-item ">Citizenship Back: <a href="{{ asset($booked->citizenshipb) }}"
                                target="_blank">citizenshipb View <i class="fa fa-eye" aria-hidden="true"></i></a></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
@endsection
