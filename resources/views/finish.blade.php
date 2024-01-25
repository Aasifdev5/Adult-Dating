@extends('master')
@section('title')
Posting Ad Finish
@endsection
@section('content')
<main>


<div class="feedback">
    <div class="container mt-5">
      <div class="text-center">
        <h1>
        <ul class="progressbar" style="margin-left: 400px;">
<li class="confirm active"><strong>Finalizar</strong></li>
 </ul>
        </h1>
        <h5>Tu anuncio se ha publicado correctamente ahora</h5>

        <a href="{{url('ads')}}">
          <b>Administrar</b> tus anuncios <br>
            </a>
      </div>
    </div>
  </div>
</main>
@endsection
