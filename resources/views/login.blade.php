@extends('master')
@section('title')
Login
@endsection
@section('content')

<main>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h1 class="main-title home"> Get into Social Citas! </h1>
        </div>
        <div class="d-flex justify-content-center tipsaccount">
            <div id="skokkaPromoCarousel" data-ride="carousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <i class="fa fa-line-chart mr-2"></i>
                        <br>
                        <strong>Publish and Manage </strong>your ads
                    </div>
                    <div class="carousel-item">
                        <i class="fa fa-bullhorn mr-2"></i>
                        <br> Discover all our <strong>news</strong>
                    </div>
                    <div class="carousel-item active">
                        <i class="fa fa-thumbs-o-up mr-2"></i>
                        <br> Activate our exclusive <strong>promotions</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5 loginpanel">
        <form action="{{url('log')}}" method="post">
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

            <div class="form-row">
                <div class="form-group col">
                    <label class="">Email</label>
                    <input name="email" type="email" placeholder="Email" autocomplete="off" value="{{old('email')}}" class="form-control">
                    <span class="text-danger" style="color:red;">@error ('email'){{$message}}@enderror</span>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="control-label">Password</label>
                    <input name="password" type="password" placeholder="Password"  value="{{old('password')}}" autocomplete="new-password" class="form-control" id="password-input">
        <span class="fa fa-fw field-icon toggle-password fa-eye-slash" onclick="togglePassword()"></span>
        <span class="text-danger" style="color:red;">@error('password'){{$message}}@enderror</span>
                </div>
            </div>

            <!---->
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Login</button>
        </form>
        <hr>
        <p class="text-center">
            <a href="{{url('forget_password')}}">Forgot your password?</a>
        </p>
        <p class="text-center">Don't have an account yet? <a href="{{url('signup')}}">Sign up!</a>
        </p>
    </div>
</main>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password-input");
        var eyeIcon = document.querySelector(".toggle-password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        }
    }
</script>
@endsection
