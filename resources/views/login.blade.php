@extends('master')
@section('title')
Login
@endsection
@section('content')

<main>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h1 class="main-title home"> Ingrese a las citas sociales! </h1>
        </div>
        <div class="d-flex justify-content-center tipsaccount">
            <div id="skokkaPromoCarousel" data-ride="carousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <i class="fa fa-line-chart mr-2"></i>
                        <br>
                        <strong>Publica y gestiona tus anuncios </strong>
                    </div>
                    <div class="carousel-item">
                        <i class="fa fa-bullhorn mr-2"></i>
                        <br>  <strong>Descubre todas nuestras novedades</strong>
                    </div>
                    <div class="carousel-item active">
                        <i class="fa fa-thumbs-o-up mr-2"></i>
                        <br>  <strong>Activa nuestras promociones exclusivas</strong>
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
                    <label class="">Correo electrónico</label>
                    <input name="email" type="email" placeholder="Correo electrónico" autocomplete="off" value="{{old('email')}}" class="form-control">
                    <span class="text-danger" style="color:red;">@error ('email'){{$message}}@enderror</span>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="control-label">Contraseña</label>
                    <input name="password" type="password" placeholder="Contraseña"  value="{{old('password')}}" autocomplete="new-password" class="form-control" id="password-input">
        <span class="fa fa-fw field-icon toggle-password fa-eye-slash" onclick="togglePassword()"></span>
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
            </div>

           
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Iniciar sesión</button>
        </form>
        <hr>
        <p class="text-center">
            <a href="{{url('forget_password')}}">¿Olvidaste tu contraseña?</a>
        </p>
        <p class="text-center">¿Todavía no tienes una cuenta? <a href="{{url('signup')}}">¡Regístrate!</a>
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
