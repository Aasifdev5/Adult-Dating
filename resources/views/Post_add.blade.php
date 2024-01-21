@extends('master')
@section('title')
POST AD
@endsection
@section('content')
<main>
    <hr class="my-2">
    <div class="text-center">
        <h1 class="main-title home pb-3"> Publish for free in just a few steps! </h1>
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
                        <strong>Ad info</strong>
                    </li>
                    <li class="photo ">
                        <strong>Your photos</strong>
                    </li>
                    <li class="promote ">
                        <strong>Visibility</strong>
                    </li>
                    <li class="confirm ">
                        <strong>Finish</strong>
                    </li>
                </ul>
                <hr class="my-2">
                <!---->
                <div class="form-card">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-4">
                                <strong>Your Ad</strong>
                                <small class="requiredinfo text-muted pull-right">
                                    <i class="fa fa-asterisk"></i>Required fields </small>
                            </h5>
                        </div>
                    </div>
                    <div class="panelar py-4">
                        <div class="form-row">
                            <div class="col-12 form-group">
                                <label class="">
                                    <i class="fa fa-asterisk"></i>Select category </label>
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
                                        <i aria-hidden="true" class="fab fa-font-awesome-flag mr-2"></i> Nationality </strong>
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
                                    </i>Select State </label>
                                <select class="browser-default custom-select select2" id="states" name="state">
                                    <!-- Options will be populated dynamically using jQuery Ajax -->
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <label class="">
                                    </i>Select City </label>
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

                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                <label class="">Address</label>
                                <input name="address" type="text" class="form-control">
                                <!---->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                <label class="">Postal code</label>
                                <input name="postal_code" type="text" class="form-control">
                                <!---->
                            </div>
                            <div class="col-12 form-group">
                                <label class="">Area/District/Neighbourhood</label>
                                <input name="place" type="text" class="form-control">
                                <!---->
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <h5 class="mb-4">
                        <strong>Your data</strong>
                        <small class="requiredinfo text-muted pull-right">
                            <i class="fa fa-asterisk"></i> Required fields </small>
                    </h5>
                    <div class="panelar">
                        <div class="form-row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                <label class=""><i class="fa fa-asterisk"></i>Profile Name</label>
                                <input name="name" type="text" class="form-control">
                                <!---->
                            </div>
                            <div class="col-md-4 col-xs-12 form-group">
                                <label class="">
                                    <i class="fa fa-asterisk"></i>
                                    <i aria-hidden="true" class="fa fa-calendar-check-o pr-1"></i>Age </label>
                                <input name="age" type="text" class="form-control">
                                <!---->
                            </div>
                            <div class="col-12 form-group">
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <label class="">
                                    <i class="fa fa-asterisk"></i> Title </label>
                                <small class="text-muted pull-right">5 characters required</small>
                                <textarea name="title" rows="3" placeholder="Give your ad a good title" class="form-control" spellcheck="false"></textarea>
                                <!---->
                            </div>
                            <div class="col-12 form-group">
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="dnXmp"></grammarly-extension>
                                <label class="">
                                    <i class="fa fa-asterisk"></i> Text </label>
                                <small class="text-muted pull-right">20 characters required</small>
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
                                <strong>About You</strong>
                            </h5>
                            <p class="mb-4 text-primary small">
                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                <span>Tags are only visible on <b>promoted ads.</b>
                                </span>
                            </p>
                            <div class="badger-right">
                                <span class="badge badge-new">new</span>
                            </div>
                            <div class="panelar">
                                <div id="ethnicity-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-world mr-2"></i> Ethnicity </strong>
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
                                            <i aria-hidden="true" class="icon-boobs mr-2"></i> Breast </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-non_operated" name="search_tag__breast[]" value="non_operated">
                                                <label for="tag-button-non_operated" class="contactad">
                                                    <div class="card-body mx-2"> Natural Boobs </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-bigger_breast" name="search_tag__breast[]" value="bigger_breast">
                                                <label for="tag-button-bigger_breast" class="contactad">
                                                    <div class="card-body mx-2"> Busty </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div id="hair-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-hair mr-2"></i> Hair </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-blond" name="search_tag__hair[]" value="blond">
                                                <label for="tag-button-blond" class="contactad">
                                                    <div class="card-body mx-2"> Blond Hair </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-brown" name="search_tag__hair[]" value="brown">
                                                <label for="tag-button-brown" class="contactad">
                                                    <div class="card-body mx-2"> Brown Hair </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-black" name="search_tag__hair[]" value="black">
                                                <label for="tag-button-black" class="contactad">
                                                    <div class="card-body mx-2"> Black Hair </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-red" name="search_tag__hair[]" value="red">
                                                <label for="tag-button-red" class="contactad">
                                                    <div class="card-body mx-2"> Red Hair </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                                <div id="body_type-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="icon-bodytipe mr-2"></i> Body type </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-slim" name="search_tag__body_type[]" value="slim">
                                                <label for="tag-button-slim" class="contactad">
                                                    <div class="card-body mx-2"> Slim </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-curvy" name="search_tag__body_type[]" value="curvy">
                                                <label for="tag-button-curvy" class="contactad">
                                                    <div class="card-body mx-2"> Curvy </div>
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
                                <strong>Services</strong>
                            </h5>
                            <p class="mb-4 text-primary small">
                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                <span>Tags are only visible on <b>promoted ads.</b>
                                </span>
                            </p>
                            <div class="badger-right">
                                <span class="badge badge-new">new</span>
                            </div>
                            <div class="panelar">
                                <div id="services-section" class="tag-container">
                                    <h6 class="mb-4">
                                        <strong>
                                            <i aria-hidden="true" class="far fa-heart mr-2"></i> Services </strong>
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
                                            <i aria-hidden="true" class="far fa-user mr-2"></i> Attention to </strong>
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
                                            <i aria-hidden="true" class="far fa-map mr-2"></i> Place of service </strong>
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
                                <span>Tags are only visible on <b>promoted ads.</b>
                                </span>
                            </p>
                            <div class="badger-right">
                                <span class="badge badge-new">new</span>
                            </div>
                            <div class="panelar">
                                <div>
                                    <h6 class="mb-4 mt-4">
                                        <strong>
                                            <i class="fas fa-coins mr-2"></i>Price per hour </strong>
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
                                            <i aria-hidden="true" class="far fa-credit-card mr-2"></i> Payment methods </strong>
                                    </h6>
                                    <div class="form-row">
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-cash" name="search_tag__payment_methods[]" value="cash">
                                                <label for="tag-button-cash" class="contactad">
                                                    <div class="card-body mx-2"> Cash </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="boxservice form-group">
                                            <div class="custom-control frb frb-info pl-0">
                                                <input type="checkbox" id="tag-button-credit_card" name="search_tag__payment_methods[]" value="credit_card">
                                                <label for="tag-button-credit_card" class="contactad">
                                                    <div class="card-body mx-2"> Credit Card </div>
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
                            <i class="fa fa-asterisk"></i> Required fields </small>
                    </h5>

                    <div class="panelar">
                        <div class="col-sm-12">

                            <label for="availability_hours">Availability Hours:</label>
                            <input type="text" name="availability_hours" class="form-control" value="{{ old('availability_hours') }}" placeholder="Enter available hours (comma-separated)">


                        </div>
                        <br>
                        <h6 class="mb-4">
                            <strong>How would you like to be contacted?</strong>
                        </h6>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="custom-control frb frb-info pl-0">
                                    <input type="radio" id="contact_method_only_phone" name="contact_method[]" value="0">
                                    <label for="contact_method_only_phone" class="contactad">
                                        <div class="card-body">
                                            <ul class="list-unstyled list-inline mb-0">
                                                <li class="list-inline-item mr-0 pl-4">Only Phone</li>
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
                                                <li class="list-inline-item mr-0 pl-4">Email and Phone</li>
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
                                                <li class="list-inline-item mr-0 pl-4">Only Email</li>
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
                        <div class="col-md-10 txt_privacy">* <b>Terms, Conditions and Privacy Policy</b>
                            <p> I have read the <a target="_blank" data-href="/terms-and-conditions/">Terms and Conditions</a> of use and <a target="_blank" data-href="/privacy-policy/">Privacy Policy</a> and I hereby authorize the processing of my personal data for the purpose of providing this web service. </p>
                        </div>
                    </div>
                    <ul>
                        <small>IT IS NOT ALLOWED:</small>
                        <small class="txt_privacy">
                            <li>Insert Escort ads or similar.</li>
                            <li>Make references to sexual payment services.</li>
                            <li>Insert links in the ads (clickable or not clickable).</li>
                            <li>Insert offensive or vulgar texts or pictures.</li>
                            <li>User confirms that he is of legal age according to his jurisdiction and he has not been forced in any way to create this profile</li>
                            <li>User confirms confirm that he will not offer any services that are against the law in his region</li>
                        </small>
                    </ul>
                    <hr class="my-3">
                    <div class="row stickymobile bordermobile">
                        <div class="col-md-6 px-0 ml-auto">
                            <button type="submit" class="btn btn-primary waves-effect btn-block"> Go on </button>
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
