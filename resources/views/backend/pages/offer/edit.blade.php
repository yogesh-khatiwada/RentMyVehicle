@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Offer Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">offer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit offer</h5>

                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('offer.update', $offers->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- @foreach ($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error: </strong> {{ $error }}
                            </div>
                            <script>
                                $(".alert").alert();
                            </script>
                        @endforeach --}}
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('vehicleName') is-invalid @enderror"
                                    value="{{ $offers->vehicleName }}" name="vehicleName" id="inputText">
                                @error('vehicleName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    name="image" id="inputEmail">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('model') is-invalid @enderror"
                                    value="{{ $offers->model }}" name="model" id="inputText">
                                @error('model')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('prize') is-invalid @enderror"
                                    value="{{ $offers->prize }}" name="prize" id="inputText">
                                @error('prize')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('offer.index') }}" class="btn btn-secondary">Return</a>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>
        </div>
    </section>
@endsection

                    