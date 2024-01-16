@extends('master')
@section('title')
Home
@endsection
@section('content')
<main>

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="main-title home">Hot meetings in your city</h1>
            <h2 class="h2 home">Find your favourite Escort in Social Citas</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
        @foreach($category as $row)
    <div class="col-md-6 col-lg-4">
        <div class="card shadow border-0 mb-4">
            <div data-href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>" class="cursor-pointer rounded-top position-relative" style="
                background: url(product_photo/<?php echo $row->course_photo?>) no-repeat 50%;
                background-size: cover;
                min-height: 201px;
                border-radius: 0.25rem 0.25rem 0 0;
            ">
                <div class="profile-name position-absolute bottom-0 left-0 p-3">
                    <h2 style="color: #fff;"><span class="{{$row->category_icon}}"></span> {{$row->category_id}}</h2>
                </div>
            </div>
            <div class="card-body home">
                <p class="card-text">{!!stripslashes($row->description)!!}</p>
                <ul class="list-unstyled">
                    <li class="list-unstyled">
                        <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>">
                            <span class="homecategory notranslate">{{$row->category_id}}</span> Bangalore
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>">
                            <span class="homecategory notranslate">{{$row->category_id}}</span> Hyderabad
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>">
                            <span class="homecategory notranslate">{{$row->category_id}}</span> Delhi
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>">
                            <i class="fa fa-video-camera mr-1"></i> Videochat
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
@foreach($category as $row)
    <div class="col-md-6 col-lg-4">
        <div class="card shadow border-0 mb-4">
            <div class="position-relative">
                <img src="{{asset('product_photo/')}}<?php echo '/'.$row->course_photo?>" class="rounded-circle" alt="{{$row->category_id}}">
                <div class="profile-name position-absolute bottom-0 left-0 p-3">
                    <h2 class="text-light"><span class="{{$row->category_icon}}"></span> {{$row->category_id}}</h2>
                </div>
            </div>
            <div class="card-body home">
                <p class="card-text">{!!stripslashes($row->description)!!}</p>
                <ul class="list-unstyled">
                    <li class="list-unstyled">
                        <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>" class="text-decoration-none">
                            <span class="homecategory notranslate">{{$row->category_id}}</span> Bangalore
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endforeach

        </div>
    </div>
</main>
<div class="container mt-5">
    <p class="col-lg txt_seo mt-5">Welcome to Social Citas, #1 Adult Classifieds in India. Are you looking for escort service? In Social Citas you will find massages, sexual meetings, escorts service, independent escorts... Browse among all categories. Independent Girls, Call boys, Transsexual, Gay escorts, swinger meetings and the new one Adult Meetings. Looking for paid sex? Find it on Social Citas. Can not find what you're looking for? POST YOUR AD absolutely FREE!</p>
    <hr class="mt-5">
    <p class="h4 mt-5 text-center"> Find ads in <span class="notranslate">India</span>
    </p>
    <div class="footer-city">
        @foreach($category as $row)
        <div class="card shadow text-center">
            <div class=" card-header ">
                <a href="{{url('ads_list/')}}<?php echo '/' . $row->category_id; ?>" class="h4">
                    <span class="{{$row->category_icon}}"></span> {{$row->category_id}} </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <a href="call-girls/bangalore/" title="Call Girls Bangalore">
                            <button class="button-pill">
                                <span class="notranslate">Bangalore</span>
                            </button>
                        </a>
                        <a href="call-girls/hyderabad/" title="Call Girls Hyderabad">
                            <button class="button-pill">
                                <span class="notranslate">Hyderabad</span>
                            </button>
                        </a>
                        <a href="call-girls/delhi/" title="Call Girls Delhi">
                            <button class="button-pill">
                                <span class="notranslate">Delhi</span>
                            </button>
                        </a>
                        <a href="call-girls/pune/" title="Call Girls Pune">
                            <button class="button-pill">
                                <span class="notranslate">Pune</span>
                            </button>
                        </a>
                        <a href="call-girls/mumbai/" title="Call Girls Mumbai">
                            <button class="button-pill">
                                <span class="notranslate">Mumbai</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="card shadow text-center">
            <div class="card-header" style="padding: 10px 0px;">
                <a href="/call-girls/tag/video-sex-service/" class="h4">
                    <span class="mr-2 fa fa-video-camera"></span> Videochat </a>
            </div>
        </div>
    </div>
</div>
@endsection
