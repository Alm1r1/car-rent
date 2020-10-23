@extends('layouts.layout')

@section('body')

    <!--    Change Password Section Start   -->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h6>Ndryshoni Fjalkalimin</h6>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form  method="POST" action="{{ route('changePassword') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

                                    <div class="password">
                                        <input id="current-password" type="password" placeholder=" Current Password" name="current-password" required>

                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">


                                    <div class="password">
                                        <input id="new-password" type="password" placeholder="New Password" name="new-password" required>

                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="password">
                                        <input id="new-password-confirm" type="password" placeholder="New Password Confirm" name="new-password_confirmation" required>
                                    </div>
                                </div>

                                <div class="log-btn">
                                    <button type="submit">Ndrysho fjalkalimin</button>
                                </div>
                            </form>
                        </div>
                        <div class="create-ac">
                            <input type="checkbox" onclick="showPasswordChange()">Show Password
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    Change Password Section End   -->
@stop
© 2020 GitHub, Inc.
