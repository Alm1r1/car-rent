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
                <form action="/kontrata/clientsearch" method="get">
                    @method('GET')
                    @csrf
                    <div class="input-group" >
                        <input id="table_filter_user" type="text"name="qm" class="form-control" placeholder="Kerko ne baze te qeradhenesit" >
                        <input id="table_filter_user" type="text"name="qr" class="form-control" placeholder="Kerko ne baze te qeramarresit" >
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
                    <th>Qiradhenesi</th>
                    <th>Qiramarres</th>
                    <th>Data e fillimit</th>
                    <th>Data e mbarimit</th>
                </tr>
                @foreach ($kontratas as $kontrata)
                    <tr>
                        <td>{{$kontrata->kontrataId}}</td>
                        <td>{{$kontrata->tipi}}</td>
                        <td>{{$kontrata->qiradhenesi}}</td>
                        <td>{{$kontrata->qiramarresi}}</td>
                        <td>{{$kontrata->starting_date}}</td>
                        <td>{{$kontrata->ending_date}}</td>
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
