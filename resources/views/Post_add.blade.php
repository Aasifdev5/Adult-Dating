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
                                            <select name="hourly_price" id="post_price" class="browser-default custom-select">
                                                <option id="empty_option" value="" selected="selected">Select price</option>
                                                <option value="1000">From Rs 1000</option>
                                                <option value="2000">From Rs 2000</option>
                                                <option value="3000">From Rs 3000</option>
                                                <option value="4000">From Rs 4000</option>
                                                <option value="5000">From Rs 5000</option>
                                                <option value="6000">From Rs 6000</option>
                                                <option value="7000">From Rs 7000</option>
                                                <option value="8000">From Rs 8000</option>
                                                <option value="9000">From Rs 9000</option>
                                                <option value="10000">From Rs 10000</option>
                                                <option value="11000">From Rs 11000</option>
                                                <option value="12000">&gt; Rs 12000</option>
                                            </select>
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
                        <strong>Your contacts</strong>
                        <small class="requiredinfo text-muted pull-right">
                            <i class="fa fa-asterisk"></i> Required fields </small>
                    </h5>
                    <div class="panelar">
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
                        <div class="row">
                            <div class="col-12 form-group">
                                <label for="email_input" class="">
                                    <i class="fa fa-asterisk"></i>
                                    <i aria-hidden="true" class="fa fa-envelope pr-1"></i> Email address </label>
                                <!---->
                                <input id="email_input" name="email" type="text" readonly="readonly" class="form-control">
                                <!---->
                                <small id="emailHelp" class="form-text text-muted">Not visible on line</small>
                            </div>
                            <div class="col-12 form-group">
                                <label>
                                    <i class="fa fa-asterisk"></i>
                                    <i aria-hidden="true" class="fa fa-phone pr-2"></i> Phone Number </label>
                                <div class="telephone-input-component">
                                    <div class="" style="border-radius: 3px;">
                                        <div class="vue-tel-input pl-0">
                                            <div aria-label="Country Code Selector" aria-haspopup="listbox" role="button" tabindex="0" class="vti__dropdown disabled">
                                                <span class="vti__selection">
                                                    <span class="vti__flag in"></span>
                                                    <!---->
                                                    <span class="vti__dropdown-arrow" style="display: none;">▼</span>
                                                </span>
                                                <!---->
                                            </div>
                                            <input autocomplete="on" id="" maxlength="25" name="telephone" placeholder="+91 81234 56789" tabindex="0" aria-describedby="" type="tel" class="vti__input form-control">
                                        </div>
                                        <input type="hidden" name="telephone_national">
                                        <input type="hidden" name="telephone_international">
                                        <input type="hidden" name="telephone_international_prefix" value="+91">
                                    </div>
                                    <!---->
                                </div>
                                <!---->
                                <input type="hidden" name="telephone_details" value="{&quot;contact&quot;:&quot;&quot;}">
                            </div>
                            <div class="col-3-sm">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-transparent borderless opacity">
                                        <label class="switch switch-left-right">
                                            <input type="checkbox" disabled="disabled" class="switch-input">
                                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                        <span>
                                            <i aria-hidden="true" class="fa fa-whatsapp whatsapp fa-2x align-middle pr-2"></i>WhatsApp </span>
                                    </li>
                                </ul>
                                <input type="hidden" name="whatsapp" value="0">
                            </div>
                        </div>
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
            <div class="pt-4 card-body shadow-sm rounded text-center text-md-left">
                <div class="pb-1">
                    <span class="pr-2 pl-2">
                        <svg width="25px" height="26px" viewBox="0 0 26 27" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="noun-customer-service-6223576" fill="#000000" fill-rule="nonzero">
                                    <g id="Group">
                                        <path d="M14.5,26.7500067 C15.2509067,26.7495557 15.9520691,26.37443 16.36914,25.75 L18.7915,25.75 C21.02156,25.7606403 22.9550019,24.2095693 23.42822,22.03027 L24.73193,16.1626 C24.7388806,16.1102138 24.7398636,16.0572079 24.73486,16.0046 C26.1094834,11.4030533 24.6681544,6.42271392 21.0484211,3.26655287 C17.4286878,0.110391814 12.2984552,-0.639223287 7.92699701,1.34928744 C3.55553882,3.33779816 0.749466559,7.69751926 0.749967999,12.5 C0.744778444,14.7703438 1.37864467,16.9963228 2.5791,18.92334 L2.59473,18.95068 L2.59424,18.95068 C2.60624,18.97095 2.62085,18.98853 2.63281,19.00868 C2.73559771,19.216043 2.86440275,19.4094555 3.01611,19.58424 C3.03174,19.60572 3.04468,19.62965 3.06055,19.65089 C3.08506883,19.6822594 3.1114849,19.7120986 3.13965,19.74024 L3.15283,19.74903 L5.2627,21.85889 C6.33717124,22.9311591 8.07689876,22.9311591 9.15137,21.85889 L9.85889,21.15137 C10.931148,20.0768942 10.931148,18.3371758 9.85889,17.2627 L7.7373,15.14111 C6.6628242,14.068852 4.9231058,14.068852 3.84863,15.14111 L3.14111,15.84863 C3.05742946,15.9380162 2.97993982,16.0330031 2.90918,16.13293 C1.4553678,12.1027762 2.53613036,7.59408694 5.65907447,4.66101181 C8.78201858,1.72793667 13.3495547,0.931732928 17.2807227,2.63514936 C21.2118908,4.33856579 23.7544438,8.21564592 23.75,12.5 C23.7432167,13.7400571 23.5201459,14.969424 23.09082,16.13281 C23.0200287,16.032945 22.9425406,15.9380001 22.85889,15.84863 L22.15137,15.14111 C21.0768942,14.068852 19.3371758,14.068852 18.2627,15.14111 L16.14111,17.2627 C15.068852,18.3371758 15.068852,20.0768942 16.14111,21.15137 L16.84863,21.85889 C17.9231012,22.9311591 19.6628288,22.9311591 20.7373,21.85889 L22.271,20.3252 L21.96436,21.70508 C21.6404759,23.1962456 20.3174161,24.2574589 18.7915,24.25 L16.72461,24.25 C16.5872499,23.050673 15.5259201,22.1747763 14.3223134,22.2674274 C13.1187068,22.3600785 12.2039358,23.3880912 12.2517497,24.5943113 C12.2995636,25.8005315 13.2928361,26.7529105 14.5,26.7500067 Z M4.20166,16.90918 L4.90918,16.20166 C5.39775135,15.7146865 6.18818865,15.7146865 6.67676,16.20166 L8.79834,18.32324 C9.2856378,18.8116773 9.2856378,19.6023827 8.79834,20.09082 L8.09082,20.79834 C7.60238271,21.2856378 6.81167729,21.2856378 6.32324,20.79834 L4.22754,18.70251 C4.12060667,18.55713 4.01969333,18.40601 3.9248,18.24915 C3.74269295,17.7871546 3.85136941,17.2611732 4.20166,16.90918 Z M19.67676,20.79834 C19.1883227,21.2856378 18.3976173,21.2856378 17.90918,20.79834 L17.20166,20.09082 C16.7143622,19.6023827 16.7143622,18.8116773 17.20166,18.32324 L19.32324,16.20166 C19.8118114,15.7146865 20.6022486,15.7146865 21.09082,16.20166 L21.79834,16.90918 C22.1487439,17.2612108 22.257429,17.7873281 22.0752,18.24939 C21.9812,18.40439 21.88257,18.55469 21.77686,18.69839 L19.67676,20.79834 Z M14.5,23.75 C14.9142136,23.75 15.25,24.0857864 15.25,24.5 C15.25,24.9142136 14.9142136,25.25 14.5,25.25 C14.0857864,25.25 13.75,24.9142136 13.75,24.5 C13.7504574,24.0859761 14.0859761,23.7504574 14.5,23.75 L14.5,23.75 Z" id="Shape"></path>
                                        <circle id="Oval" cx="13" cy="11" r="1.25"></circle>
                                        <circle id="Oval" cx="17.5" cy="11" r="1.25"></circle>
                                        <circle id="Oval" cx="8.5" cy="11" r="1.25"></circle>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>
                    <span>
                        <b>Need help?</b>
                    </span>
                </div>
                <div class="pl-md-4 ml-md-4 small"> Contact us through one of our channels from <b>Monday</b> to <b>Friday</b> from 2pm to 9pm. </div>
                <div class="pt-4 ml-md-4 pb-0 pl-md-4 pb-2">
                    <h6 class="d-md-inline d-sm-block p-2">
                        <a href="https://wa.me/355692745605" target="_blank">
                            <i class="fab fa-whatsapp mr-2"></i> WhatsApp </a>
                    </h6>
                    <h6 class="d-md-inline d-sm-block p-2">
                        <a href="https://t.me/SkokkaIndiaSupport_Bot" target="_blank">
                            <i class="fab fa-telegram-plane mr-2"></i> Telegram </a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
