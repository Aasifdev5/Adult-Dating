<!DOCTYPE html>
<html lang="en-in">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>


    <link rel="preload" as="font" type="font/woff2" href="https://fonts.gstatic.com/s/inter/v13/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7W0Q5nw.woff2" crossorigin="">

    <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <link rel="preload" as="script" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js">
    <link rel="preload" href="{{asset('css/app.css')}}" as="style">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('icon-removebg-preview.png')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/chunck-private-area.be138ac0ae29dcf8a826.css')}}" rel="stylesheet">
    <link href="{{asset('css/vendors~chunk-vue-tel-input.63e59fe1c7d5cab535b3.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" defer=""></script>




    <style type="text/css">
        button.btn[data-v-f3fb3dc8] {
            display: inline-block;
            font-weight: 300;
            line-height: 1.25;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            cursor: pointer;
            letter-spacing: 1px;
            transition: all 0.15s ease
        }

        button.btn.btn-sm[data-v-f3fb3dc8] {
            padding: 0.4rem 0.8rem;
            font-size: 0.8rem;
            border-radius: 0.2rem
        }

        button.btn.btn-primary[data-v-f3fb3dc8] {
            color: #fff;
            background-color: #45c8f1;
            border-color: #45c8f1
        }

        button.btn.btn-outline-primary[data-v-f3fb3dc8] {
            color: #45c8f1;
            background-color: transparent;
            border-color: #45c8f1
        }

        button.btn.btn-danger[data-v-f3fb3dc8] {
            color: #fff;
            background-color: #ff4949;
            border-color: #ff4949
        }

        .text-muted[data-v-f3fb3dc8] {
            color: #8492a6
        }

        .text-center[data-v-f3fb3dc8] {
            text-align: center
        }

        .drop-down-enter[data-v-f3fb3dc8],
        .drop-down-leave-to[data-v-f3fb3dc8] {
            transform: translateX(0) translateY(-20px);
            transition-timing-function: cubic-bezier(0.74, 0.04, 0.26, 1.05);
            opacity: 0
        }

        .drop-down-enter-active[data-v-f3fb3dc8],
        .drop-down-leave-active[data-v-f3fb3dc8] {
            transition: all 0.15s
        }

        .move-left-enter[data-v-f3fb3dc8],
        .move-left-leave-to[data-v-f3fb3dc8] {
            transform: translateY(0) translateX(-80px);
            transition-timing-function: cubic-bezier(0.74, 0.04, 0.26, 1.05);
            opacity: 0
        }

        .move-left-enter-active[data-v-f3fb3dc8],
        .move-left-leave-active[data-v-f3fb3dc8] {
            transition: all 0.15s
        }

        .no-tr[data-v-f3fb3dc8] {
            transition: none !important
        }

        .no-tr *[data-v-f3fb3dc8] {
            transition: none !important
        }

        .overlay[data-v-f3fb3dc8] {
            position: fixed;
            background: rgba(220, 220, 220, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            transition: all 0.2s ease;
            opacity: 0;
            visibility: hidden
        }

        .overlay .modal[data-v-f3fb3dc8] {
            transition: all 0.2s ease;
            opacity: 0;
            transform: scale(0.6);
            overflow: hidden
        }

        .overlay.show[data-v-f3fb3dc8] {
            opacity: 1;
            visibility: visible
        }

        .overlay.show .modal[data-v-f3fb3dc8] {
            opacity: 1;
            transform: scale(1)
        }

        .panel[data-v-f3fb3dc8] {
            padding: 6px 10px;
            display: flex;
            width: 100%;
            box-sizing: border-box;
            align-items: center;
            border-radius: 6px;
            position: relative;
            border: 1px solid #eaf7ff;
            background: #f7fcff;
            outline: none;
            transition: all 0.07s ease-in-out
        }

        .btn[data-v-f3fb3dc8] {
            cursor: pointer;
            box-sizing: border-box
        }

        .light-btn[data-v-f3fb3dc8] {
            padding: 10px 12px;
            display: flex;
            width: 100%;
            box-sizing: border-box;
            align-items: center;
            border-radius: 6px;
            position: relative;
            border: 1px solid #eaf7ff;
            background: #f7fcff;
            outline: none;
            cursor: pointer;
            transition: all 0.07s ease-in-out
        }

        .light-btn[data-v-f3fb3dc8]:hover {
            background: #e0f4ff;
            border-color: #8acfff
        }

        .primary-btn[data-v-f3fb3dc8] {
            background: #239bf5;
            color: white;
            border-radius: 6px;
            height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s ease;
            font-size: 14px;
            font-family: "Didact Gothic Regular", sans-serif
        }

        .primary-btn[data-v-f3fb3dc8]:hover {
            background: #40a8f6;
            color: white;
            text-decoration: none
        }

        .shake[data-v-f3fb3dc8] {
            animation: shake-f3fb3dc8 0.82s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
            transform: translate3d(0, 0, 0)
        }

        @keyframes shake-f3fb3dc8 {

            10%,
            90% {
                transform: translate3d(-1px, 0, 0)
            }

            20%,
            80% {
                transform: translate3d(2px, 0, 0)
            }

            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0)
            }

            40%,
            60% {
                transform: translate3d(4px, 0, 0)
            }
        }

        .pulse[data-v-f3fb3dc8] {
            animation: pulse-f3fb3dc8 2s ease infinite
        }

        @keyframes pulse-f3fb3dc8 {
            0% {
                opacity: 0.7
            }

            50% {
                opacity: 0.4
            }

            100% {
                opacity: 0.7
            }
        }

        .flash-once[data-v-f3fb3dc8] {
            animation: flash-once 3.5s ease 1
        }

        @keyframes fade-up-f3fb3dc8 {
            0% {
                transform: translate3d(0, 10px, 0);
                opacity: 0
            }

            100% {
                transform: translate3d(0, 0, 0);
                opacity: 1
            }
        }

        .fade-in[data-v-f3fb3dc8] {
            animation: fade-in-f3fb3dc8 0.3s ease-in-out
        }

        @keyframes fade-in-f3fb3dc8 {
            0% {
                opacity: 0
            }

            100% {
                opacity: 1
            }
        }

        .spin[data-v-f3fb3dc8] {
            animation-name: spin-f3fb3dc8;
            animation-duration: 2000ms;
            animation-iteration-count: infinite;
            animation-timing-function: linear
        }

        @keyframes spin-f3fb3dc8 {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }

        .bounceIn[data-v-f3fb3dc8] {
            animation-name: bounceIn-f3fb3dc8;
            transform-origin: center bottom;
            animation-duration: 1s;
            animation-fill-mode: both;
            animation-iteration-count: 1
        }

        @keyframes bounceIn-f3fb3dc8 {

            0%,
            20%,
            40%,
            60%,
            80%,
            100% {
                -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1)
            }

            0% {
                opacity: 1;
                -webkit-transform: scale3d(0.8, 0.8, 0.8);
                transform: scale3d(0.8, 0.8, 0.8)
            }

            20% {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1)
            }

            40% {
                -webkit-transform: scale3d(0.9, 0.9, 0.9);
                transform: scale3d(0.9, 0.9, 0.9)
            }

            60% {
                opacity: 1;
                -webkit-transform: scale3d(1.03, 1.03, 1.03);
                transform: scale3d(1.03, 1.03, 1.03)
            }

            80% {
                -webkit-transform: scale3d(0.97, 0.97, 0.97);
                transform: scale3d(0.97, 0.97, 0.97)
            }

            100% {
                opacity: 1;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1)
            }
        }

        @keyframes dots-f3fb3dc8 {

            0%,
            20% {
                color: rgba(0, 0, 0, 0);
                text-shadow: 0.25em 0 0 rgba(0, 0, 0, 0), 0.5em 0 0 rgba(0, 0, 0, 0)
            }

            40% {
                color: #8492a6;
                text-shadow: 0.25em 0 0 rgba(0, 0, 0, 0), 0.5em 0 0 rgba(0, 0, 0, 0)
            }

            60% {
                text-shadow: 0.25em 0 0 #8492a6, 0.5em 0 0 rgba(0, 0, 0, 0)
            }

            80%,
            100% {
                text-shadow: 0.25em 0 0 #8492a6, 0.5em 0 0 #8492a6
            }
        }

        @keyframes recording-f3fb3dc8 {
            0% {
                box-shadow: 0px 0px 5px 0px rgba(173, 0, 0, 0.3)
            }

            65% {
                box-shadow: 0px 0px 5px 5px rgba(173, 0, 0, 0.3)
            }

            90% {
                box-shadow: 0px 0px 5px 5px rgba(173, 0, 0, 0)
            }
        }



        body[data-v-f3fb3dc8] {
            margin: 0;
            font-size: 100%;
            color: #3c4858
        }

        a[data-v-f3fb3dc8] {
            text-decoration: none;
            color: #45c8f1
        }

        h1[data-v-f3fb3dc8],
        h2[data-v-f3fb3dc8],
        h3[data-v-f3fb3dc8],
        h4[data-v-f3fb3dc8] {
            margin-top: 0
        }

        svg[data-v-f3fb3dc8] {
            outline: none
        }

        .container_selected_area[data-v-f3fb3dc8] {
            display: none;
            visibility: hidden;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2147483647
        }

        .container_selected_area.active[data-v-f3fb3dc8] {
            visibility: visible;
            display: block
        }

        .container_selected_area .label[data-v-f3fb3dc8] {
            font-family: "Didact Gothic Regular", sans-serif;
            font-size: 22px;
            text-align: center;
            padding-top: 15px
        }

        .area[data-v-f3fb3dc8] {
            display: none;
            position: absolute;
            z-index: 2147483647;
            pointer-events: none;
            border: 1px solid #1e83ff;
            background: rgba(30, 131, 255, 0.1);
            box-sizing: border-box
        }

        .area.active[data-v-f3fb3dc8] {
            display: block;
            top: 0;
            left: 0
        }

        .hide[data-v-f3fb3dc8] {
            display: none
        }
    </style>
