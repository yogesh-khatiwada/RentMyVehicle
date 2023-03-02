@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Customer Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Customer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Customer</h5>
                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error: </strong> {{ $error }}
                            </div>
                            <script>
                                $(".alert").alert();
                            </script>
                        @endforeach
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" name="name" id="inputText">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email-ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"  name="email" id="inputEmail">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}"   name="phone" id="inputText">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Billbook Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control @error('billbookphoto') is-invalid @enderror"
                                            name="billbookphoto" id="billbook-photo">
                                        @error('billbookphoto')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">citizenship front Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control @error('citizenshipfp') is-invalid @enderror"
                                            name="citizenshipfp" id="citizenshipfp">
                                        @error('citizenshipfp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">citizenship-b-p </label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control @error('citizenshipbp') is-invalid @enderror"
                                            name="citizenshipbp" id="citizenshipbp">
                                        @error('citizenshipbp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                       
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('car.index') }}" class="btn btn-secondary">Return</a>
                        </div>
                    </form><!-- End Horizontal Form -->
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection