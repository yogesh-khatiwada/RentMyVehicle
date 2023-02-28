@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Offer Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Offer</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Offer</h5>
                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('offer.store') }}" enctype="multipart/form-data">
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('vehicleName') is-invalid @enderror"
                                    value="{{ old('vehicleName') }}" name="vehicleName" id="inputText">
                                @error('vehicleName')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="image" id="inputText">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Model</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('model') is-invalid @enderror"
                                value="{{ old('model') }}"   name="model" id="inputText">
                                @error('model')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                       
                       
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('prize') is-invalid @enderror"
                                value="{{ old('prize') }}"   name="prize" id="inputText">
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
        </div>
    </section>
@endsection