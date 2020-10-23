@extends('layouts.layout')

@section('title')

@stop

@section('body')


    <!-- Contrat Page Area Start -->

    <h5 class="user-man-header">Kontratat</h5>

    <!-- Search Filter Start-->
    <div class="container">
        <div class="row searchFilter" >
            <div class="col-sm-12" >
            <form action="/kontrata" method="get">
            @method('GET')
            @csrf
            <div class="input-group" >
                    <input id="table_filter_user" type="text"name="user" class="form-control" placeholder="Kerko ne baze te userit" >
                    <input id="table_filter_car"name="makina" type="text" class="form-control" placeholder="Kerko ne baze te makines" >
                    <input id="curr-date" type="date" name="datekerkimi" value="" min="2020-01-01" placeholder="">
                    <div class="input-group-btn" >
                        <button id="searchBtn" type="submit" class="btn btn-secondary btn-search" ><span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Kerko</span></button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>
    <!-- Search Filter End-->

    <!-- Contract table start-->
    <div class="user-management">
        <div class="tech-info-table">
            <table class="table table-bordered">
                <tr>
                    <th>Nr</th>
                    <th>Makina</th>
                    <th>Qeramarresi</th>
                    <th>Data e fillimit</th>
                    <th>Data e mbarimit</th>
                    <th>Fshi </th>
                </tr>
                @foreach ($kontratas as $kontrata)
                <tr>
                <td>{{$kontrata->id}}</td>
                <td>{{$kontrata->tipi}}</td>
                <td>{{$kontrata->name}}</td>
                <td>{{$kontrata->starting_date}}</td>
                <td>{{$kontrata->ending_date}}</td>
                <form action="/kontrata/{{$kontrata->id}}" method="post">
                @method('DELETE')
                @csrf
                <td><button>Fshi</button></td>
                </form>

                </tr>

@endforeach
            </table>
        </div>
        <!-- Contract table end -->
        <!-- Page Pagination Start -->
        <div class="page-pagi">

            <nav aria-label="Page navigation example">
                <ul class="pagination">

                 {{ $kontratas->links() }}


                </ul>
            </nav>
        </div>
        <br>
        <br>
        <!-- Page Pagination End -->
    </div>
    <!-- Contrat Page Area Start -->

@stop
