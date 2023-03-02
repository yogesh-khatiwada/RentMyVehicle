@extends('backend.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Customer Edit</h1>
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
                    <h5 class="card-title">Edit Customer</h5>

                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('customer.update', $customers->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ $customers->name }}" name="name" id="inputText">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email-ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                 value="{{ $customers->email }}" name="email" id="inputEmail">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ $customers->phone }}"  name="phone" id="inputText">
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

                                  
                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Accept" type="radio" name="status"
                                                        id="status1" value="option1"
                                                        {{ old('status') ? (old('status') == 'Accept' ? 'checked' : '') : 'checked' }}>
                                                    <label class="form-check-label" for="status1">
                                                        Accept
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" value="cancel" type="radio" name="status"
                                                        id="status2" value="option2" {{ old('status') == 'cancel' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="status2">
                                                        Cancel
                                                    </label>
                                                </div>
                                                @error('status')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </fieldset>
                                       
                                           

                                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('car.index') }}" class="btn btn-secondary">Return</a>
                        </div>
                    </form><!-- End Horizontal Form -->

                </div>
            </div>
        </div>
    </section>
@endsection