<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description"
      content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
   <meta name="keywords"
      content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app">
   <meta name="author" content="pixelstrap">
   <link rel="icon" href="{{asset('icon-removebg-preview.png')}}" type="image/x-icon">
   <link rel="shortcut icon" href="{{asset('icon-removebg-preview.png')}}" type="image/x-icon">
   <title>Social Citas - Admin Login</title>
   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
   <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
   <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
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
   <!-- Plugins css Ends-->
   <!-- Bootstrap css-->
   <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.css')}}">
   <link id="bootstrap-file" rel="stylesheet" type="text/css" href="#">
   <!-- App css-->
   <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
   <link id="color" rel="stylesheet" href="{{asset('admin/css/color-1.css')}}" media="screen">
   <!-- Responsive css-->
   <link rel="stylesheet" type="text/css" href="{{asset('admin/css/responsive.css')}}">
</head>

<body>
   <!-- Loader starts-->

   <!-- Loader ends-->
   <!-- page-wrapper Start-->
   <div class="page-wrapper">
      <div class="container-fluid p-0">
         <!-- login page with video background start-->
         <div class="auth-bg-video">
            <video id="bgvid" poster="{{asset('admin/images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
               <source src="{{asset('admin/video/auth-bg.mp4')}}" type="video/mp4">
            </video>
            <div class="authentication-box">
               <div class="text-center"><h1 style="font-weight: 700;"><img src="{{asset('logo.jpg')}}" alt=""></h1></div>
               <div class="card mt-4">
                  <div class="card-body">
                     <div class="text-center">
                        <h4>Admin LOGIN</h4>
                        <h6>Enter your Username and Password </h6>
                     </div>
                     <form class="theme-form" action="{{url('admin/log')}}" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                           <p>{{session::get('success')}}</p>
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                           <p>{{session::get('fail')}}</p>
                        </div>
                        @endif
                        @csrf

                        <div class="mb-3">
                           <label class="col-form-label pt-0">Email</label>
                           <input class="form-control" type="email" name="email">
                           <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                           <label class="col-form-label">Password</label>
                           <input class="form-control" type="password" name="pass">
                           <span class="text-danger">@error('pass'){{$message}}@enderror</span>
                        </div>
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label for="checkbox1">Remember me</label>
                        </div>
                        <div class="form-row mt-3">
                           <button class="btn btn-primary btn-block w-100" type="submit">Login</button>
                        </div>
                        <div class="form-row mt-3">
                           <a href="forget_password" class="btn btn-secondary btn-block w-100" type="submit">
                              Forget Password</a>
                        </div>
                        <!-- <div class="login-divider"></div> -->
                        <!-- <div class="social mt-3">
                           <div class="form-group btn-showcase d-flex">
                              <button class="btn social-btn btn-fb d-inline-block"> <i
                                    class="fa fa-facebook"></i></button>
                              <button class="btn social-btn btn-twitter d-inline-block"><i
                                    class="fa fa-google"></i></button>
                              <button class="btn social-btn btn-google d-inline-block"><i
                                    class="fa fa-twitter"></i></button>
                              <button class="btn social-btn btn-github d-inline-block"><i
                                    class="fa fa-github"></i></button>
                           </div>
                        </div> -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!-- login page with video background end-->
      </div>
   </div>
   <!-- latest jquery-->
   <script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>
   <!-- Bootstrap js-->
   <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
   <!-- feather icon js-->
   <script src="{{asset('admin/js/feather.min.js')}}"></script>
   <script src="{{asset('admin/js/feather-icon.js')}}"></script>
   <!-- Sidebar jquery-->
   <script src="{{asset('admin/js/sidebar-menu.js')}}"></script>
   <script src="{{asset('admin/js/config.js')}}"></script>
   <!-- Plugins JS start-->
   <!-- Plugins JS Ends-->
   <!-- Theme js-->
   <script src="{{asset('admin/js/script.js')}}"></script>
   <!-- Plugin used-->

</body>

</html>
