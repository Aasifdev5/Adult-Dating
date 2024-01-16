@extends('master')
@section('title')
Ads List
@endsection
@section('content')
<div class="cont-search">
    <div class="container listing sticky-top bg-white p-2" style="">
        <section class="listing-tags">
            <div class="stikysearch">
                <!-- Corrected data-toggle and data-target attributes -->
                <a href="#" data-toggle="modal" data-target="#searchModal">
                    <div class="d-flex justify-content-between align-items-center py-2 px-3">
                        <span class="">
                            <span class="icon-map-pin mr-2"></span>

                            Search by city, Category...

                        </span>
                        <i class="fas fa-search text-clipped d-flex justify-content-end"></i>
                    </div>
                </a>
            </div>
            <div class="form-row inlinetag px-2 pt-2 pb-0 ">
                <div class="taglist filtersearch"></div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body filters">
                <div id="search-app">
                    <div class="search-form">
                        <form id="vue-search" action="{{ url('search') }}" method="get">
                            @csrf
                            <div class="form-row">
                                <div class="col-sm-12 col-12 form-group">
                                    <input type="text" name="keyword" autocomplete="off" id="search-input" placeholder="Search here..." class="form-control">
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="col-sm-6 col-12 form-group">
                                    <div class="category-select">
                                        <select name="category" class="browser-default custom-select" autocomplete="off">
                                            <option value="">Please Category</option>
                                            @foreach($category as $row)
                                            <option value="{{$row->category_id}}">{{$row->category_id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="regions-filter" class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                    <div class="region-select">
                                        @if ($countries->isNotEmpty())
                                        <select class="form-control select2" id="countrySelect" name="country">
                                            <option value="">Please Select Country</option>
                                            @foreach ($countries as $country)
                                            @php
                                            $countryData = json_decode($country['name'], true);
                                            $englishValue = isset($countryData['en']) ? $countryData['en'] : '';
                                            @endphp
                                            <option value="{{ $englishValue }}">{{ $englishValue }}</option>
                                            @endforeach
                                        </select>
                                        @else
                                        <strong>{{ __('countries_not_found') }}</strong>
                                        @endif
                                    </div>
                                </div>



                                <div id="cities-filter" class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                    <div class="city-select">

                                        <select class="browser-default custom-select select2" id="states" name="state">
                                            <option value="">Please Select State</option>
                                            @foreach ($states as $state)
                                            @php
                                            $stateData = json_decode($state['name'], true);
                                            $englishValue = isset($stateData['en']) ? $stateData['en'] : '';
                                            @endphp
                                            <option value="{{ $englishValue }}">{{ $englishValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 form-group">

                                    <select class="form-control select2" id="city" name="city">
                                        <option value="">Please Select City</option>
                                        @foreach ($cities as $city)
                                        @php
                                        $cityData = json_decode($city['name'], true);
                                        $englishValue = isset($cityData['en']) ? $cityData['en'] : '';
                                        @endphp
                                        <option value="{{ $englishValue }}">{{ $englishValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer filters position-sticky fixed-bottom bg-white" style="padding-right: 10px;">
                <button type="button" class="btn btn-link skokka-text col"> Delete all </button>
                <button form="vue-search" type="submit" class="btn btn-primary col">
                    <i class="fa fa-search mr-1"></i> Search
                </button>
            </div>
        </div>
    </div>
</div>



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
            <li itemprop="itemListElement" itemscope="itemscope" class="list-bcseo">
                <a itemscope="itemscope" itemid="massages/karnataka/" itemtype="http://schema.org/Place" itemprop="item" href="massages/karnataka/" class="btn btn-outline-primary ">
                    <div itemprop="name">Karnataka Massages</div>
                </a>
                <meta itemprop="position" content="3">
            </li>
            <li itemprop="itemListElement" itemscope="itemscope" class="list-bcseo">
                <a itemscope="itemscope" itemid="massages/bangalore/" itemtype="http://schema.org/Place" itemprop="item" href="massages/bangalore/" class="btn btn-outline-primary ">
                    <div itemprop="name">Bangalore Massages</div>
                </a>
                <meta itemprop="position" content="4">
            </li>
        </ol>
    </div>
</nav>
<main>
    <div class="container">
        <div class="mb-3">
            <div class="d-inline">
                <h1 class="item-title d-inline text-dark"></h1>
            </div>
        </div>
        <div class="title-story small font-weight-bold pb-2">SUPERTOP STORIES</div>
        <div class="supertop-stories-container">
            <div>
                <div class="skokka-stories-list">
                    <div id="stories-right-button" style="visibility: hidden; display: none;">
                        <a href="#"></a>
                    </div>
                    <div id="outer">
                        <div id="inner">
                            <div class="stories_thumb">
                                <a href="#">
                                    <picture class="stories_thumb-media">
                                        <img src="" draggable="false">
                                    </picture>
                                    <span class="badge badge-supertop mt-3">
                                        <i class="icon-supertop mr-1"></i>
                                    </span>
                                    <div class="user-username"> FULL NUDE BODY MASSAGEHAPPY ENDING/BLOWJOB/FINGRNG/NURU/SHOWER </div>
                                </a>
                            </div>



                        </div>
                    </div>
                    <div id="stories-left-button" style="visibility: hidden;">
                        <a href="#"></a>
                    </div>
                </div>
                <!---->
            </div>
        </div>

        @foreach($ads as $row)
        <div class="supertop show-in-related-free-list">
            <div class="badger-right">
                <span class="badge badge-supertop">
                    <i class="icon-supertop mr-1"></i>
                </span>
            </div>
            <div class="item-card bordersupertop">
                <div id="carousel-6560352dbe400c828c5ac2ae" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                        $adsPhotos = App\Models\Image::where('user_id', $row->user_id)->where('ad_id', $row->id)->get();
                        @endphp

                        @foreach ($adsPhotos as $index => $adsPhoto)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="item-image-supertop">
                                <img src="{{ asset('storage/' . $adsPhoto->path) }}" alt="Image {{ $index + 1 }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="#carousel-6560352dbe400c828c5ac2ae" role="button" data-slide="prev" title="Previous" class="carousel-control-prev slide-action">
                        <span aria-hidden="true" class="carousel-control-prev-icon slide-action"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#carousel-6560352dbe400c828c5ac2ae" role="button" data-slide="next" title="Next" class="carousel-control-next slide-action">
                        <span aria-hidden="true" class="carousel-control-next-icon slide-action"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <span class="badge badge-photocounter">
                        <i aria-hidden="true" class="fas fa-images"></i> <?php echo count($adsPhotos); ?> </span>
                </div>

                <div class="item-container ">
                    <div class="item-card-container">
                        <div class="item-content">
                            <div class="item-heading">
                                <p class="item-title">
                                    <a href="{{url('ad_details/')}}<?php echo '/' . $row->id; ?>" target="_self" data-pck="272144"> {{$row->title}} </a>
                                </p>
                            </div>
                            <span class="item-description onlydk"></span>
                            <div class="tagcard">
                                <span class="badge-pill">
                                    <strong> {{$row->age}} years </strong>
                                </span>
                                <span translate="no" class="badge-pill">
                                    <i class="icon icon-map-pin mr-1"></i>
                                    <strong> {{$row->city}} </strong>
                                </span>
                                <br>
                                @foreach(explode(',', $row->search_tag__services) as $service)
                                <span class="badge-pill special-tag">
                                    <i aria-hidden="true" class="fa fa-star-o mr-1"></i> {{ str_replace("_"," ",$service) }} </span>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="item-card-contact ga-list-premium-contact-buttons ">
                        <button href="tel:08050094011" class="btn btn-lg btn-outline btn-circle">
                            <i class="icon-phone"></i>
                        </button>
                        <a target="_blank" rel="nofollow" href="https://wa.me/" class="btn btn-lg btn-outline btn-circle">
                            <i class="icon-whatsapp align-middle"></i>
                            <!---->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
    <br>


</main>
<div class="col-sm-12" style="margin-left: 500px;">

    @include('admin.pagination', ['paginator' => $ads])

</div>
@endsection
