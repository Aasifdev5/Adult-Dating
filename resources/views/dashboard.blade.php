@extends('master')
@section('title')
Dashboard
@endsection
@section('content')
<main>
    <div class="container">
        <hr class="my-3">
        <div class="my-4 personal">
            <h6 class="text-uppercase">
                <strong>bienvenido
                    @if (!empty($user_session->name))
                        {{ $user_session->name }}
                    @endif

                </strong>
            </h6>
            <p>
                <i> {{$user_session->email}}</i>
            </p>
        </div>
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
            <div class="col-md-5 order-md-2">

                <div class="card dashboard id-verification mb-4">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body">
                                    <h5 class="card-title pb-0 mb-1">
                                        <i aria-hidden="true" class="fa fa-id-card-o mr-2"></i> Verify your age!
                                    </h5>
                                    <div class="row small no-gutters mt-3">
                                        <div class="col">
                                            <a href="#" target="_blank">
                                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                                <b>¿Como funciona?</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="#" target="_blank">
                                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                                <b>¿Alguna pregunta?</b>
                                            </a>
                                        </div>
                                    </div>
                                    @if(empty($isverified))
                                    <div class="card-body p-4" style="overflow-y: auto;">
                                        <h4 class="card-title">
                                            <b>Verifique su edad!</b>
                                        </h4>
                                        <p>Como Social Citas debemos asegurarnos de que todas las personas que publican sean mayores de edad.. <br>
                                            <strong>Verifica tu edad ahora!</strong>
                                        </p>

                                        <br>
                                        <span>Nos comunicaremos contigo pronto!</span>
                                        <h5 class="mt-3">
                                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i aria-hidden="true" class="fa fa-info-circle pr-1"></i>Información </a>
                                        </h5>
                                        <div id="collapseExample" class="collapse">
                                            <div>
                                                <strong>Tu privacidad es importante.</strong>
                                                <br> Los documentos cargados para verificar tu edad se guardarán en los sistemas Yoti, una plataforma segura especializada en verificación de identidad.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <a href="{{url('verification_form')}}" class="btn btn-primary btn-block ">Empezar ahora</a>
                                    </div>
                                    @endif
                                    @if(!empty($isverified))
                                    <div class="col px-0">
                                        <div class="badger-right">
                                            <span class="badge badge-new">nuevo</span>
                                        </div>
                                        <div class="promo-id-verification mb-4 mt-4">
                                            <h5>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16" class="text-success bi bi-check-circle">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                                </svg>
                                                <strong class="align-middle ml-1">Edad verificada</strong>
                                            </h5>
                                            <!---->
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-7 order-md-0">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card dashboard mb-4">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <h5 class="card-title skokka-text">
                                                <a href="{{url('ads')}}" class="">
                                                    <i class="fa fa-pencil-square-o float-left mr-2"></i> Tus anuncios <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Activo <span class="badge badge-light badge-pill">{{count($ads)}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> No publicado <span class="badge badge-light badge-pill">0</span>
                                                </li>
                                            </ul>
                                            <!---->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card dashboard mb-4">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <h5 class="card-title skokka-text">
                                                <a href="{{url('credits')}}" class="">
                                                    <i class="fa fa-database float-left mr-2"></i> Créditos <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Corrientes <span class="badge badge-light badge-pill">{{$user_session->balance}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Usado <span class="badge badge-light badge-pill">0</span>
                                                </li>
                                            </ul>
                                            <a data-href="{{url('credits')}}">
                                                <button type="button" class="btn btn-primary">Compra creditos </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card dashboard mb-4">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <h5 class="card-title skokka-text">
                                                <a href="{{url('calendars')}}" class="">
                                                    <i class="fa fa-line-chart float-left mr-2"></i> Productos <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <p>¡Compra nuestros productos para estar siempre en la cima!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="card dashboard mb-4">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <h5 class="card-title skokka-text">
                                                <a href="{{url('edit_profile')}}" class="">
                                                    <i class="fa fa-user-circle-o float-left mr-2"></i> Editar perfil <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <p>Gestiona tu información personal.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($user_session->account_type=="advertiser" || $user_session->account_type=="manager")
                    <div class="col-md-6 col-sm-12">
                        <div class="card dashboard mb-4">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <h5 class="card-title skokka-text">
                                                <a href="{{url('service-schedule')}}" class="">


                                                Agregar horas de servicio<i aria-hidden="true" class="fa fa-angle-right float-right"></i>

                                                </a>
                                            </h5>
                                            <p>Administre sus horas de servicio.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6 col-sm-12">
                        <div class="card dashboard mb-4">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body">
                                            <h5 class="card-title skokka-text">
                                                <a href="{{url('appointment')}}" class="">
                                                    @if($user_session->account_type=="advertiser")
                                                    Cita<i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                    @else
                                                    Mis solicitudes de cita<i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                    @endif
                                                </a>
                                            </h5>
                                            <p>Gestiona tu cita.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container mt-5">

        </div>
    </div>
</main>
@endsection
