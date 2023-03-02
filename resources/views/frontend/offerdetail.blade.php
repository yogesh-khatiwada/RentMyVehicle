@extends('layouts.hf')

@section('body-content')
    <section>
        <div class="container">
            <h1>Offer Detail</h1>
            <hr>
            <div class="row">
                <div class="col-md-4 col-12">
                    <img src="{{ asset($offer->image) }}" alt="" width="100%">
                   
                    <h5> Car Name: <span>{{ $offer->vehicleName }}</span></h5>

                    <div style="margin-bottom:10px;">
                <span>Car Model: {{ $offer->model }} </span><br>
                 Price for rent: RS.<span>{{ $offer->prize }} per day</span>
                    </div>
                </div>
                <div class="col-md-8 col-12">

                    {{-- <a href="" class="btn btn-dark btn-block">Apply Now</a> --}}
                    <h1>Book Now</h1>
                    <hr>
                    @if (Auth::user())
                    {{-- <form action="{{ route('car.booked.store',$offer->id) }}" method="post" enctype="multipart/form-data"> --}}
                        <form action="{{ route('offer.booked.store',$offer->id) }}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>Error: </strong> {{ $error }}
                            </div>
                        @endforeach
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="name" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="email">email</label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="email" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                          <label for="phone">phone</label>
                          <input type="number" name="phone" id="phone" class="form-control" placeholder="phone" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"> </small>
                        </div>
                        <div class="form-group">
                          <label for="address">Temporary address</label>
                          <input type="text" name="address" id="address" class="form-control" placeholder="address" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        
                        </div>
                        <div class="form-group">
                            <label for="address">Permanent address</label>
                            <input type="text" name="paddress" id="paddress" class="form-control" placeholder="address" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                          
                          </div>

                        <div class="form-group">
                          <label for="resume">resume</label>
                          <input type="file" name="resume" id="resume" class="form-control" placeholder="resume" aria-describedby="helpId">
                          <small id="helpId" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="citizenship"> citizenship front</label>
                            <input type="file" name="citizenship" id="citizenship" class="form-control" placeholder="resume" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                          </div>
                    
                          <div class="form-group">
                            <label for="citizenshipb">citizenship back</label>
                            <input type="file" name="citizenshipb" id="citizenshipb" class="form-control" placeholder="resume" aria-describedby="helpId">
                            <small id="helpId" class="text-muted"></small>
                          </div>
                      
                    
                        {{-- <button type="submit" name="" id="" class="btn btn-dark btn-sm btn-block">Book Now</button> --}}
                        <button type="submit" class="btn btn-info" href="" role="button">Book Now</button>
                        <button type="submit" class="btn btn-info" href="" role="button">Rent</button>
                    </form>
                    
                    @else
                        <div class="jumbotron">
                            <h4>Login first for booking a vehicle.</h4>

                            <p class="lead">
                                <a class="btn btn-primary btn-md" href="{{ route('login') }}" role="button">Login</a>
                            </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection