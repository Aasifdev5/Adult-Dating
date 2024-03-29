@extends('master')
@section('title')
Home
@endsection
@section('content')
<main>

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="main-title home">Reuniones calientes en tu ciudad</h1>
            <h2 class="h2 home">Encuentra tu Escort favorita en Social Citas</h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($category as $row)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow border-0 mb-4">
                    <div data-href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>" class="cursor-pointer rounded-top position-relative" style="
                background: url(product_photo/<?php echo $row->course_photo ?>) no-repeat 50%;
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
                                    <span class="homecategory notranslate">{{$row->category_id}}</span> La Paz
                                </a>
                            </li>
                            <li class="list-unstyled">
                                <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>">
                                    <span class="homecategory notranslate">{{$row->category_id}}</span> Santa Cruz
                                </a>
                            </li>
                            <li class="list-unstyled">
                                <a href="{{url('ads_list/')}}/<?php echo $row->category_id; ?>">
                                    <span class="homecategory notranslate">{{$row->category_id}}</span> Cochabamba
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
    <p class="col-lg txt_seo mt-5">Bienvenido a Social Citas, Clasificados Adultos #1 en Bolivia. ¿Estás buscando servicio de acompañante? En Social Citas encontrarás masajes, encuentros sexuales, servicio de escorts, escorts independientes... Navega entre todas las categorías. Chicas Independientes, Call Boys, Transexuales, Escorts Gay, Encuentros Swinger y el nuevo Encuentros de Adultos. ¿Buscas sexo pago? Encuéntrelo en Social Citas. ¿No encuentras lo que estás buscando? ¡PUBLICA TU ANUNCIO absolutamente GRATIS!</p>
    <hr class="mt-5">
    <p class="h4 mt-5 text-center"> Find ads in <span class="notranslate">Bolivia</span>
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
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/La Paz'; ?>" title="Call Girls Bangalore">
                            <button class="button-pill">
                                <span class="notranslate">La Paz</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Santa Cruz'; ?>" title="Call Girls Hyderabad">
                            <button class="button-pill">
                                <span class="notranslate">Santa Cruz</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Cochabamba'; ?>" title="Call Girls Delhi">
                            <button class="button-pill">
                                <span class="notranslate">Cochabamba</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Pando'; ?>" title="Call Girls Pune">
                            <button class="button-pill">
                                <span class="notranslate">Pando</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/El Alto'; ?>" title="Call Girls Mumbai">
                            <button class="button-pill">
                                <span class="notranslate">El Alto</span>
                            </button>
                        </a>
                         <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Tarija'; ?>" title="Call Girls Hyderabad">
                            <button class="button-pill">
                                <span class="notranslate">Tarija</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Beni'; ?>" title="Call Girls Delhi">
                            <button class="button-pill">
                                <span class="notranslate">Beni</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Oruro'; ?>" title="Call Girls Pune">
                            <button class="button-pill">
                                <span class="notranslate">Oruro</span>
                            </button>
                        </a>
                        <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Potosi'; ?>" title="Call Girls Mumbai">
                            <button class="button-pill">
                                <span class="notranslate">Potosi</span>
                            </button>
                        </a>
                         <a href="{{url('list/')}}<?php echo '/' . $row->category_id.'/Chuquisaca'; ?>" title="Call Girls Mumbai">
                            <button class="button-pill">
                                <span class="notranslate">Chuquisaca</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @php
            $ads = DB::table('posting_ads')->where(['category' => $row->category_id])->limit(4)->get();
            @endphp

            @if(!empty($ads))
            <div class="container mt-5">
                <div class="row">
                    @foreach($ads as $ad)
                    @php
                                                                    $adsPhoto = App\Models\Image::where('ad_id', $ad->id)->first();
                                                                    $user = App\Models\User::where('id', $ad->user_id)->first();
                                                                @endphp
                    <div class="col-sm-3 text-center">
                        <img src="{{ asset($adsPhoto->path) }}" style="height: 180px; width: 220px;border-radius: 50%!important;" alt="Profile Image" class="profile-image rounded-circle">
                        <p class="mb-1 text-center">{{ $ad->title }}</p>
                        <a href="{{url('ad_details/')}}<?php echo '/' . $ad->id; ?>" target="_self" data-pck="272144">   <h3 class="mb-3 text-center">{{$user->name}}</h3></a>
                        <p class="mb-3 text-center">{{$ad->age}} Years</p>
                        <p class="text-muted text-center"><i class="icon icon-map-pin mr-1"></i>{{ $ad->city }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif


        </div>
        @endforeach

    </div>
</div>
@endsection
