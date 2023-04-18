@extends('customer.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <div class="col">
                <h5 class="card-title">Details</h5>
            </div>
            <div class="row d-flex">
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card bg-info text-black">




                        <div class="card-body">
                            <h3 class="card-title">Total Cars</h3>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-car" style="font-size:50px;"></i>
                                </div>
                                <div class="ps-3">

                                    {{-- <h2>  {{$data}}</h2> --}}


                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card bg-info text-black">
                        <div class="card-body">
                            <h3 class="card-title">Total Bikes</h3>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-cycling" style="font-size:50px;"></i>
                                </div>
                                <div class="ps-3">

                                    {{-- <h2> {{$databike}}</h2> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->


                <div class="row d-flex">
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card bg-info text-black">




                            <div class="card-body">
                                <h3 class="card-title">Total Offer</h3>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-offer" style="font-size:50px;"></i>
                                    </div>
                                    <div class="ps-3">

                                        {{-- <h2> {{$dataoffer}}</h2> --}}



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        </section>
    @endsection
