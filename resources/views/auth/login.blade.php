@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login Page</title>
    </head>

    <body>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><span class="fa fa-android"></span></h2>
                    </span>
                    <h4 class="company_title">Rent My Vehicle</h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Log In</h2>
                        </div>
                        <div class="row">
                            <form control="" class="form-group" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="login__field">
                                        <i class="login__icon fas fa-envelope"></i>
                                        <input type="text" name="email" id="email" placeholder="Email"
                                            class="form__input @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>

                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="field">
                                        <i class="l_icon fas fa-lock"></i>
                                        <input type="password" name="password" id="password" placeholder="Password"
                                            class="form__input @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                    </div>

                                    @error('password')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember Me!</label>
                                </div>
                                <div class="row">
                                    <input type="submit" value="login" class="btn">

                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>
                        </div>
                        <div class="row">
                            <p>Don't have an account? <a href="/register">Register Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->

    </body>
@endsection
