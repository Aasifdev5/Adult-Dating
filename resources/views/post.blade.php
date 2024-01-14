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
                                <div class="col-sm-6 col-12 form-group">
                                    <input type="text" name="keyword" autocomplete="off" id="search-input" placeholder="Search here..." class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div id="regions-filter" class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                    <div class="region-select">
                                        <select name="state" class="browser-default custom-select" autocomplete="off">
                                            <option value="">All the regions</option>

                                            <option value="Andhra Pradesh"> Andhra Pradesh </option>
                                            <option value="Assam"> Assam </option>
                                            <option value="Bihar"> Bihar </option>
                                            <option value="Chandigarh"> Chandigarh </option>
                                            <option value="Chhattisgarh"> Chhattisgarh </option>
                                            <option value="Dadra and Nagar Haveli"> Dadra and Nagar Haveli </option>
                                            <option value="Delhi"> Delhi </option>
                                            <option value="Goa"> Goa </option>
                                            <option value="Gujarat"> Gujarat </option>
                                            <option value="Haryana"> Haryana </option>
                                            <option value="Jharkhand"> Jharkhand </option>
                                            <option value="Karnataka"> Karnataka </option>
                                            <option value="Kerala"> Kerala </option>
                                            <option value="Madhya Pradesh"> Madhya Pradesh </option>
                                            <option value="Maharashtra"> Maharashtra </option>
                                            <option value="Nagaland"> Nagaland </option>
                                            <option value="Odisha"> Odisha </option>
                                            <option value="Punjab"> Punjab </option>
                                            <option value="Rajasthan"> Rajasthan </option>
                                            <option value="Tamil Nadu"> Tamil Nadu </option>
                                            <option value="Telangana"> Telangana </option>
                                            <option value="Uttar Pradesh"> Uttar Pradesh </option>
                                            <option value="Uttarakhand"> Uttarakhand </option>
                                            <option value="West Bengal"> West Bengal </option>
                                        </select>
                                    </div>
                                </div>
                                <div id="cities-filter" class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
                                    <div class="city-select">
                                        <select name="city" class="browser-default custom-select" autocomplete="off">
                                            <option disabled selected>Select City</option>

                                            <optgroup label="Cities in India">
                                                <option value="Hyderabad">Hyderabad</option>
                                                <option value="Agra">Agra</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                                <option value="Ajmer">Ajmer</option>
                                                <option value="Alappuzha">Alappuzha</option>
                                                <!-- Add more cities here -->
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Vapi">Vapi</option>
                                                <option value="Varanasi">Varanasi</option>
                                                <option value="Vijayawada">Vijayawada</option>
                                                <option value="Visakhapatnam">Visakhapatnam</option>
                                            </optgroup>

                                        </select>
                                    </div>
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
                <a itemscope="itemscope" itemid="massages/" itemtype="http://schema.org/Service" itemprop="item" href="massages/" class="btn btn-outline-primary ">
                    <div itemprop="name">Massages</div>
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
