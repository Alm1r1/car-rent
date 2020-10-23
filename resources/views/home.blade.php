@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"><h3>You are logged in!</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Name : {{ Auth::user()->name }} <br>
                    Surname : {{ Auth::user()->surname }} <br>
                    Email : {{ Auth::user()->email }} <br>
                    Phone Number : {{ Auth::user()->phone_number }} <br>
                    Personal ID : {{ Auth::user()->personal_id }}
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
