<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('icon-removebg-preview.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('icon-removebg-preview.png')}}" type="image/x-icon">
    <title>Social Citas - @yield('title')</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/fontawesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/prism.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.css')}}">
    <link id="bootstrap-file" rel="stylesheet" type="text/css" href="#">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <!-- Include Toastr.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Include Toastr.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/select2.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        /* input file  */
        .personal-image {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 15px;
        }

        .personal-image input[type="file"] {
            display: none;
        }

        .personal-figure {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .personal-avatar {
            cursor: pointer;
            width: 150px;
            height: 150px;
            box-sizing: border-box;
            border-radius: 100%;
            border: 2px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.2);
            transition: all ease-in-out .3s;
        }

        .personal-avatar:hover {
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.5);
        }

        .personal-figcaption {
            cursor: pointer;
            position: absolute;
            top: 0px;
            width: inherit;
            height: inherit;
            border-radius: 100%;
            opacity: .6;
            background-color: rgba(0, 0, 0, .3);
            transition: all ease-in-out .3s;
        }


        .personal-figcaption>img {
            margin-top: 32.5px;
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader bg-white">
            <div class="whirly-loader"> </div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        <div class="page-main-header">
            <div class="main-header-right row">
                <div class="main-header-left col-auto px-0 d-lg-none">
                    <div class="logo-wrapper"><a href="{{url('admin/dashboard')}}"><img src="{{asset('logo-removebg-preview.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="vertical-mobile-sidebar col-auto ps-3 d-none"><i class="fa fa-bars sidebar-bar"></i></div>
                <div class="mobile-sidebar col-auto ps-0 d-block">
                    <div class="media-body switch-sm">
                        <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                    </div>
                </div>
                <div class="nav-right col p-0">
                    <ul class="nav-menus">
                        <li>
                            <form class="form-inline search-form" action="#" method="get">
                                <div class="form-group me-0">
                                    <div class="Typeahead Typeahead--twitterUsers">
                                        <div class="u-posRelative">
                                            <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search...">
                                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                        </div>
                                        <div class="Typeahead-menu"></div>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <?php

                        use Illuminate\Support\Facades\DB;

                        $languages = DB::table('languages')->get();

                        ?>
                        <li class="onhover-dropdown">

                            <select class="form-control lang-change" name="lang">

                                @if(count($languages)> 0)
                                @foreach($languages as $row)
                                <option @if($row->code==session()->get('lang_code'))
                                    selected
                                    @endif
                                    value="{{$row->code}}"
                                    {{ session()->get('lang_code')=='$row->code' ? 'selected' : '' }}>
                                    {{$row->name}}
                                </option>
                                @endforeach
                                @endif

                            </select>



                        </li>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                        <script type="text/javascript">
                            var url = "{{ url('admin/lang/change') }}";

                            $('.lang-change').change(function() {
                                1
                                let lang_code = $(this).val();
                                let main = url + "?lang=" + lang_code;
                                console.log(main);
                                window.location.href = url + "?lang=" + lang_code;

                            });
                        </script>
                        <li class="onhover-dropdown"><i data-feather="bell"></i><span class="dot"></span>
                            <ul class="notification-dropdown onhover-show-div">
                                <li>Notification <span class="badge rounded-pill badge-primary pull-right">3</span></li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0"><span><i class="shopping-color" data-feather="shopping-bag"></i></span>Your order
                                                ready for Ship..!<small class="pull-right">9:00 AM</small></h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 txt-success"><span><i class="download-color font-success" data-feather="download"></i></span>Download Complete<small class="pull-right">2:30
                                                    PM</small></h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger" data-feather="alert-circle"></i></span>250 MB trash files<small class="pull-right">5:00
                                                    PM</small></h6>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="bg-light txt-dark"><a href="#">All</a> notification</li>
                            </ul>
                        </li>

                        <li class="onhover-dropdown">
                            <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle" src="{{asset('profile_photo/')}}<?php echo '/' . $user_session->profile_photo; ?>" alt="header-user">
                                <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20">
                                <li><a href="{{url('admin/edit_profile')}}"><i data-feather="user"></i> Edit Profile</a></li>

                                <li><a href="{{url('admin/change_password')}}"><i data-feather="lock"></i> Change Password</a></li>
                                <li><a href="#"><i data-feather="settings"></i> Settings</a></li>
                                <li><a href="{{url('admin/logout')}}"><i data-feather="log-out"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
                </div>
                <script id="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName"></div>
            </div>
            </div>
          </script>
                <script id="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>

          </script>
            </div>
        </div>
        <!-- Page Header Ends   -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="page-sidebar">
                <div class="main-header-left d-none d-lg-block">
                    <div class="logo-wrapper"><a href="{{url('admin/dashboard')}}"><img src="{{asset('logo-removebg-preview.png')}}" style="width: 200px;" alt=""></a>
                    </div>
                </div>
                <div class="sidebar custom-scrollbar">
                    <div class="sidebar-user text-center">
                        <div>
                            @if(!empty($user_session->profile_photo))
                            <img src="{{asset('profile_photo/')}}<?php echo '/' . $user_session->profile_photo; ?>" class="personal-avatar" alt="avatar">
                            @else
                            <img src="images/profile photo.png" class="personal-avatar" alt="avatar">
                            @endif
                            <div class="profile-edit"><a href="edit_profile" target="_blank"><i data-feather="edit"></i></a>
                            </div>
                        </div>
                        <h6 class="mt-3 f-14"><?php
                                                echo    $user_session->name;
                                                ?></h6>

                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="sidebar-header" href="{{url('admin/dashboard')}}"><i data-feather="home"></i><span>{{ trans('dashboard') }}</span></a>

                        </li>
                        <!-- <li><a class="sidebar-header" href="{{url('conversations')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle right_side_toggle">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg><span>{{ trans('Chat') }}</span></a> -->

                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>{{__('settings')}}</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url('admin/country')}}"><i class="fa fa-circle"></i> country</a></li>
                                <li><a href="{{url('admin/city')}}"><i class="fa fa-circle"></i> city</a></li>
                                <li><a href="{{url('admin/smtp_setting')}}"><i class="fa fa-circle"></i>SMTP Setting</a></li>
                                <li><a href="{{url('admin/payment_gateway')}}"><i class="fa fa-circle"></i>Payment Gateway</a></li>
                                <li><a href="{{url('admin/social_lite_login')}}"><i class="fa fa-circle"></i>Socialite Login</a></li>
                                <li><a href="{{url('admin/website_setting')}}"><i class="fa fa-circle"></i>General Seting</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="{{ url('admin/banners') }}"><i data-feather="book"></i><span>Banner</span></a></li>
                        <li><a class="sidebar-header" href="{{ url('admin/ads') }}"><i data-feather="book"></i><span>Top Ads</span></a></li>
                        <li><a class="sidebar-header" href="{{ url('admin/calendars') }}"><i data-feather="book"></i><span>Calender Profile</span></a></li>
                        <li><a class="sidebar-header" href="#"><i data-feather="shopping-bag"></i><span>Payment Management</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url('admin/qrcode')}}"><i class="fa fa-circle"></i> Manual Payment Method</a></li>
                                <li><a href="{{url('admin/credit_reloads')}}"><i class="fa fa-circle"></i> Credit Reload</a></li>
                                <li><a href="{{url('admin/subscription/payment_reports')}}"><i class="fa fa-circle"></i> Payment Report  </a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="{{url('admin/credit_reload_promotions')}}"><i data-feather="book"></i><span>Credits</span></a>

                        </li>
                        <li><a class="sidebar-header" href="{{url('admin/pages')}}"><i data-feather="book"></i><span>Pages</span></a>

                        </li>
                        <li>
                            <a href="{{ url('admin/mail-templates') }}" class="sidebar-header">
                                <i data-feather="mail"></i><span>Mail Templates</span>
                            </a>
                        </li>
                        <!-- <li class="active"><a class="sidebar-header" href="#" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg><span>Email</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li class="active"><a href="email-application" class="active" data-bs-original-title="" title=""><i class="fa fa-circle"></i>Email App</a></li>
                                <li><a href="email-compose" data-bs-original-title="" title=""><i class="fa fa-circle"></i>Email Compose</a></li>
                            </ul>
                        </li> -->
                        <!-- <li><a class="sidebar-header" href="#"><span class="fa fa-language"></span> &nbsp;&nbsp;<span>Multi Languages</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url('admin/language')}}"><i class="fa fa-circle"></i>Languages</a></li>
                                <li><a href="{{url('admin/languages')}}"><i class="fa fa-circle"></i>Add Transaltion </a></li>

                            </ul>
                        </li> -->
                        <!-- <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Content
                                    Management</span></a>


                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="home"></i><span>Permission
                                    Management</span></a> </li> -->
                        <li><a class="sidebar-header" href="{{url('admin/users')}}"><i data-feather="users"></i><span>User Management</span></a>
                        </li>

                        <li><a class="sidebar-header" href="#"><i data-feather="shopping-bag"></i><span>Ads Management</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="categories"><i class="fa fa-circle"></i> Service</a></li>
                                <li><a href="{{url('admin/Course_list')}}"><i class="fa fa-circle"></i>Category List</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="#"><i data-feather="shopping-bag"></i><span>Order Management</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{url('admin/transactions_report')}}"><i class="fa fa-circle"></i>Transaction Report </a></li>
                                <li><a href="{{url('admin/tasks')}}"><i class="fa fa-circle"></i>Task List </a></li>
                                <li><a href="{{url('admin/orders')}}"><i class="fa fa-circle"></i>Order List</a></li>

                            </ul>
                        </li>
                        <li><a class="sidebar-header" href="{{url('admin/balance')}}"><i data-feather="dollar-sign"></i><span>Balance </span></a>

                        </li>
                        <li><a class="sidebar-header" href="{{url('admin/withdraws')}}"><i data-feather="dollar-sign"></i><span>Withdraw Request </span></a>

                        </li>
                        <li><a class="sidebar-header" href="{{url('admin/subscription_plan')}}"><i data-feather="dollar-sign"></i><span>Subscription </span></a>

                        </li>
                        <li><a class="sidebar-header" href="{{url('admin/transactions')}}"><i data-feather="dollar-sign"></i><span>Transactions </span></a>

                        </li>
                        <!-- <li><a class="sidebar-header" href="#"><i data-feather="settings"></i><span>Enquiry
                                    Management</span><i class="fa fa-angle-right pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="general-widget.html"><i class="fa fa-circle"></i>Student Enquiry</a></li>
                                <li><a href="chart-widget.html"><i class="fa fa-circle"></i>Become An A Instructor</a></li>
                                <li><a href="general-widget.html"><i class="fa fa-circle"></i>Company Enquiry</a></li>

                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <!-- Right sidebar Start-->
            <div class="right-sidebar" id="right_side_bar">
                <div class="container p-0">
                    <div class="modal-header p-l-20 p-r-20">
                        <div class="col-sm-8 p-0">
                            <h6 class="modal-title fw-bold">FRIEND LIST</h6>
                        </div>
                        <div class="col-sm-4 text-end p-0"><i class="mr-2" data-feather="settings"></i></div>
                    </div>
                </div>
                <div class="friend-list-search mt-0">
                    <input type="text" placeholder="search friend"><i class="fa fa-search"></i>
                </div>
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/1.jpg')}}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/2.png')}}" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status"> 28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/8.jpg')}}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/4.jpg')}}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/5.jpg')}}" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status"> 2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/6.jpg')}}" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status"> 2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix"><img class="rounded-circle user-image" src="{{asset('assets/images/7.jpg')}}" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status"> Online</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Right sidebar Ends-->
            @yield('content')
            <!-- footer start-->
            <!-- <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2023 © Aasif All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
              </div>
            </div>
          </div>
        </footer> -->
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('admin/js/feather.min.js')}}"></script>
    <script src="{{asset('admin/js/feather-icon.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('admin/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('admin/js/raphael.js')}}"></script>
    <script src="{{asset('admin/js/morris.js')}}"></script>
    <script src="{{asset('admin/js/prettify.min.js')}}"></script>
    <script src="{{asset('admin/js/chart.min.js')}}"></script>
    <script src="{{asset('admin/js/knob.min.js')}}"></script>
    <script src="{{asset('admin/js/knob-chart.js')}}"></script>
    <script src="{{asset('admin/js/prism.min.js')}}"></script>
    <script src="{{asset('admin/js/clipboard.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('admin/js/counter-custom.js')}}"></script>
    <script src="{{asset('admin/js/custom-card.js')}}"></script>
    <script src="{{asset('admin/js/owl.carousel2.js')}}"></script>
    <script src="{{asset('admin/js/chart.custom.js')}}"></script>
    <script src="{{asset('admin/js/morris-script.js')}}"></script>
    <script src="{{asset('admin/js/owl-carousel.js')}}"></script>
    <script src="{{asset('admin/js/handlebars.js')}}"></script>
    <script src="{{asset('admin/js/typeahead.bundle.js')}}"></script>
    <script src="{{asset('admin/js/typeahead.custom.js')}}"></script>
    <script src="{{asset('admin/js/typeahead.custom2.js')}}"></script>
    <script src="{{asset('admin/js/chat-menu.js')}}"></script>
    <script src="{{asset('admin/js/height-equal.js')}}"></script>
    <script src="{{asset('admin/js/tooltip-init.js')}}"></script>
    <script src="{{asset('admin/js/handlebars.js')}}"></script>
    <script src="{{asset('admin/js/typeahead-custom.js')}}"></script>
    <script src="{{asset('admin/js/laravel.pixelstrap.com_endless_assets_js_datatable_datatables_datatable.custom.js')}}">
    </script>
    <script src="{{asset('admin/js/select2-custom.js')}}"></script>

    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/select2-custom.js')}}"></script>
    <script src="{{asset('admin/js/select2.full.min.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('admin/js/script.js')}}"></script>
    <script src="{{asset('admin/js/customizer.js')}}"></script>
    <script src="{{asset('admin/js/email-app.js')}}"></script>

    <!-- Plugin used-->

    <script src="https://cdn.tiny.cloud/1/pzdns3vajz53swqokshw2lkh5xs5wlh77npc2iztvc5c1u0d/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

</body>

</html>
