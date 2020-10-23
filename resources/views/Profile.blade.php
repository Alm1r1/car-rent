@extends('layouts.layout')


@section('body')

    <!-- Profile Area Start -->
    <section class="profile-area">
        <div class="container">
            <!-- Profile Header Area Start -->
            <div class="profile-header-area">
                <div class="col-1">
                    <img src="{{url('/img/user.png')}}" alt="">
                </div>
                <div class="col-2-left">
                    <h5>{{ Auth::user()->name }}</h5>
                </div>
                <div class="col-2-right">
                    <button  class="post-car-btn" onclick="location.href='{{ url('/kontrataSiKlient/'.Auth::user()->id.'/')}}'" >Kontratat e Qeradhenies</button>
                    @if( Auth::user()->is_admin == 1)
                    <button  class="post-car-btn" onclick="location.href='{{ route('kontratatqeradhenie') }}'" >Te gjitha kontratat</button>
                    @else
                        <button  class="post-car-btn" onclick="location.href='{{ route('kontratatqeradhenie') }}'" >Kontratat Qeramarrjes</button>
                    @endif
                    <button class="post-car-btn" id= "ndrysho-te-dhenat" onclick="openNdryshoTeDhenat()">Ndryshoni te dhenat</button>
                    <button class="post-car-btn"  id= "ndrysho-fjalkalim" onclick="location.href='{{ route('changepassword.view') }}'">Ndryshoni fjalkalimin</button>
                    <button class="post-car-btn" id="posto-njoftim" onclick="location.href='{{ route('createpost') }}'"> Postoni nje njoftim</button>
                </div>
            </div>
            <!-- Profile Header Area End -->
            <!-- Profile Body Area Start -->
            <div class="profile-body-area">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <td>Emer:</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Mbiemer:</td>
                        <td>{{ Auth::user()->surname }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td> {{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td>Nr.Telefoni:</td>
                        <td>{{ Auth::user()->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>Nr.Personal:</td>
                        <td>{{ Auth::user()->personal_id }}</td>
                    </tr>
                </table>
            </div>
            <!-- Profile Body Area End -->
            <!-- Edit Personal Info Start -->
            <div id="ndrysho-te-dhenat-form" style="display: none">
                <div class="profile-body-area card">
                    <div style="background-color: #000000">
                        <h6 style="text-align: center ; color: #ffffff">Ndrysho te dhenat</h6>
                    </div>
                    <form method="POST" action="profile/edit">
                        @csrf
                        @method('PATCH')
                        <table class="table table-bordered">
                            <tr>
                                <td><label for="name">Emer:</label></td>
                                <td>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? Auth::User()->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label for="surname">Mbiemer:</label></td>
                                <td>
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{old('surname') ?? Auth::User()->surname}}"  required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label for="phone_number">Nr.Telefoni:</label></td>
                                <td>
                                    <input id="phone_number" type="tel" placeholder="06xxxxxxxx" pattern="[0-9]{10}" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{old('phone_number') ?? Auth::User()->phone_number}}" required autocomplete="phone_number" autofocus>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                        <button  type="submit" class="contrat-man-button" >Ndryshoni te dhenat</button>
                        <br>
                    </form>
                </div>
            </div>
            <!-- Edit Personal Info Start -->
        </div>
    </section>
    <!-- Profile Area End -->
    <br><br>
    <div class="search-result">
        <h5>POSTIMET</h5>
    </div>
    <div class="search-result">
    </div>
    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                    <div class="car-list-content">
                        <div class="row">
                        @foreach($makinat as $makina)
                            <!-- Single Car Start -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-car-wrap">
                                        <div class="car-list-thumb car-thumb-1" style="background-image: url('uploads/{{$imazhet[$makina->id]}}')"></div>
                                        <div class="car-list-info without-bar">
                                            <h2 style="text-transform: capitalize">{{$makina->tipi}}</h2>
                                            <h5>{{$makina->cmimi}} Euro / Dita</h5>
                                            <p>{{$makina->pershkrimi}}</p>
                                            <ul class="car-info-list">
                                                <li>{{$makina->karburanti}}</li>
                                                <li>{{$makina->kambio}}</li>
                                                <li>{{$makina->viti}}</li>
                                                <li>{{$makina->qyteti}}</li>
                                            </ul>
                                            <form method="POST" action="/home/{{$makina->id}}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="/searchCar/{{$makina->id}}" class="rent-btn">Shiko me shume</a>
                                                    <input type="submit" class="rent-btn" value="Fshij" style="border: none">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car End -->
                            @endforeach
                        </div>
                        <!-- Car List Content End -->
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
