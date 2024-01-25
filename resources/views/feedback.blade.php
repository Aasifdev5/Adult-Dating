@extends('master')
@section('title')
Social Citas
@endsection
@section('content')
<main>
  <div class="feedback">
    <div class="container mt-5">
      <div class="text-center">
        <h1>
          <i aria-hidden="true" class="icon-mail-time"></i>
        </h1>
        <h5>Para activar su cuenta, haga clic en el enlace que le enviamos por correo electrónico:</h5>
        <p>
          <b>{{$user->email}}</b>
        </p>
        <p>Después de confirmar su dirección de correo electrónico, puede: <br>
          <b>Publicar</b> sin correo electrónico de confirmación <br> Fácilmente <b>administrar</b> tus anuncios <br>
          <b>Acceso</b> paquetes diseñados para ti <br>
          <br> Si no recibe el correo electrónico de confirmación unos minutos después de registrarse, revise su carpeta de Spam o Correo no deseado.
        </p>
      </div>
    </div>
  </div>
</main>
@endsection
