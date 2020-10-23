@extends('layouts.layout')

@section('title')

    <title> Rent Car - User Management </title>

@stop

@section('body')

    <!--User management-->
    <h5 class="user-man-header">Manaxhimi i perdorueseve</h5>
    <!-- Search Filter Start-->
    <div class="container">
        <div class="row searchFilter" >
            <div class="col-sm-12" >
                <div class="input-group" >
                        <input id="table_filter_email" name="email" type="text" class="form-control" placeholder="Email..." >
                        <div class="input-group-btn" >
                            <button id="searchBtn" class="btn btn-secondary btn-search" onclick="findUser()" ><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Kerko</span></button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Filter End-->
    <!-- User table start-->
    <div class="user-management">
        <div class="tech-info-table">
            <table class="table table-bordered">
                <tr>
                    <th>Emer:</th>
                    <th>Mbiemer</th>
                    <th>Email</th>
                    <th>Nr.Telefoni</th>
                    <th>Nr.Personal</th>
                    <th>Fshi User</th>
                </tr>
                @foreach($users ?? 'php' as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->personal_id}}</td>
                    <td>

                        <form method="POST" action="/delete/{{$user->email}}">
                           @csrf
                            @method('DELETE')
                            <button type="submit">Fshi User</button>
                        </form>

                    </td>
                </tr>
                    @endforeach
            </table>
        </div>
    </div>
    <!-- user table end -->
    <!--User management end-->
@stop
