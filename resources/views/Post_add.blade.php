@extends('master')
@section('title')
POST AD
@endsection
@section('content')
<main>
    <hr class="my-2">
    <div class="text-center">
        <h1 class="main-title home pb-3"> ¡Publica gratis en solo unos pasos! </h1>
    </div>
    <hr class="my-2">
    <div class="container">
        <div data-v-fe8f1c0a="" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade" style="display: none; padding-right: 15px;">
            <div data-v-fe8f1c0a="" role="document" class="modal-dialog">
                <div data-v-fe8f1c0a="" class="modal-content">
                    <div data-v-fe8f1c0a="" class="modal-header">
                        <h5 data-v-fe8f1c0a="" id="exampleModalLabel" class="modal-title"></h5>
                        <button data-v-fe8f1c0a="" type="button" data-dismiss="modal" aria-label="close" class="close">
                            <span data-v-fe8f1c0a="" aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div data-v-fe8f1c0a="" class="modal-body"></div>
                    <div data-v-fe8f1c0a="" class="modal-footer">
                        <button data-v-fe8f1c0a="" type="button" data-dismiss="modal" class="btn btn-outline-primary"> close </button>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <form method="post" action="{{url('post-insert')}}" autocomplete="off" class="msform">
                @if(Session::has('success'))
                <div class="alert alert-success" style="background-color: green;">
                    <p style="color: #fff;">{{session::get('success')}}</p>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger" style="background-color: red;">
                    <p style="color: #fff;">{{session::get('fail')}}</p>
                </div>
                @endif
                @csrf
                <input type="hidden" name="user_id" value="{{$user_session->id}}">
                <ul class="progressbar">
                    <li class="personal active">
                        <strong>Información del anuncio</strong>
                    </li>
                    <li class="photo ">
                        <strong>Tus fotos</strong>
                    </li>
                    <li class="promote ">
                        <strong>Visibilidad</strong>
                    </li>
                    <li class="confirm ">
                        <strong>Finalizar</strong>
                    </li>
                </ul>
                <hr class="my-2">
                <!---->
                <div class="form-card">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-4">
                                <strong>Información del anuncio</strong>
                                <small class="requiredinfo text-muted pull-right">
                                    <i class="fa fa-asterisk"></i>Campos requeridos </small>
                            </h5>
                        </div>
                    </div>
                    <div class="panelar py-4">
                        <div class="form-row">
                            <div class="col-12 form-group">
                                <label class="">
                                    <i class="fa fa-asterisk"></i>Selecciona categoría </label>
                                <select name="category" class="browser-default custom-select" autocomplete="off">
                                    <option value="">Please Category</option>
                                    @foreach($category as $row)
                                    <option value="{{$row->category_id}}">{{$row->category_id}}</option>
                                    @endforeach
                                </select>
                                <!---->
                            </div>
                            <div class="col-12 form-group">
                                <h6 class="mb-4">
                                    <strong>
                                        <i aria-hidden="true" class="fab fa-font-awesome-flag mr-2"></i> Nacionalidad </strong>
                                </h6>
                                @if ($countries->isNotEmpty())
                                <select class="browser-default custom-select select2" id="countrySelect" name="country">
                                    @foreach ($countries as $country)
                                    @php
                                    $countryData = json_decode($country['name'], true);
                                    $englishValue = isset($countryData['en']) ? $countryData['en'] : '';
                                    @endphp
                                    <option value="{{ $country->code }}">{{ $englishValue }}</option>
                                    @endforeach
                                </select>
                                @else
                                <strong>{{ __('countries_not_found') }}</strong>
                                @endif
                            </div>

                            <div class="col-12 form-group">
                                <label class="">
                                    </i>Seleccione estado </label>
                                <select class="browser-default custom-select select2" id="states" name="state">
                                    <!-- Options will be populated dynamically using jQuery Ajax -->
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <label class="">
                                    </i>Ciudad selecta </label>
                                <select class="form-control select2" id="city" name="city">
                                    <!-- Options will be populated dynamically using jQuery Ajax -->
                                </select>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                            <script>
                                // jQuery script for handling onchange event and fetching states and cities dynamically
                                $(document).ready(function() {
                                    // On change of the countrySelect dropdown
                                    $('#countrySelect').change(function() {
                                        var code = $(this).val();

                                        // Make an Ajax request to get states based on the selected country
                                        $.ajax({
                                            url: "{{ url('get-states') }}", // Replace with your route for getting states
                                            type: 'GET',
                                            data: {
                                                code: code
                                            },
                                            success: function(data) {
                                                // Clear existing options
                                                $('#states').empty();

                                                $.each(data, function(index, option) {
                                                    $('#states').append('<option value="' + option.value + '">' + option.text + '</option>');
                                                });
                                            }
                                        });
                                    });

                                    $('#states').change(function() {
                                        var code = $(this).val();

                                        // Make an Ajax request to get cities based on the selected state
                                        $.ajax({
                                            url: "{{ url('get-cities') }}", // Replace with your route for getting cities
                                            type: 'GET',
                                            data: {
                                                code: code
                                            },
                                            success: function(data) {
                                                // Clear existing options
                                                $('#city').empty();

                                                // Populate options for cities
                                                $.each(data, function(index, option) {
                                                    $('#city').append('<option value="' + option.value + '">' + option.text + '</option>');
                                                });
                                            }
                                        });
                                    });
                                });
                            </script>

                            <!---->


                        </div>
                    </div>
                    <hr class="my-3">
                    <h5 class="mb-4">
                        <strong>Campos obligatorios</strong>
                        <small class="requiredinfo text-muted pull-right">
                            <i class="fa fa-asterisk"></i> Campos requeridos </small>
                    </h5>
                    <div class="panelar">
                        <div class="form-row">
                          
                            <div class="col-md-4 col-xs-12 form-group">
                                <label class="">
                                    <i class="fa fa-asterisk"></i>
                                    <i aria-hidden="true" class="fa fa-calendar-check-o pr-1"></i>Edad </label>
                                <input name="age" type="text" class="form-control">
                                <!---->
                            </div>
                            <div class="col-12 form-group">
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <label class="">
                                    <i class="fa fa-asterisk"></i> Título </label>
                                <small class="text-muted pull-right">Se requieren 5 caracteres</small>
                                <textarea name="title" rows="3" placeholder="Give your ad a good title" class="form-control" spellcheck="false"></textarea>
                                <!---->
                            </div>
                            <div class="col-12 form-group">
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <label class="">
                                    <i class="fa fa-asterisk"></i> Texto </label>
                                <small class="text-muted pull-right">Se requieren 20 caracteres</small>
                                <textarea name="description" rows="5" placeholder="Use this space to describe yourself, your body, talk about your skills, what you like ..." class="form-control" spellcheck="false"></textarea>
                                <!---->
                            </div>
                        </div>
                    </div>
                    <div class="tags-sections">
                        <div class="tags-section">
                            <!---->
                            <hr class="my-3">
                            <h5>
                                <strong>Acerca de ti</strong>
                            </h5>
                            <p class="mb-4 text-primary small">
                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                <span>Las etiquetas sólo son visibles en <b>anuncios promocionados.</b>
                                </span>
                            </p>
                            <div class="badger-right">
                                <span class="badge badge-Nuevo">Nuevo</span>
                            </div>
                            <div class="panelar">
                                <div id="ethnicity-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-world mr-2"></i> Etnia </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-african" name="search_tag__ethnicity[]" value="african">
                                                <label for="tag-button-african" class="contactad">
                                                    <div class="card-body mx-2"> African </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-indian" name="search_tag__ethnicity[]" value="indian">
                                                <label for="tag-button-indian" class="contactad">
                                                    <div class="card-body mx-2"> Indian </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-asian" name="search_tag__ethnicity[]" value="asian">
                                                <label for="tag-button-asian" class="contactad">
                                                    <div class="card-body mx-2"> Asian </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-arab" name="search_tag__ethnicity[]" value="arab">
                                                <label for="tag-button-arab" class="contactad">
                                                    <div class="card-body mx-2"> Arab </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-latin" name="search_tag__ethnicity[]" value="latin">
                                                <label for="tag-button-latin" class="contactad">
                                                    <div class="card-body mx-2"> Latin </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-caucasian" name="search_tag__ethnicity[]" value="caucasian">
                                                <label for="tag-button-caucasian" class="contactad">
                                                    <div class="card-body mx-2"> Caucasian </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div id="nationality-section" class="tag-container">


                                </div>
                                <div id="breast-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-boobs mr-2"></i> Pecho </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-non_operated" name="search_tag__breast[]" value="Pechos naturales">
                                                <label for="tag-button-non_operated" class="contactad">
                                                    <div class="card-body mx-2"> Pechos naturales </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-bigger_breast" name="search_tag__breast[]" value="Tetona">
                                                <label for="tag-button-bigger_breast" class="contactad">
                                                    <div class="card-body mx-2"> Tetona </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div id="hair-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-hair mr-2"></i> Cabello </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-blond" name="search_tag__hair[]" value="Cabello rubio">
                                                <label for="tag-button-blond" class="contactad">
                                                    <div class="card-body mx-2"> Cabello rubio </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-brown" name="search_tag__hair[]" value="Cabello castaño">
                                                <label for="tag-button-brown" class="contactad">
                                                    <div class="card-body mx-2"> Cabello castaño </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-black" name="search_tag__hair[]" value="Cabello negro">
                                                <label for="tag-button-black" class="contactad">
                                                    <div class="card-body mx-2"> Cabello negro </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-red" name="search_tag__hair[]" value="Cabello rojo">
                                                <label for="tag-button-red" class="contactad">
                                                    <div class="card-body mx-2"> Cabello rojo </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div id="body_type-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-bodytipe mr-2"></i> Tipo de cuerpo </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-slim" name="search_tag__body_type[]" value="Delgada">
                                                <label for="tag-button-slim" class="contactad">
                                                    <div class="card-body mx-2"> Delgada </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-curvy" name="search_tag__body_type[]" value="Con curvas">
                                                <label for="tag-button-curvy" class="contactad">
                                                    <div class="card-body mx-2"> Con curvas </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <div class="tags-section">
                            <!---->
                            <hr class="my-3">
                            <h5>
                                <strong>Servicios</strong>
                            </h5>
                            <p class="mb-4 text-primary small">
                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                <span>Las etiquetas sólo son visibles en <b>anuncios promocionados.</b>
                                </span>
                            </p>
                            <div class="badger-right">
                                <span class="badge badge-Nuevo">Nuevo</span>
                            </div>
                            <div class="panelar">
                                <div id="services-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="far fa-heart mr-2"></i> Servicios </strong>
                                    </h6>
                                    <div class="form-row">
                                        @foreach($services as $row)
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-{{$row->category_name}}" name="search_tag__services[]" value="{{$row->category_name}}">
                                                <label for="tag-button-{{$row->category_name}}" class="contactad">
                                                    <div class="card-body mx-2"> {{$row->category_name}} </div>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                    <!---->
                                </div>
                                <div id="attention_to-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="far fa-user mr-2"></i> Atención a </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-men" name="search_tag__attention_to[]" value="men">
                                                <label for="tag-button-men" class="contactad">
                                                    <div class="card-body mx-2"> Men </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-women" name="search_tag__attention_to[]" value="women">
                                                <label for="tag-button-women" class="contactad">
                                                    <div class="card-body mx-2"> Women </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-couples" name="search_tag__attention_to[]" value="couples">
                                                <label for="tag-button-couples" class="contactad">
                                                    <div class="card-body mx-2"> Couples </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-disabled" name="search_tag__attention_to[]" value="disabled">
                                                <label for="tag-button-disabled" class="contactad">
                                                    <div class="card-body mx-2"> Disabled </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div id="place_of_service-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="far fa-map mr-2"></i> Lugar de servicio </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-at_home" name="search_tag__place_of_service[]" value="at_home">
                                                <label for="tag-button-at_home" class="contactad">
                                                    <div class="card-body mx-2"> At home </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-events_parties" name="search_tag__place_of_service[]" value="events_parties">
                                                <label for="tag-button-events_parties" class="contactad">
                                                    <div class="card-body mx-2"> Events and parties </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-hotel_motel" name="search_tag__place_of_service[]" value="hotel_motel">
                                                <label for="tag-button-hotel_motel" class="contactad">
                                                    <div class="card-body mx-2"> Hotel / Motel </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-clubs" name="search_tag__place_of_service[]" value="clubs">
                                                <label for="tag-button-clubs" class="contactad">
                                                    <div class="card-body mx-2"> Clubs </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-outcall" name="search_tag__place_of_service[]" value="outcall">
                                                <label for="tag-button-outcall" class="contactad">
                                                    <div class="card-body mx-2"> Outcall </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                        </div>
                        <!---->
                        <div class="payment-method-section">
                            <hr class="my-3">
                            <h5>
                                <strong>Pricing</strong>
                            </h5>
                            <p class="mb-4 text-primary small">
                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                <span>Las etiquetas sólo son visibles en <b>anuncios promocionados.</b>
                                </span>
                            </p>
                            <div class="badger-right">
                                <span class="badge badge-Nuevo">Nuevo</span>
                            </div>
                            <div class="panelar">
                                <div>
                                    <h6 class="mb-4 mt-4">
                                        <strong>
                                            <i class="fas fa-coins mr-2"></i>Precio por hora </strong>
                                    </h6>
                                    <div class="form-row d-flex align-items-baseline">
                                        <div class="col-12 form-group">
                                            <input type="text" name="hourly_price" placeholder="Enter Your Hourly Price" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="tag-container mt-4">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="far fa-credit-card mr-2"></i> Métodos de pago </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-cash" name="search_tag__payment_methods[]" value="Efectivo">
                                                <label for="tag-button-cash" class="contactad">
                                                    <div class="card-body mx-2"> Efectivo </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-credit_card" name="search_tag__payment_methods[]" value="Tarjeta de crédito">
                                                <label for="tag-button-credit_card" class="contactad">
                                                    <div class="card-body mx-2">Tarjeta de crédito</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <h5 class="mb-4">
                        <strong>Your Availability & Contacts</strong>
                        <small class="requiredinfo text-muted pull-right">
                            <i class="fa fa-asterisk"></i> Campos requeridos </small>
                    </h5>

                    <div class="panelar">
                       
                        
                        <h6 class="mb-4">
                            <strong>¿Cómo te gustaría ser contactado?</strong>
                        </h6>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-control frb frb-info pl-0">
                                    <input type="radio" id="contact_method_only_phone" name="contact_method[]" value="0">
                                    <label for="contact_method_only_phone" class="contactad">
                                        <div class="card-body">
                                            <ul class="list-unstyled list-inline mb-0">
                                                <li class="list-inline-item mr-0 pl-4">Solo teléfono</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control frb frb-info pl-0">
                                    <input type="radio" id="contact_method_email_and_phone" name="contact_method[]" value="null">
                                    <label for="contact_method_email_and_phone" class="contactad">
                                        <div class="card-body">
                                            <ul class="list-unstyled list-inline mb-0">
                                                <li class="list-inline-item mr-0 pl-4">Correo electrónico y teléfono</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control frb frb-info pl-0">
                                    <input type="radio" id="contact_method_only_email" name="contact_method[]" value="1">
                                    <label for="contact_method_only_email" class="contactad">
                                        <div class="card-body">
                                            <ul class="list-unstyled list-inline mb-0">
                                                <li class="list-inline-item mr-0 pl-4">Solo correo electrónico</li>
                                            </ul>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">

                    </div>
                    <hr class="my-3">

                    <hr class="my-3">
                    <div class="row">
                        <div class="col-md-1">
                            <label class="switch switch-left-right">
                                <input name="terms" type="checkbox" class="switch-input">
                                <span data-on="Yes" data-off="No" class="switch-label"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                        <div class="col-md-10 txt_privacy">* <b>Términos, condiciones y política de privacidad</b>
                            <p> He leído los Términos y Condiciones de uso y la Política de Privacidad y autorizo el procesamiento de mis datos personales con el fin de proporcionar este servicio web. </p>
                        </div>
                    </div>
                    <ul>
                        <small>NO SE PERMITE:</small>
                        <small class="txt_privacy">
                            <li>Insertar anuncios de Escorts o similares.</li>
                            <li>Hacer referencia a servicios de pago sexual.</li>
                            <li>Insertar enlaces en los anuncios (clicables o no clicables).</li>
                            <li>Insertar textos o imágenes ofensivas o vulgares.</li>
                            <li>El usuario confirma que es mayor de edad según su jurisdicción y que no ha sido obligado de ninguna manera a crear este perfil.</li>
                            <li>El usuario confirma que no ofrecerá servicios que vayan en contra de la ley en su región.</li>
                        </small>
                    </ul>
                    <hr class="my-3">
                    <div class="row stickymobile bordermobile">
                        <div class="col-md-6 px-0 ml-auto">
                            <button type="submit" class="btn btn-primary waves-effect btn-block"> CONTINUAR </button>
                        </div>
                    </div>
                </div>
            </form>
            <div tabindex="-1" data-backdrop="static" class="modal">
                <div role="document" class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-white">
                            <i class="icon-phonecheck display-4 mr-2"></i>
                            <h6 id="chektelLabel" class="modal-title align-self-center">
                                <strong>PHONE NUMBER VERIFICATION</strong>
                            </h6>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <!---->
                        <!---->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">

        </div>
    </div>
</main>

@endsection
