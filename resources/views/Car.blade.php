@extends('layouts.hf')
@section('body-content')
    <div class="page header-text">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cars</h1>
                    <span>You can rent or book different cars from here.</span>
                </div>
            </div>
        </div>
    </div>
    <section class="section dashboard">
        <div>
            <form action="">


                <p class="text-center">Here, you can search available vehicle as per your required.</p>
                <div class="search-container">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <a href="#" class="search-btn">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </form>
            <div class="services">
                <div>
                    <h1 class="text-center">List of available car.</h1>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($car as $car)
                            <div class="col-md-4">

                                <div class="service-item">

                                    <img src="{{ asset($car->image) }} " alt="">
                                    <div class="down-content">
                                        <h5> Car Name: <span>{{ $car->carName }}</span></h5>
                                        <div style="margin-bottom:10px;">
                                            <span>Car Model: {{ $car->model }} </span><br>
                                            Price for rent: RS.<span>{{ $car->prize }} per day</span>
                                        </div>
                                        <div>
                                            <a href="{{ route('car.detail', $car->id) }}" class="btn btn-dark">Book Now</a>
                                            &nbsp;
                                            &nbsp; &nbsp;
                                            <a href="{{ route('rent.detail', $car->id) }}" class="btn btn-dark">Rent Now</a>
                                        </div>
                                    </div>
                                </div>

                                <br>
                            </div>
                        @endforeach
                    </div>

                    <br>
                    <br>

                    <nav>
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        @endsection
