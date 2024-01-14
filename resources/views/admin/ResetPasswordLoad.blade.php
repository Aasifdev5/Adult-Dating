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
   <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
   <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
   <title>Endless - Reset Password</title>
   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
   <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
   <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet">
   <!-- Font Awesome-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
   <!-- ico-font-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
   <!-- Themify icon-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">
   <!-- Flag icon-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">
   <!-- Feather icon-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css')}}">
   <!-- Plugins css start-->
   <!-- Plugins css Ends-->
   <!-- Bootstrap css-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
   <link id="bootstrap-file" rel="stylesheet" type="text/css" href="#">
   <!-- App css-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
   <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
   <!-- Responsive css-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
</head>

<body>
   <!-- Loader starts-->

   <!-- Loader ends-->
   <!-- page-wrapper Start-->
   <div class="page-wrapper">
      <div class="container-fluid">
         <!-- Reset Password page start-->
         <div class="authentication-main">
            <div class="row">
               <div class="col-md-12 p-0">
                  <div class="auth-innerright">
                     <div class="authentication-box">
                        <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                        <div class="card mt-4 p-4">
                           <form class="theme-form" action="{{url('ResetPassword')}}" method="post">
                              @if(Session::has('success'))
                              <div class="alert alert-success">{{Session::get('success')}}</div>
                              @endif
                              @if(Session::has('fail'))
                              <div class="alert alert-danger">{{Session::get('fail')}}</div>
                              @endif
                              @csrf
                              <?php
                              $user = json_decode(json_encode($customer), true);
                              $user = array_column($user, 'id', '0')
                              ?>
                              <input type="hidden" name="user_id" value="{{$user['0']}}">
                              <h5 class="f-16 mb-3 f-w-600">RESET PASSWORD</h5>
                              <div class="mb-3">
                                 <label class="col-form-label">New Password </label>
                                 <input type="password" class="form-control" id="pass" value="{{old('new_password')}}"
                                    name="new_password" autofocus placeholder="New Password">
                                 <span class="text-danger">@error ('new_password') {{$message}} @enderror</span>
                              </div>
                              <div class="mb-3">
                                 <label class="col-form-label">Confirm Password </label>
                                 <input type="password" class="form-control" id="pass"
                                    value="{{old('confirm_password')}}" name="confirm_password" autofocus
                                    placeholder="Confirm Password">
                                 <span class="text-danger">@error ('confirm_password') {{$message}} @enderror</span>
                              </div>
                              <div class="form-row">
                                 <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Reset Password</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Reset Password page end-->
      </div>
   </div>
   <!-- page-wrapper Ends-->
   <!-- latest jquery-->
   <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
   <!-- Bootstrap js-->
   <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
   <!-- feather icon js-->
   <script src="{{asset('assets/js/feather.min.js')}}"></script>
   <script src="{{asset('assets/js/feather-icon.js')}}"></script>
   <!-- Sidebar jquery-->
   <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
   <script src="{{asset('assets/js/config.js')}}"></script>
   <!-- Plugins JS start-->
   <!-- Plugins JS Ends-->
   <!-- Theme js-->
   <script src="{{asset('assets/js/script.js')}}"></script>

</body>

</html>