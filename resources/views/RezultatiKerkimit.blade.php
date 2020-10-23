@extends('layouts.layout')

@section('body')
    <div class="search-result">
        <br><br><br>
        <h5>Rezultati i kerkimit</h5>
    </div>
    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                    <div class="col-lg-12">
                        <div class="car-list-content">
                            <div class="row">
                            @foreach($results as $result)
                                <!-- Single Car Start -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-car-wrap">
                                            <div class="car-list-thumb car-thumb-1" style="background-image: url('uploads/{{$imazhet[$result->id]}}')"></div>
                                            <div class="car-list-info without-bar">
                                                <h2 style="text-transform: capitalize">{{$result->tipi}}</h2>
                                                <h5>{{$result->cmimi}} Euro / Dita</h5>
                                                <p>{{$result->pershkrimi}}</p>
                                                <ul class="car-info-list">
                                                    <li>{{$result->karburanti}}</li>
                                                    <li>{{$result->kambio}}</li>
                                                    <li>{{$result->viti}}</li>
                                                    <li>{{$result->qyteti}}</li>
                                                </ul>
                                                <a href="/searchCar/{{$result->id}}" class="rent-btn">Shiko me shume</a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Single Car End -->
                            @endforeach
                            </div>
                            <!-- Car List Content End -->
                        </div>
                    </div>
                <!-- Page Pagination Start -->
                <div class="page-pagi">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            {{ $results->appends(request()->query())->links() }}
                        </ul>
                    </nav>
                </div>
                <!--Page Pagination End -->
            </div>
        </div>
    </section>

    <!--== Car List Area End ==-->
@stop
