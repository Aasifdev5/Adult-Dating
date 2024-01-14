@extends('master')
@section('title')
Ad Details
@endsection
@section('content')
<nav class="breadcrumb">
    <div class="container">
        <div class="goback">
            <a href="javascript:void(0)" onclick="window.$skokka.goToLastListing('call-girls/hyderabad/')"> &lt; Back to search</a>
        </div>
        <ol itemscope="itemscope" itemtype="http://schema.org/BreadcrumbList" id="bc1" class="btn-group btn-breadcrumb list-inline">
            <li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem">
                <a itemscope="itemscope" itemid="https://www.skokka.in" itemtype="http://schema.org/Service" itemprop="item" href="https://www.skokka.in" class="btn btn-outline-primary">
                    <i itemprop="name" class="fa fa-home">
                        <span class="bcseo-text"> Skokka India </span>
                    </i>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem" class="list-bcseo">
                <a itemscope="itemscope" itemid="call-girls/" itemtype="http://schema.org/Service" itemprop="item" href="call-girls/" class="btn btn-outline-primary ">
                    <div itemprop="name" translate="no" class="notranslate">Call Girls</div>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem" class="list-bcseo">
                <a itemscope="itemscope" itemid="call-girls/telangana/" itemtype="http://schema.org/Place" itemprop="item" href="call-girls/telangana/" class="btn btn-outline-primary ">
                    <div itemprop="name" translate="no" class="notranslate">Telangana Call Girls</div>
                </a>
                <meta itemprop="position" content="3">
            </li>
            <li itemprop="itemListElement" itemscope="itemscope" itemtype="http://schema.org/ListItem" class="list-bcseo">
                <a itemscope="itemscope" itemid="call-girls/hyderabad/" itemtype="http://schema.org/Place" itemprop="item" href="call-girls/hyderabad/" class="btn btn-outline-primary ">
                    <div itemprop="name" translate="no" class="notranslate">Hyderabad Call Girls</div>
                </a>
                <meta itemprop="position" content="4">
            </li>
        </ol>
    </div>
</nav>
<main>
    <div class="container-fluid p-0">
        <div class="container pt-0">
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
                ?>  </b>
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
                    <button href="tel:06009553941" class="btn btn-primary btn-phone btn-block mt-1">
                        <i class="fa fa-lg fa fa-phone mr-2"></i>telephone </button>
                    <a target="_blank" rel="nofollow" href="https://wa.me/" class="btn btn-whatsapp btn-block mt-3">
                        <i class="fab fa-lg fa-whatsapp mr-2 align-middle"></i>Whatsapp </a>
                </div>
            </div>
        </div>
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
                                <span class="badge badge-pill"> {{  str_replace("_"," ",$service)  }} </span>

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
                <div class="col">
                    <h4 class="mt-5 mb-5 text-center">Contact me</h4>
                </div>
                <div class="row justify-content-center onlydk">
                    <div class="col-md-4">
                        <button href="tel:06009553941" class="btn btn-primary btn-phone btn-block">
                            <i class="fa fa-lg fa fa-phone mr-2"></i>telephone </button>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a target="_blank" rel="nofollow" href="https://wa.me/" class="btn btn-whatsapp btn-block">
                            <i class="fab fa-lg fa-whatsapp mr-2 align-middle"></i>Whatsapp </a>
                    </div>
                </div>
                <div class="row fixed-bottom mobilecontactbar stickymobile">
                    <div class="col px-2 m-auto">
                        <button href="tel:06009553941" class="btn btn-primary btn-phone btn-md btn-block phone-pin">
                            <i class="fa fa-lg fa fa-phone mr-2"></i>telephone </button>
                    </div>
                    <div class="col px-2 m-auto">
                        <a target="_blank" rel="nofollow" href="https://wa.me/" class="btn btn-whatsapp btn-md btn-block whatsapp-pin">
                            <i class="fab fa-lg fa-whatsapp mr-2 align-middle"></i>Whatsapp </a>
                    </div>
                </div>

            </div>
        </div>



    </div>
</main>
@endsection
