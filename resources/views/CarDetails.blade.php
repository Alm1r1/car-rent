@extends('layouts.layout')

@section('title')

    <title> Rent Car - Car Details </title>

@stop

@section('body')

    <!--    Car Details Area Start -->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            @if ($errors->has('data') or $errors->has('data2'))
                <span class="help-block" style="color: darkred">
                    <strong>Rezervimi deshtoi, Provo perseri!</strong>
                </span>
            @endif

            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-8">
                    <div class="car-details-content">
                        <h2 style="text-transform: capitalize">{{$makina->tipi}}<span class="price" >Rent: <b >{{$makina->cmimi}} </b></span></h2>
                        <div class="slideshow-container">

                            @foreach ($imazhet as $imazh)
                                <div class="mySlides fade">
                                    <img src="/uploads/{{$imazh->img_path}}" style="width:100%">
                                </div>
                            @endforeach

                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                        </div>
                        <br>

                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>

                        <div class="car-details-info">
                            <h4>Informacion shtese</h4>
                            <p>{{$makina->pershkrimi}}</p>

                            <div class="technical-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="tech-info-table">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Tipi i makines</th>
                                                    <td>{{$makina->tipi}}</td>
                                                </tr>

                                                <tr>
                                                    <th>viti</th>
                                                    <td>{{$makina->viti}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kambio</th>
                                                    <td>{{$makina->kambio}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Karburanti</th>
                                                    <td>{{$makina->karburanti}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Qyteti</th>
                                                    <td>{{$makina->qyteti}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--== Book now Page Content Start ==-->
                    <div class="book-now-form" id="myForm">
                        <h3>Rezervo</h3>
                        <form action="/kontrata/{{$makina->id}}" method="POST">

                            @csrf
                            <div class="fd-td">
                                <h6>Nga - Deri</h6>
                                <input class="date-input" type="date" name="data" id="nga-data"  required >
                                @if ($errors->has('data'))
                                    <span class="help-block" style="color: darkred">
                                                <strong><br>{{ $errors->first('data') }}</strong>
                                            </span>
                                @endif

                                   <input class="date-input" type="date" name="data2" id="deri-data" required  >
                                @if ($errors->has('data2'))
                                    <span class="help-block" style="color: darkred">
                                                <strong><br>{{ $errors->first('data2') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="submit" class="book-now-buton-2" onclick="" value="Rezervo">
                            <input type="button" class="book-now-buton-2" onclick= "closeMyForm()" value="Anullo Rezervimin">
                        </form>
                    </div>
                    <!--== Book now Page Content End ==-->
                    <input type="button" class="book-now-buton-1" id="book-now-button-1" value="Rezervo" onclick="openMyForm()">
                </div>
                <!-- Car List Content End -->

                <!-- Sidebar Area Start -->
                <div class="col-lg-4">
                    <div class="sidebar-content-wrap m-t-50">
                        <!-- Single Sidebar Start -->
                        <div class="single-sidebar">
                            <h3>Postuar nga</h3>
                            <div class="sidebar-body">
                                @foreach ($user as $useri)
                                    <p><i class="fa fa-mobile"></i>Username: {{$useri->name}} {{$useri->surname}}</p>
                                @endforeach
                            </div>
                        </div>
                        <!-- Single Sidebar End -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

@stop
