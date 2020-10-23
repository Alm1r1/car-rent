@extends('layouts.layout')

@section('title')

    <title> Rent Car - Login </title>

@stop

@section('body')

    <!-- Login Area Start-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>{{ __('Login') }}</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="username">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="password">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="log-btn">
                                    <button type="submit"> {{__('Login') }}</button>
                                </div>
                            </form>
                        </div>

                        <div class="create-ac">
                            <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                            <input type="checkbox" onclick="showPasswordLogin()">Show Password <br>
                            <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            <br>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Area End-->

@stop
