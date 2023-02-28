@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Renter Edit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Renter</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit renter user</h5>

                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('renter.update', $renters->id) }}"
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Renter Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $renters->name }}" name="name" id="inputText">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">E-mail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $renters->email }}" name="email" id="inputText">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Phone number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ $renters->number }}" name="number" id="inputText">
                                @error('number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Age</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('age') is-invalid @enderror"
                                    value="{{ $renters->age }}" name="age" id="inputText">
                                @error('age')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Temporary Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tadd') is-invalid @enderror"
                                    value="{{ $renters->tadd }}" name="tadd" id="inputText">
                                @error('tadd')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Permanent Address</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('padd') is-invalid @enderror"
                                    value="{{ $renters->padd }}" name="padd" id="inputText">
                                @error('padd')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">certizenship Photo Front</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('c_image') is-invalid @enderror"
                                    name="c_image" id="inputText">
                                @error('c_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">certizenship Photo Back</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('b_image') is-invalid @enderror"
                                    name="b_image" id="inputText">
                                @error('b_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">licesence Photo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control @error('l_image') is-invalid @enderror"
                                    name="l_image" id="inputText">
                                @error('l_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('renter.index') }}" class="btn btn-secondary">Return</a>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>
        </div>
    </section>
@endsection