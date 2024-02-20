@extends('master')
@section('title')
SignUp
@endsection
@section('content')
<main>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h1 class="main-title home">Únase a las citas sociales</h1>
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
        <form action="{{url('reg')}}" method="post" autocomplete="off">
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
                                <label class=""><i class="fa fa-asterisk"></i>Nombre de perfil</label>
                                <input name="name" type="text" value="{{old('name')}}" class="form-control" >
                                <span class="text-danger">@error ('name'){{$message}}@enderror</span>
                                <!---->
                            </div>
                            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="">Correo electrónico</label>
                    <input name="email" type="email" placeholder="Correo electrónico" autocomplete="off" value="{{old('email')}}" class="form-control" >
                    <span class="text-danger">@error ('email'){{$message}}@enderror</span>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="">Número de teléfono móvil</label>
                    <input name="mobile_number" type="text" placeholder="Número de teléfono móvil" autocomplete="off" value="{{old('mobile_number')}}" class="form-control" >
                    <span class="text-danger" >@error ('mobile_number'){{$message}}@enderror</span>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="">Tipo de cuenta</label>
                    <select name="account_type" id="" class="form-control">
                        <option value="">Por favor seleccione el tipo de cuenta</option>
                        <option value="advertiser">Anunciante (Independiente)</option>
                        <option value="manager">Gerente (Club)</option>
                        <option value="partner">Pareja</option>
                        <option value="user">Consumidor (Usuario)</option>

                    </select>
                    <span class="text-danger" >@error ('account_type'){{$message}}@enderror</span>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="control-label">Contraseña</label>
                    <input name="password" type="password" placeholder="Contraseña" onkeypress="checkPasswordRequirements()" value="{{old('password')}}" autocomplete="new-password" class="form-control" id="password-input">
                    <span class="fa fa-fw field-icon toggle-password fa-eye-slash" onclick="togglePassword()"></span>
                    <span class="text-danger" style="color:red;">@error('password'){{$message}}@enderror</span>
                </div>
            </div>
            <div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
            </div>
            <style>
                .valid {
                    color: green;
                }
            </style>
            <div id="message" role="alert" class="alert alert-loginpanel">
                <h6>Tu contraseña debe tener:</h6>
                <ul>
                    <li class="invalid" id="lowercase">A <b>lowercase</b> letter </li>
                    <li class="invalid" id="uppercase">A <b>uppercase</b> letter </li>
                    <li class="invalid" id="number">A <b>number</b></li>
                    <li class="invalid" id="min-length">Minimum <b>8 characters</b></li>
                </ul>
            </div>

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

                function checkPasswordRequirements() {
                    var password = document.getElementById("password-input").value;
                    var lowercase = document.getElementById("lowercase");
                    var uppercase = document.getElementById("uppercase");
                    var number = document.getElementById("number");
                    var minLength = document.getElementById("min-length");

                    // Check if password has lowercase letter
                    if (/[a-z]/.test(password)) {
                        lowercase.classList.remove("invalid");
                    } else {
                        lowercase.classList.add("valid");
                    }

                    // Check if password has uppercase letter
                    if (/[A-Z]/.test(password)) {
                        uppercase.classList.remove("invalid");
                    } else {
                        uppercase.classList.add("valid");
                    }

                    // Check if password has a number
                    if (/\d/.test(password)) {
                        number.classList.remove("invalid");
                    } else {
                        number.classList.add("valid");
                    }

                    // Check if password meets minimum length requirement
                    if (password.length >= 8) {
                        minLength.classList.remove("invalid");
                    } else {
                        minLength.classList.add("valid");
                    }
                }

                // Add an event listener to check requirements when the user types
                document.getElementById("password-input").addEventListener("input", checkPasswordRequirements);
            </script>


            <div class="row">
                <div class="col-md-2">
                    <label for="terms" class="switch switch-left-right">
                        <input id="terms" type="checkbox" name="terms" class="switch-input form-control">
                        <span data-on="Yes" data-off="No" class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>
                <div class="col-md-10 txt_privacy">
                    <b>Términos, condiciones y política de privacidad</b>
                    <p> I have read the <a target="_blank" data-href="/terms-and-conditions/">Terms and Conditions</a> of use and <a target="_blank" data-href="/privacy-policy/">Privacy Policy</a> and I hereby authorize the processing of my personal data for the purpose of providing this web service. </p>
                    <!---->
                </div>
            </div>

            <!---->
            <button type="submit" class="btn btn-primary btn-block">¡Regístrate</button>
        </form>
        <hr>
        <p class="text-center">¿Ya tienes una cuenta? <a href="{{url('Userlogin')}}">Iniciar sesión</a>
        </p>
    </div>
</main>

@endsection
