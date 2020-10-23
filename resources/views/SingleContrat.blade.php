@extends('layouts.layout')

@section('title')

    <title> Rent Car - Kontrata </title>

@stop

@section('body')

    <!-- Single Contrat Area Start -->

    <h5 class="user-man-header"> Numri i kontrates .{{$kontrata->id}}</h5>

    <!-- Contract Table Start-->
    <div class="table-neumorphic-center">
        <table class="neumorphic">
            <tr>
                <th>Nr</th>
                <td>{{$kontrata->id}}</td>
            </tr>
            <tr>
                <th>Id Makines</th>
                <td>{{$kontrata->makina_id}}</td>
            </tr>
            <tr>
                <th>Id Userit</th>
                <td>{{$kontrata->user_id}}</td>
            </tr>
            
            <tr>
                <th>Data e fillimit</th>
                <td>{{$kontrata->starting_date}}</td>
            </tr>
            <tr>
                <th>Data e mbarimit</th>
                <td>{{$kontrata->ending_date}}</td>
            </tr>
        </table>
    </div>
    <!-- Contract Table End -->
    <!-- Single Contrat Area End -->
@stop
