@extends('layouts.layout')

@section('body')
    <!-- Slider Area Start -->
    <section id="slider-area">
        <div class="single-slide-item overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="book-a-car">
                            <form action='/search' method="GET">
                            @csrf
                                <!--== Pick Up Location ==-->
                                <div class="pickup-location book-item">
                                    <h6>Zgjidh qytetin:</h6>
                                    <select id="qyteti" name="qyteti" class="custom-select">
                                        <option value = "" selected>Gjithe Shqiperia</option>
                                        <option value="Berat">Berat</option>
                                        <option value="Bulqize">Bulqize</option>
                                        <option value="Delvin">Delvin</option>
                                        <option value="Devoll">Devoll</option>
                                        <option value="Diber">Diber</option>
                                        <option value="Durres">Durres</option>
                                        <option value="Elbasan">Elbasan</option>
                                        <option value="Fier">Fier</option>
                                        <option value="Gramsh">Gramsh</option>
                                        <option value="Gjirokaster">Gjirokaster</option>
                                        <option value="Has">Has</option>
                                        <option value="Kavaje">Kavaje</option>
                                        <option value="Kolonje">Kolonje</option>
                                        <option value="Korce">Korce</option>
                                        <option value="Kruje">Kruje</option>
                                        <option value="Kucove">Kucove</option>
                                        <option value="Kukes">Kukes</option>
                                        <option value="Kurbin">Kurbin</option>
                                        <option value="Lezhe">Lezhe</option>
                                        <option value="Librazhd">Librazhd</option>
                                        <option value="Lushnje">Lushnje</option>
                                        <option value="Malesi E Madhe">Malesi E Madhe</option>
                                        <option value="Mallakaster">Mallakaster</option>
                                        <option value="Mat">Mat</option>
                                        <option value="Mirdite">Mirdite</option>
                                        <option value="Peqin">Peqin</option>
                                        <option value="Permet">Permet</option>
                                        <option value="Pogradec">Pogradec</option>
                                        <option value="Puke">Puke</option>
                                        <option value="Sarande">Sarande</option>
                                        <option value="Skrapar">Skrapar</option>
                                        <option value="Shkoder">Shkoder</option>
                                        <option value="Tepelene">Tepelene</option>
                                        <option value="Tirane">Tirane</option>
                                        <option value="Tropoje">Tropoje</option>
                                        <option value="Vlore">Vlore</option>
                                    </select>
                                    @if ($errors->has('qyteti'))
                                        <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('qyteti') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <!-- Pick Up Location -->

                                <!-- Pick Up Date -->
                                <div class="pick-up-date book-item">
                                    <h6>Data e marrjes:</h6>
                                    <input id="starting_date" name="starting_date" type="date" placeholder="day/month/year" />
                                    @if ($errors->has('starting_date'))
                                        <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('starting_date') }}</strong>
                                            </span>
                                    @endif

                                    <div class="return-car">
                                        <h6>Data e kthimit:</h6>
                                        <input id="ending_date" name="ending_date" type="date" placeholder="day/month/year" />

                                        @if ($errors->has('ending_date'))
                                            <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('ending_date') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                                <!-- Pick Up Date -->

                                <!-- Car Choose -->
                                <div class="choose-car-type book-item">
                                    <h6>Tipi makines:</h6>
                                    <select id="tipi" name="tipi" class="custom-select">
                                        <option value ="" selected>Te gjitha</option>
                                        <option value="Alfa Romeo">Alfa Romeo</option>
                                        <option value="Audi">Audi</option>
                                        <option value="Bentley">Bentley</option>
                                        <option value="Bmw">Bmw</option>
                                        <option value="Cadillac">Cadillac</option>
                                        <option value="Chevrolet">Chevrolet</option>
                                        <option value="Citroen">Citroen</option>
                                        <option value="Dodge">Dodge</option>
                                        <option value="Ferrari">Ferrari</option>
                                        <option value="Fiat">Fiat</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Hummer">Hummer</option>
                                        <option value="Hyunday">Hyunday</option>
                                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                                        <option value="Opel">Opel</option>
                                        <option value="Volswagen">Volswagen</option>
                                        <option value="Renault">Renault</option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="Volwo">Volwo</option>
                                        <option value="Jeep">Jeep</option>
                                        <option value="Kia">Kia</option>
                                    </select>
                                    @if ($errors->has('tipi'))
                                        <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('tipi') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <!-- Car Choose -->

                                <!-- Price Choose -->
                                <div class="choose-price book-item">
                                    <h6>Cmimi minimal:</h6>
                                    <select id="cmimi_min" name="cmimi_min" class="custom-select">
                                        <option value=0 selected>0$</option>
                                        <option value=10>10$</option>
                                        <option value=20>20$</option>
                                        <option value=30>30$</option>
                                        <option value=40>40$</option>
                                        <option value=50>50$</option>
                                        <option value=60>60$</option>
                                        <option value=70>70$</option>
                                        <option value=80>80$</option>
                                        <option value=90>90$</option>
                                        <option value=100>100$</option>
                                        <option value=125>125$</option>
                                        <option value=150>150$</option>
                                        <option value=175>175$</option>
                                        <option value=200>200$</option>
                                        <option value=150>250$</option>
                                        <option value=300>300$</option>
                                        <option value=350>350$</option>
                                        <option value=400>400$</option>
                                    </select>
                                    @if ($errors->has('cmimi_min'))
                                        <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('cmimi_min') }}</strong>
                                            </span>
                                    @endif
                                    <div class="max-price">
                                        <h6>Cmimi maksimal:</h6>
                                        <select id="cmimi_max" name="cmimi_max" class="custom-select">
                                            <option value=600 selected>Pa limit</option>
                                            <option value=10>10$</option>
                                            <option value=20>20$</option>
                                            <option value=30>30$</option>
                                            <option value=40>40$</option>
                                            <option value=50>50$</option>
                                            <option value=60>60$</option>
                                            <option value=70>70$</option>
                                            <option value=80>80$</option>
                                            <option value=90>90$</option>
                                            <option value=100>100$</option>
                                            <option value=125>125$</option>
                                            <option value=150>150$</option>
                                            <option value=175>175$</option>
                                            <option value=200>200$</option>
                                            <option value=250>250$</option>
                                            <option value=300>300$</option>
                                            <option value=350>350$</option>
                                            <option value=400>400$</option>
                                            <option value=500>500$</option>
                                        </select>
                                        @if ($errors->has('cmimi_max'))
                                            <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('cmimi_max') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Price Choose -->

                                <div class="book-button text-center">
                                    <button class="book-now-btn" type="submit" >Kerko</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-7 text-right">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <div class="slider-right-text">
                                    <h3>Gjeni makinen tuaj te preferuar!</h3>
                                    <p>Doni dhe ju te postoni makinen tuaj? <a href="{{ url('/register') }}">Regjistrohuni!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <br>
        <br>
    </div>
@stop

