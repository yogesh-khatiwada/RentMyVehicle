@extends('layouts.app')

@section('content')
<link rel="stylesheet" href= "{{ asset('frontend/css/register.css') }}">
<div id="login-box">
    <div class="left">
      <h1>Register Form</h1>
      <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
      <input type="text" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
     
      @enderror
      <input type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror 
      <input type="password"placeholder="Retype password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    
      
      <input type="submit" name="signup_submit" value="Register" />
    </div>
   


   
    
  </div>

@endsection
