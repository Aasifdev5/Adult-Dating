@extends('master')
@section('title')
Ad Details
@endsection
@section('content')
<nav class="breadcrumb">
    <div class="container">
        <ol itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList" id="bc1" class="btn-group btn-breadcrumb list-inline">
            <li itemprop="itemListElement" itemscope="itemscope">
                <a itemscope="itemscope" itemid="" itemtype="http://schema.org/Service" itemprop="item" href="/" class="btn btn-outline-primary">
                    <i itemprop="name" class="fa fa-home">
                        <span class="bcseo-text"> India </span>
                    </i>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="itemscope" class="list-bcseo">
                <a itemscope="itemscope" itemid="massages/" itemtype="http://schema.org/Service" itemprop="item" href="{{url('ads_list/')}}/<?php echo $id; ?>" class="btn btn-outline-primary ">
                    <div itemprop="name">{{$id}}</div>
                </a>
                <meta itemprop="position" content="2">
            </li>


        </ol>
    </div>
</nav>
<main>
    <div class="container-fluid p-0">
        <div class="container pt-0">
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
            <div class="row">
                <div class="col">
                    <div class="date-id">
                        <span>
                            <b> <?php

                                if (!empty($ads_details->created_at)) {
                                    $time = strtotime($ads_details->created_at);
                                    echo  $date = date('d F Y', $time);
                                }

                                // dd($_SERVER);
                                ?> </b>
                        </span> - <span> Ad ID: {{$ads_details->id}} </span>
                    </div>
                    <div class="detail tagcard">
                        <span class="badge-pill">
                            <b> {{$ads_details->age}} years </b>
                        </span>
                        <span translate="no" class="badge-pill notranslate">
                            <i class="icon icon-map-pin mr-1"></i>
                            <b>{{$ads_details->city}}</b>
                        </span>
                    </div>
                    <h1 class="main-title">{{$ads_details->title}}</h1>
                </div>
                <div class="col-md-3 contactdk">
                    @if(!empty($user_session))
                    <button class="btn btn-primary btn-phone btn-block mt-1" onclick="getModal()">Schedule Appointment</button>
                       <!-- Modal for Schedule Appointment -->
        <div class="modal" id="appointmentModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Schedule Appointment</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="appointmentForm" action="{{url('ScheduleAppointment')}}" method="post">
                            @csrf
                            <input type="hidden" name="ad_id" id="" value="{{$ads_details->id}}">
                            <input type="hidden" name="user_id" id="" value="{{$user_session->id}}">
                            <div class="form-group">
                                <label for="appointmentDate">Select a Date:</label>
                                <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" id="appointmentDate" min="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="appointmentTime">Select a Time:</label>
                                <input type="time" class="form-control" name="time" id="appointmentTime" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Schedule</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script>
            function getModal() {
                $('#appointmentModal').modal('show');
            }
        </script>
                    @else
                    <button class="btn btn-primary btn-phone btn-block mt-1" data-toggle="modal" data-target="#signup">Schedule Appointment</button>
                    @endif
                </div>
            </div>
        </div>

        <div id="signup" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" class="modal fade menu">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 id="staticBackdropLabel" class="modal-title">
                            <i class="icon icon-Social Citas signup pr-2"></i> Get into Social Citas!
                        </h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body promomodal">
                        <hr class="my-1">
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item border-0">
                                <strong>Publish and Manage </strong>your ads
                            </li>
                        </ul>
                        <div class="action">
                            <p class="small"> Have an account yet? </p>
                            <a data-href="{{url('Userlogin')}}">
                                <button type="button" class="btn btn-primary w-75 mb-4">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Login </button>
                            </a>
                            <p class="small"> Don't have an account yet? </p>
                            <a data-href="{{url('signup')}}">
                                <button type="button" class="btn btn-outline-primary w-75">
                                    <i class="fas fa-edit mr-2"></i> Sign up </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Modal -->


        <div id="images-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal modal-fullscreen-xl">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header detailphoto d-flex justify-content-start">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close m-0 p-0">
                            <span aria-hidden="true">
                                <i class="fas fa-chevron-left pr-2"></i>
                            </span>
                        </button>
                        <h5 class="modal-title">
                            <a data-dismiss="modal" aria-label="Close">Back to the ad</a>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="masonry">
                            @php
                            $adsPhotos = App\Models\Image::where('user_id', $ads_details->user_id)->get();
                            @endphp

                            @foreach ($adsPhotos as $index => $adsPhoto)
                            <div class="mySlider__item slider-item">
                                <div class="brick">
                                    <a href="{{ asset('storage/' . $adsPhoto->path) }}">
                                        <img src="{{ asset('storage/' . $adsPhoto->path) }}" class="v-lazy-image">
                                    </a>
                                </div>
                            </div>
                            @endforeach






                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container container-photo">
            <div class="foto-expand onlymobile">
                <button data-toggle="modal" data-target="#images-modal" class="btn btn-open-modal">
                    <i class="fas fa-expand mr-2"></i>Show all </button>
            </div>
            <div class="mySlider slider-container masonry">
                @php
                $adsPhotos = App\Models\Image::where('user_id', $ads_details->user_id)->where('ad_id', $ads_details->id)->get();
                @endphp

                @foreach ($adsPhotos as $index => $adsPhoto)
                <div class="mySlider__item slider-item">
                    <div class="brick">
                        <a href="{{ asset('storage/' . $adsPhoto->path) }}">
                            <img src="{{ asset('storage/' . $adsPhoto->path) }}" class="v-lazy-image">
                        </a>
                    </div>
                </div>
                @endforeach



            </div>
            <div class="container pt-0">
                <hr>
                <div class="detail-promo supertop">
                    <span class="service-detail badge badge-pill top">
                        <i class="icon-top-listing mr-1"></i>
                    </span>
                    <hr>
                </div>
                <div class="col service-detail">
                    <h5>
                        <strong>
                            <i class="far fa-grin-wink"></i>About me </strong>
                    </h5>
                    <p> {{$ads_details->description}}
                    </p>
                    <div class="tags-sections-detail">
                        <div class="tags-list-detail">
                            <!---->
                            <!---->
                            <p>
                                <span class="badge badge-pill"> {{$ads_details->search_tag__ethnicity}} </span>
                                <span class="badge badge-pill"> {{str_replace("_"," ",$ads_details->search_tag__nationality)}} </span>
                                <span class="badge badge-pill"> {{str_replace("_"," ",$ads_details->search_tag__breast)}} </span>
                                <span class="badge badge-pill"> {{str_replace("_"," ",$ads_details->search_tag__hair)}} </span>
                                <span class="badge badge-pill"> {{str_replace("_"," ",$ads_details->third_model_name)}} </span>
                            </p>
                        </div>
                        <div class="tags-list-detail">
                            <hr class="my-4">
                            <h5>
                                <strong>
                                    <i class="far fa-heart"></i>Services </strong>
                            </h5>
                            <p>
                                @foreach(explode(',', $ads_details->search_tag__services) as $service)
                                <span class="badge badge-pill"> {{ str_replace("_"," ",$service)  }} </span>

                                @endforeach


                            </p>
                        </div>
                        <div class="tags-list-detail">
                            <hr class="my-4">
                            <h5>
                                <strong>
                                    <i class="far fa-user"></i>Attention to </strong>
                            </h5>
                            <p>
                                @foreach(explode(',', $ads_details->search_tag__attention_to) as $service)
                                <span class="badge badge-pill"> {{ $service }} </span>

                                @endforeach

                            </p>
                        </div>
                        <div class="tags-list-detail">
                            <hr class="my-4">
                            <h5>
                                <strong>
                                    <i class="far fa-map"></i>Place of service </strong>
                            </h5>
                            <p>
                                @foreach(explode(',', $ads_details->search_tag__place_of_service) as $service)
                                <span class="badge badge-pill"> {{ str_replace("_"," ",$service) }} </span>

                                @endforeach

                            </p>
                        </div>
                        <!---->
                        <div class="pricing-detail">
                            <hr class="my-4">
                            <h5>
                                <strong>
                                    <i class="fas fa-coins"></i>Payments </strong>
                            </h5>
                            <small>
                                <b>Price per hour</b>
                            </small>
                            <ul class="list-group price-hour">
                                <li class="list-group-item d-flex justify-content-between align-items-center"> From <span class="badge badge-light badge-pill">Rs {{$ads_details->hourly_price}}</span>
                                </li>
                            </ul>
                            <p class="mt-2">
                                @foreach(explode(',', $ads_details->search_tag__payment_methods) as $service)
                                <span class="badge badge-pill">
                                    @if($service=="cash")
                                    <i class="fas fa-coins mr-2"></i>
                                    Cash
                                    @else
                                    <i class="fa fa-credit-card mr-2"></i> Credit Card
                                    @endif
                                </span>

                                @endforeach

                            </p>
                        </div>
                    </div>
                </div>
                <hr class="my-5">


            </div>
        </div>



    </div>
</main>
@endsection
