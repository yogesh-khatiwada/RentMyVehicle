@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>contact Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">contact</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create contant detail</h5>
                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @foreach ($errors->all() as $error)
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Error: </strong> {{ $error }}
                            </div>
                            <script>
                                $(".alert").alert();
                            </script>
                        @endforeach --}}
                       
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" name="phone" id="inputText">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" id="inputText">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                value="{{ old('location') }}" name="location" id="inputText">
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('contact.index') }}" class="btn btn-secondary">Return</a>
                        </div>
                    </form><!-- End Horizontal Form -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection