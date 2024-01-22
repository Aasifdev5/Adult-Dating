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
                <strong>welcome</strong>
            </h6>
            <p>
                <i> {{$user_session->email}}</i>
            </p>
        </div>


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
                                                <b>How does it work?</b>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="#" target="_blank">
                                                <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                                                <b>Any questions?</b>
                                            </a>
                                        </div>
                                    </div>
                                    @if(empty($isverified))
                                    <div class="card-body p-4" style="overflow-y: auto;">
                                        <h4 class="card-title">
                                            <b>Verify your age!</b>
                                        </h4>
                                        <p>As Social Citas we need to be sure that everyone who publish is of age. <br>
                                            <strong>Verify your age now!</strong>
                                        </p>

                                        <br>
                                        <span>We’ll get back to you soon!</span>
                                        <h5 class="mt-3">
                                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i aria-hidden="true" class="fa fa-info-circle pr-1"></i>Info </a>
                                        </h5>
                                        <div id="collapseExample" class="collapse">
                                            <div>
                                                <strong>Your privacy is important.</strong>
                                                <br> Documents uploaded to verify your age will be saved on Yoti systems, a secure platform specialized in identity verification.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="background: inherit; border-color: inherit;">
                                        <a href="{{url('verification_form')}}" class="btn btn-primary btn-block ">Start now</a>
                                    </div>
                                    @endif
                                    @if(!empty($isverified))
                                    <div class="col px-0">
                                        <div class="badger-right">
                                            <span class="badge badge-new">new</span>
                                        </div>
                                        <div class="promo-id-verification mb-4 mt-4">
                                            <h5>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16" class="text-success bi bi-check-circle">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                                                </svg>
                                                <strong class="align-middle ml-1">Age verified</strong>
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
                                                    <i class="fa fa-pencil-square-o float-left mr-2"></i> Your Ads <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Active <span class="badge badge-light badge-pill">{{count($ads)}}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Not published <span class="badge badge-light badge-pill">0</span>
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
                                                    <i class="fa fa-database float-left mr-2"></i> Credits <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Currents <span class="badge badge-light badge-pill">0</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center"> Used <span class="badge badge-light badge-pill">0</span>
                                                </li>
                                            </ul>
                                            <a data-href="{{url('credits')}}">
                                                <button type="button" class="btn btn-primary"> Buy Credits </button>
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
                                                    <i class="fa fa-line-chart float-left mr-2"></i> Products <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <p>Purchase our products to be always on TOP!</p>
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
                                                    <i class="fa fa-user-circle-o float-left mr-2"></i> Edit Profile <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                </a>
                                            </h5>
                                            <p>Manage your personal info.</p>
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


                                                      Add Service Hours<i aria-hidden="true" class="fa fa-angle-right float-right"></i>

                                                </a>
                                            </h5>
                                            <p>Manage your service hours.</p>
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
                                                    Appointment<i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                    @else
                                                    My Appointment Requests<i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                                                    @endif
                                                </a>
                                            </h5>
                                            <p>Manage your Appointment.</p>
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
