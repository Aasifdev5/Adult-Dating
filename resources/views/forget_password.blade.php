@extends('master')
@section('title')
Forget Password
@endsection
@section('content')
<main>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h1 class="main-title home">¿Olvidaste tu contraseña?</h1> No te preocupes, a todo el mundo le pasa. <i aria-hidden="true" class="fa fa-smile-o"></i>
            <p class="text-muted mt-2">Ingrese su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña.</p>
        </div>
    </div>
    <div class="container mt-5 mb-5 loginpanel">
        <form action="{{url('sendResetPasswordLink')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label class="">Correo electrónico</label>
                    <input name="email" type="email" placeholder="Email" class="form-control">
                    <!---->
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Restablecer la contraseña</button>
        </form>
    </div>
</main>
@endsection
