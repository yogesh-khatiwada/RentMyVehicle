@extends('customer.layouts.headerfooter')
@section('body-content')
    <div class="pagetitle">
        <h1>Bike Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Bike</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Bike</h5>
                    <!-- Horizontal Form -->
                    <form method="POST" action="{{ route('customer.bike.store') }}" enctype="multipart/form-data">
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
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Bike Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('bikeName') is-invalid @enderror"
                                    value="{{ old('bikeName') }}" name="bikeName" id="inputText">
                                @error('bikeName')
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
                                value="{{ old('model') }}"   name="model" id="inputEmail">
                                @error('model')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                        
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity') }}"  name="quantity" id="inputEmail">
                                @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('prize') is-invalid @enderror"
                                value="{{ old('prize') }}"   name="prize" id="inputEmail">
                                @error('prize')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                value="{{ old('date') }}" name="date" id="inputText">
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Total Day</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control @error('day') is-invalid @enderror"
                                value="{{ old('day') }}"  name="day" id="inputText">
                                @error('day')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Added By</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('added') is-invalid @enderror"
                                value="{{ old('added') }}"  name="added" id="inputText">
                                @error('added')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" value="available" type="radio" name="status"
                                    id="status1" 
                                    {{ old('status') ? (old('status') == 'available' ? 'checked' : '') : 'checked' }}>
                                    <label class="form-check-label" for="status1">
                                        Available
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="notavailable" type="radio" name="status"
                                    id="status2" {{ old('status') == 'notavailable' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status2">
                                        Not Availble
                                    </label>
                                </div>
                                @error('status')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('customer.bike.index') }}" class="btn btn-secondary">Return</a>
                        </div>
                    </form><!-- End Horizontal Form -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection