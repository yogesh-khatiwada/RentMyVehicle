@extends('layouts.app')

@section('content')
<link rel="stylesheet" href= "{{ asset('frontend/css/registerr.css') }}">
<div id="login-box">
    <div class="left">
      <h1>Register Form</h1>
      <div class="card-body">
        <form method="POST" action="{{ route('front.customer.store') }}" enctype="multipart/form-data">
            @csrf
    <label for="">Name</label>
      <input type="text" placeholder="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
     
      @enderror
      <label for="">Email-Id</label>
      <input type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <label for="">Phone Number</label>
      <input type="number" placeholder="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

      @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
     
      @enderror
      <br>
      <label for="">Billbook Photo</label>
      <input type="file" placeholder="billbookphoto" class="form-control @error('billbookphoto') is-invalid @enderror" name="billbookphoto" value="{{ old('billbookphoto') }}" required autocomplete="billbookphoto" autofocus>

      @error('billbookphoto')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
     
      @enderror
      <br>
      <label for="">Citizenship Front Photo</label>
      <input type="file" placeholder="citizenshipfp" class="form-control @error('citizenshipfp') is-invalid @enderror" name="citizenshipfp" value="{{ old('citizenshipfp') }}" required autocomplete="citizenshipfp" autofocus>

      @error('citizenshipfp')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
     
      @enderror
      <br>
      <label for="">Citizenship Back Photo</label>
      <input type="file" placeholder="citizenshipbp" class="form-control @error('citizenshipbp') is-invalid @enderror" name="citizenshipbp" value="{{ old('citizenshipbp') }}" required autocomplete="citizenshipbp" autofocus>

      @error('citizenshipbp')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
     
      @enderror
      <br>
      <label for="">Enter you password</label>
      <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror 
      <br>
      <label for="">Re-enter you password</label>
      <input type="password"placeholder="Retype password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    
      
    <button type="submit">Submit</button>
    </div>
   


   
    
  </div>

@endsection

  </form>
  