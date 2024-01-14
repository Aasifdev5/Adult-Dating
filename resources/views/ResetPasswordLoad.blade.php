<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Reset Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="assets/css/style10.css">
  <style>
    * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  color: #333;
  font-size: 13px;
  margin: 0;
}

input,
textarea,
select,
button {
  color: #333;
  font-size: 13px;
}

p,
h1,
h2,
h3,
h4,
h5,
h6,
ul {
  margin: 0;
}

img {
  max-width: 100%;
}

ul {
  padding-left: 0;
  margin-bottom: 0;
}

a:hover {
  text-decoration: none;
}

:focus {
  outline: none;
}

.wrapper {

  height: 100vh;
  background-size: cover;
  background-repeat: no-repeat;
  display: flex;
  align-items: center;
}

.inner {
  padding: 20px;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.6);
  border-radius: 5px;
  width: 800px;
  margin: auto;
  display: flex;
}

.inner .image-holder {
  width: 50%;
}

.inner form {
  width: 50%;
  padding-top: 15px;
  padding-left: 25px;
  padding-right: 25px;
}

.image {
  width: 100%;
  margin: 0 auto;
  height: 55%;
  border-radius: 50%;
  display: flex;
  margin-bottom: 15px;
}

.inner h3 {
  font-size: 25px;

  text-align: center;
  margin-bottom: 5px;
}

.para {
  text-align: center;
  margin-bottom: 25px;

}

.form-group {
  display: flex;
}

.form-group input {
  width: 100%;
}

.form-group input:first-child {
  margin-right: 25px;
}

.form-wrapper {
  position: relative;
}

/* 
.form-wrapper img {
  position: absolute;
  bottom: 15px;
  right: 0;
  padding-right: 5px;
} */

.form-control {
  background-color: #fff;
  border-radius: 7px;
  display: block;
  border: 1px solid black;
  width: 100%;
  height: 40px;
  padding: 5px;
  margin-bottom: 12px;
}

.form-control::-webkit-input-placeholder {
  font-size: 13px;
  color: #333;
}

.form-control::-moz-placeholder {
  font-size: 13px;
  color: #333;
}

.form-control:-ms-input-placeholder {
  font-size: 13px;
  color: #333;
}

.form-control:-moz-placeholder {
  font-size: 13px;
  color: #333;
}

a {
  text-decoration: none;

}

.forget {
  color: rgb(218, 35, 35);
}

.btn {
  border: none;
  width: 100%;
  height: 40px;
  margin: auto;
  margin-top: 15px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  background: royalblue;
  font-size: 15px;
  color: #fff;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  border-radius: 5px;
}

.button {
  color: #000;
  background-color: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
}

.btn .google {
  width: 26px;
  height: 26px;
  margin-right: 10px;
}

.btn .facebook {
  width: 30px;
  height: 30px;
  margin-right: 10px;
}

.flex {
  display: flex;
  justify-content: space-between;
}

.check {
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.change {
  margin-top: 15px;
  text-align: center;
}

.sign {
  color: royalblue;
}

@-webkit-keyframes hvr-icon-wobble-horizontal {
  16.65% {
    -webkit-transform: translateX(6px);
    transform: translateX(6px);
  }

  33.3% {
    -webkit-transform: translateX(-5px);
    transform: translateX(-5px);
  }

  49.95% {
    -webkit-transform: translateX(4px);
    transform: translateX(4px);
  }

  66.6% {
    -webkit-transform: translateX(-2px);
    transform: translateX(-2px);
  }

  83.25% {
    -webkit-transform: translateX(1px);
    transform: translateX(1px);
  }

  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}

@keyframes hvr-icon-wobble-horizontal {
  16.65% {
    -webkit-transform: translateX(6px);
    transform: translateX(6px);
  }

  33.3% {
    -webkit-transform: translateX(-5px);
    transform: translateX(-5px);
  }

  49.95% {
    -webkit-transform: translateX(4px);
    transform: translateX(4px);
  }

  66.6% {
    -webkit-transform: translateX(-2px);
    transform: translateX(-2px);
  }

  83.25% {
    -webkit-transform: translateX(1px);
    transform: translateX(1px);
  }

  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}

@media (max-width: 1199px) {
  .wrapper {
    background-position: right center;
  }
}

@media (max-width: 991px) {
  .inner form {
    padding-top: 10px;
    padding-left: 30px;
    padding-right: 30px;
  }
}

@media (max-width: 767px) {
  .inner {
    display: block;
  }

  .inner .image-holder {
    width: 98%;
  }

  .inner form {
    width: 100%;
    padding: 15px 0 20px;
  }

  button {
    margin-top: 15px;
  }
}

/*# sourceMappingURL=style.css.map */
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="inner">

      <form action="{{url('ResetPassword')}}" method="post">
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
                        @csrf    
                        <?php
                        // print_r($email);
                              // $user = json_decode(json_encode($customer), true);
                              // $user = array_column($user, 'id', '0')
                              ?>
                              <input type="hidden" name="email" value="{{$email}}">
        <img class="image" src="{{asset('images/login/logo.jpg')}}" alt="">
        <h3>Reset Password</h3>
        
       
        <div class="form-wrapper">
        <input type="password" id="input2" name="new_password" class="form-control" placeholder="New Password">
          <span class="text-danger" style="color:red;">@error('new_password'){{$message}}@enderror</span>
        </div>
        <br>
        <div class="form-wrapper">
        <input type="password" id="input2" name="confirm_password" class="form-control" placeholder="Confirm New Password">
          <span class="text-danger" style="color:red;">@error ('confirm_password'){{$message}}@enderror</span>
         
        </div>
       
       
        <button class="btn" type="submit">Reset Password</button>
       
      </form>
      <div class="image-holder">
        <img src="{{asset('images/login/side1.jpg')}}" alt="" style="height: 100%;">
        <div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>