</head>

<body class="Social Citas" data-new-gr-c-s-check-loaded="14.1148.0" data-gr-ext-installed="" cz-shortcut-listen="true">

    <div id="app">
        <header>
            <header class="container">
                <div class="cusotm-nav-container d-flex justify-content-between align-items-center noscrolling-navbar-navheight ">
                    <a href="/" class="navbar-brand logo-header logo">
                        <img src="{{asset('logo.jpg')}}" alt="Social Citas" height="90">

                    </a>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="nav-icons-container d-flex">

                            <div id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" class="modal fade menu">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!---->
                                    </div>
                                </div>
                            </div>
                            <?php
                            // dd($_SERVER['REQUEST_URI']);

                            ?>
                            @if(!empty($user_session))
                            <div class="nav-icons">
                                <div class="dropdown sign">
                                    <a href="#" data-toggle="modal" data-target="#loggedin" class="signup">
                                        <i class="fas fa-user-tag skokka-text"></i>
                                        <div class="name-login">

                                            {{$user_session->email}}

                                        </div>
                                    </a>
                                </div>
                            </div>
                            @if($_SERVER['REQUEST_URI']!="/post_ad")
                            <a href="{{ url('post_ad') }}" class="d-none d-lg-block btn btn-secondary new-ad btn-block">
                                <i class="fas fa-plus-circle mr-2"></i> Post your ad
                            </a>


                            @endif

                            <div class="modal fade" id="loggedin" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"><img  src="{{asset('icon-removebg-preview.png')}}">Your Private Area</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body menuadmin">
                                            <hr class="my-1">
                                            <h5 class="text-center"><strong>Hi!</strong>

                                                {{$user_session->email}}

                                            </h5>
                                            <div class="row text-center">
                                                <div class="col"><a role="button" data-href="{{url('dashboard')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-home fa-2x"></span> <br>
                                                            DASHBOARD
                                                        </button></a></div>
                                                <div class="col"><a role="button" data-href="{{url('ads')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-pencil-square-o fa-2x"></span> <br>
                                                            YOUR ADS
                                                        </button></a></div>
                                                <div class="col"><a role="button" data-href="{{url('credits')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-database fa-2x"></span> <br>
                                                            CREDITS
                                                        </button></a></div>
                                                <div class="col"><a role="button" data-href="{{url('products')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-line-chart fa-2x"></span> <br>
                                                            PRODUCTS
                                                        </button></a></div>
                                                <div class="col"><a role="button" data-href="{{url('edit_profile')}}"><button type="button" class="btn btn-outline-primary actionar btn-block"><span class="fa fa-user-circle-o fa-2x"></span> <br>
                                                            EDIT PROFILE
                                                        </button></a></div>
                                                <div class="col"><a role="button" data-href="{{url('logout')}}"><button type="button" class="btn btn-primary actionar btn-block"><span class="fa fa-sign-out fa-2x"></span> <br>
                                                            Logout
                                                        </button></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else

                            <nav class="navbar navbar-expand-lg navbar-light">

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('ads_list/Call Girls')}}">Female Escort</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('ads_list/Male Escorts')}}">Male Escort</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('ads_list/Transsexual')}}">Casual encounter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('ads_list/Live sex cam')}}">Live Camera</a>
                                        </li>
                                        <li class="nav-item d-none d-lg-block">
                                            <a href="#" class="btn btn-secondary new-ad btn-block" data-toggle="modal" data-target="#signup">
                                                <i class="fas fa-plus-circle mr-2"></i> Post your ad
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>

                            @endif

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


                            <div id="sideModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" class="modal right fade">
                                <div role="document" class="modal-dialog modal-dialog-slideout">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                                                <i class="fas fa-times text-clipped menu-close-icon close-menu-icon"></i>
                                            </button>
                                            <nav class="main-nav menu navbar navbar-light navbar-expand-lg text-center">
                                                <h4 class="px-0 item-mobile">Publish ad</h4>
                                                <a data-href="/u/post-insert/" class="btn btn-secondary new-ad btn-block">
                                                    <i class="fas fa-plus-circle mr-2"></i> Post your ad </a>
                                                <hr class="my-2">
                                                <h4 class="px-0 item-mobile">Services for you!</h4>
                                                <ul class="list-group list-group-flush item-mobile">
                                                    <li class="list-group-item">
                                                        <a data-href="/promote-your-ads/">
                                                            <i class="far fa-kiss-wink-heart"></i> Promote your ads </a>
                                                    </li>

                                                </ul>
                                                <h4 class="px-0 item-mobile">Follow us</h4>
                                                <ul class="list-group list-group-flush item-mobile">
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.youtube.com/">
                                                            <i class="fa fa-youtube-play"></i> Youtube </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.instagram.com/">
                                                            <i class="fa fa-instagram"></i> Instagram </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="">
                                                            <i class="icon-twitter-x-empty"></i> Twitter </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.tiktok.com/">
                                                            <i class="fab fa-tiktok"></i> Tiktok </a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <a target="_blank" data-href="https://www.facebook.com/">
                                                            <i class="fab fa-facebook-f"></i> Facebook </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
        </header>


        @yield('content')
        <div class="container">
            <footer class="page-footer font-small grey pt-4">
                <div class="container-fluid text-center text-md-left">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="{{asset('footerlogo-removebg-preview.png')}}" alt="Social Citas">
                        </div>
                        <div class="col-sm-3">


                            <ul style="list-style-type: none;">
                                <li>
                                    <h5>Main</h5>
                                </li>
                                <li> <a data-href="/contact-us/">
                                        <span>Contact us</span>
                                    </a></li>
                                <li> <a data-href="/promote-your-ads/">
                                        <span>Promote your ads</span>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">

                            <ul style="list-style-type: none;">
                                <li>
                                    <h5>Information</h5>
                                </li>
                                <li><a data-href="/terms-and-conditions/">
                                        <span>Terms and conditions</span>
                                    </a>
                                </li>
                                <li> <a data-href="/privacy-policy/">
                                        <span>Privacy policy</span>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">

                            <ul style="list-style-type: none;">
                                <li>
                                    <h5>Contact</h5>
                                </li>
                                <li>Email : hola@socialcitas.com</li>
                                <li>Phone : (+591) 947 002 963</li>
                            </ul>
                        </div>
                    </div>


                </div>
            </footer>
        </div>
        <div id="lightbox-block" tabindex="-1" data-backdrop="static" class="modal" style="display: none;">
            <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">WARNING</h5>
                    </div>
                    <div>
                        <div class="modal-body">
                            <div class="d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">This ad was prevented from insertion due to violations of <a data-href="/terms-and-conditions/">Terms and conditions</a>. <br>For more information send an email to: <a href="mailto:support@Social Citas.in">support@Social Citas.in</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        window.addEventListener("DOMContentLoaded", () => {
            $(".open-menu-icon").on("click", function() {
                $(".main-nav-outer").addClass("open-menu");
                $(".main-nav-aside").addClass("open");
            });
            $(".main-nav-aside").on("click", function() {
                $(".main-nav-outer").removeClass("open-menu");
                $(".main-nav-aside").removeClass("open");
            });
            $(".close-menu-icon").on("click", function() {
                $(".main-nav-outer").removeClass("open-menu");
            });
        })
    </script>
    <script src="{{asset('js/bundle.js')}}" defer=""></script>
    <script src="{{asset('js/vendors~chunk-pica.48c160a010746ad5f05b.js')}}" defer=""></script>
    <script src="{{asset('js/chunck-signup-form.96dda844e6d6b7cae628.js')}}" defer=""></script>
</body>

</html>
