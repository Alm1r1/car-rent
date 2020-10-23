@extends('layouts.layout')

@section('body')

    <!-- Register Area Start -->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>{{ __('Register') }}</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="name">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Emer">

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control @error('surname') is-invalid @enderror" id="surname" type="text"  name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus placeholder="Mbiemer">

                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="username">
                                    <input class="form-control @error('personal_id') is-invalid @enderror"  id="personal_id" type="text" pattern="[A-Z]{1}[0-9]{8}[A-Z]{1}" name="personal_id" value="{{ old('personal_id') }}" required autocomplete="personal_id" autofocus placeholder="Personal ID format: J123456789T">
                                    @error('personal_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="username">
                                    <input class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" type="tel" placeholder="Nr.Tel format:06xxxxxxxx" pattern="[0-9]{10}"  name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus >

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="username">
                                    <input  class="form-control @error('email') is-invalid @enderror" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="password">
                                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="password">
                                    <input class="form-control" id="password-confirm" type="password"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                                <div class="log-btn">
                                    <button type="submit">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="create-ac">
                            <p>Have an account? <a href="{{ route('login') }}">Sign In</a></p>
                            <input type="checkbox" onclick="showPasswordRegister()">Show Password
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Area End-->

@stop
