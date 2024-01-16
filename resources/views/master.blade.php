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

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('icon.jpg')}}">
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
                                            <h5 class="modal-title" id="staticBackdropLabel"><i class="icon icon-skokka signup pr-2"></i>Your Private Area</h5>
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

                            <div class="nav-icons">
                                <div class="dropdown sign">
                                    <a href="/">
                                        Home
                                    </a>
                                </div>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#signup" class="d-none d-lg-block btn btn-secondary new-ad btn-block">
                                <i class="fas fa-plus-circle mr-2"></i> Post your ad </a>
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

        <div id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static" class="modal modal-vm18 fade" style="display: none; padding-left: 0px;">
            <div role="document" class="modal-dialog modal-dialog-centered">
                <div class="modal-content py-md-5 px-md-4 p-sm-3 p-4 text-center">
                    <svg width="90px" height="82px" viewBox="0 0 90 82" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="m-auto">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Group-2" transform="translate(1.000000, 1.000000)">
                                <g id="Group-Copy">
                                    <path d="M40,80 C62.09139,80 80,62.09139 80,40 C80,29.442469 75.9098379,19.8402466 69.2276681,12.6914872 C61.9275517,4.8816324 51.533859,0 40,0 C17.90861,0 0,17.90861 0,40 C0,62.09139 17.90861,80 40,80 Z" id="Combined-Shape" stroke="#ECECEC" stroke-width="2" fill="#FFFFFF"></path>
                                    <g id="Group-9-Copy" transform="translate(16.000000, 25.000000)">
                                        <path d="M37.5396067,9.52112676 C33.4542563,9.52112676 28.2517062,14.0492182 24.5790503,19.6417324 C24.0851168,20.3931271 23.2577781,25.6338028 37.5396067,25.6338028 C48.1487794,25.6338028 51.9013746,22.6924839 49.1100001,18.742731 C46.2874298,14.7484415 42.7376074,9.52112676 37.5396067,9.52112676" id="Fill-1" fill="#448BC6"></path>
                                        <path d="M40.4788732,3.66197183 C40.4788732,1.63940992 38.8382778,3.10862447e-15 36.8172351,3.10862447e-15 C34.7935226,3.10862447e-15 33.1549296,1.63940992 33.1549296,3.66197183 C33.1549296,5.68453374 34.7935226,7.32394366 36.8172351,7.32394366 C38.8382778,7.32394366 40.4788732,5.68453374 40.4788732,3.66197183" id="Fill-3" fill="#448BC6"></path>
                                        <path d="M9.39438725,6.4875509 C10.0022322,7.00220279 10.7697652,7.32394366 11.6164984,7.32394366 C12.4078559,7.32394366 13.1309596,7.04425606 13.7201313,6.58834524 C15.3543585,6.8713704 17.2590252,6.51358387 16.7657951,6.38608905 C16.2468089,6.2519191 15.6795298,4.84613844 15.1251289,3.41298979 C15.0684654,2.56524932 14.7413624,1.79961284 14.2223761,1.20752954 C13.5758969,0.471263601 12.6525392,3.10862447e-15 11.6164984,3.10862447e-15 C10.7021554,3.10862447e-15 9.87602711,0.369801749 9.24950895,0.96055003 L9.24628944,0.958547493 C9.24435773,0.96055003 9.24242602,0.963887591 9.24242602,0.965890127 C8.62556641,1.54996329 8.21926327,2.35364795 8.12332164,3.26146452 C7.31007145,4.76002937 6.35645029,6.2519191 5.91859588,6.38608905 C5.46078045,6.5262666 7.74599416,6.94079167 9.39438725,6.4875509" id="Fill-5" fill="#BE206B"></path>
                                        <path d="M21.6259713,18.4436516 C18.8693535,14.4493353 16.248536,11.8522025 15.8500194,11.4526436 C15.5796881,11.1816053 13.6448521,9.43003584 11.3521127,9.52483564 C9.05937326,9.43003584 7.12453725,11.1816053 6.85357137,11.4526436 C6.45568939,11.8522025 3.83487184,14.4493353 1.07825406,18.4436516 C-1.64663469,22.3927949 0.503958689,25.6338028 10.8628511,25.6338028 C10.9415391,25.6338028 11.2746939,25.6338028 11.3521127,25.6338028 C11.4295315,25.6338028 11.7626863,25.6338028 11.8413743,25.6338028 C22.2002667,25.6338028 24.35086,22.3927949 21.6259713,18.4436516" id="Fill-7" fill="#BE206B"></path>
                                    </g>
                                    <circle id="Oval" fill="#BE206B" cx="74.5" cy="15.5" r="14.5"></circle>
                                    <text id="18" font-family="ProductSans-Black, Product Sans Black" font-size="15" font-weight="800" letter-spacing="-0.338498824" fill="#FFFFFF">
                                        <tspan x="63.5684988" y="20">18</tspan>
                                    </text>
                                </g>
                                <text id="+" font-family="ProductSans-Black, Product Sans Black" font-size="14" font-weight="800" letter-spacing="0.095832625" fill="#FFFFFF">
                                    <tspan x="78.9060837" y="19">+</tspan>
                                </text>
                            </g>
                        </g>
                    </svg>
                    <h5 class="mt-4">
                        <b>Please read the following warning before continuing</b>
                    </h5>
                    <p class="r3 px-md-5 px-sm-1">
                        <b>I am over 18 years old</b> and I accept the viewing of explicit texts and images intended for an <b>adult audience</b>. <br>
                    </p>
                    <hr class="my-1">
                    <span>I have read and accept the <br>
                        <a data-href="/terms-and-conditions/">Terms and Conditions</a>
                    </span>
                    <p></p>
                    <div class="text-center mb-3">
                        <button class="btn btn-primary w-50 rounded-pill b1">Accept</button>
                    </div>
                    <a data-href="/" data-dismiss="modal" class="text-center">Decline</a>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="container">
            <footer class="page-footer font-small white pt-4">
                <div class="container-fluid text-center text-md-left">
                    <div class="row">
                        <div class="col">
                            <p class="pt-md-1 pl-md-1"></p>
                            <hr>
                            <p class="pt-md-2 pl-md-1"></p>
                            <a data-href="/terms-and-conditions/">
                                <span>Terms and conditions</span>
                            </a>
                            <a data-href="/privacy-policy/">
                                <span>Privacy policy</span>
                            </a>
                            <a data-href="/contact-us/">
                                <span>Contact us</span>
                            </a>
                            <a style="display: none;">
                                <span>Manage your ads</span>
                            </a>
                            <a data-href="/promote-your-ads/">
                                <span>Promote your ads</span>
                            </a>


                        </div>
                    </div>
                    <p class="pt-md-1 pl-md-1"></p>
                    <div class="row">
                        <div class="col-sm">
                            <p class="social">Follow us:</p>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.youtube.com/" class="btn-floating btn-sm btn-yt mx-1">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.instagram.com/" class="btn-floating btn-sm btn-ins mx-1">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="" class="btn-floating btn-sm bg-dark mx-1">
                                        <i class="icon-twitter-x"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.tiktok.com/" class="btn-floating btn-sm bg-dark mx-1">
                                        <i class="fab fa-tiktok text-light"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a target="_blank" data-href="https://www.facebook.com/" class="btn-floating btn-sm btn-fb mx-1">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="rta"></div>
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
