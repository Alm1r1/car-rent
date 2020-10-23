@extends('layouts.layout')


@section('body')

    <!--Post Notification Start-->
    <section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form">
                            <h3>Posto njoftim!</h3>
                            <form action="/home/createpost" method='POST' enctype="multipart/form-data">
                                @csrf

                                <select id="tipi" name='tipi' class="custom-select" required style="width: 100%">
                                    <option value="">Perzgjidh tipin e makines</option>
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
                                                <strong>Perzgjidhni tipin e makines!</strong>
                                            </span>
                                @endif
                                <br>
                                <select id="kambio" name='kambio' required class="custom-select" style="width: 100%">
                                    <option value="">Perzgjidh kambion e makines</option>
                                    <option value="manual">Manual</option>
                                    <option value="automatik">Auto</option>
                                </select>
                                @if ($errors->has('kambio'))
                                    <span class="help-block" style="color: darkred">
                                                <strong>Perzgjidhni kambion e makines!</strong>
                                            </span>
                                @endif
                                <br>
                                <select id="karburanti" name='karburanti' required class="custom-select" style="width: 100%">
                                    <option value="">Perzgjidh karburantin e makines</option>
                                    <option value="nafte">Nafte</option>
                                    <option value="benzine">Benzine</option>
                                    <option value="elektrike">Elektrike</option>
                                    <option value="gaz">Gaz</option>
                                </select>
                                @if ($errors->has('karburanti'))
                                    <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('karburanti') }}</strong>
                                            </span>
                                @endif
                                <br>

                                <select id="qyteti" name="qyteti" required class="custom-select" style="width: 100%">
                                    <option value = "" selected>Qyteti</option>
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

                                <input type="number" placeholder="Cmimi (Euro)" name="cmimi" required>
                                @if ($errors->has('cmimi'))
                                    <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('cmimi') }}</strong>
                                            </span>
                                @endif

                                <input type="number" placeholder="Viti" name="viti" required>
                                @if ($errors->has('viti'))
                                    <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('viti') }}</strong>
                                            </span>
                                @endif

                                <label for="pershkrimi" required style="color: #ffffff">Pershkrimi</label>
                                <textarea name="pershkrimi"  rows="4" cols="41">

                                </textarea>
                                @if ($errors->has('pershkrimi'))
                                    <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('pershkrimi') }}</strong>
                                            </span>
                                @endif

                                <input type="file" required name="imazhet[]" multiple/>
                                @if ($errors->has('imazhet[]'))
                                    <span class="help-block" style="color: darkred">
                                                <strong>{{ $errors->first('imazhet[]') }}</strong>
                                            </span>
                                @endif


                                <div class="log-btn">
                                    <button type="submit">Posto</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Post Notification End-->

@stop
