@extends('master')
@section('title')
Social Citas
@endsection
@section('content')
<main>
  <div class="feedback">
    <div class="container mt-5">
      <div class="text-center">
       <h1>Gracias por programar la cita.<br> Ahora puedes confirmar con el anunciante a través de WhatsApp.
       </h1>
       
        <p>
          <b>
            <a href="https://api.whatsapp.com/send?phone=<?php echo $advertiser;?>&text=<?php
                if (!empty($appointment->user_id)) {
                    $user = \App\Models\User::where('id', $appointment->user_id)->first();
                    echo rawurlencode($user->name . ' ha agendado una cita para el día');
                }
                if (!empty($appointment->date)) {
                    $time = strtotime($appointment->date);
setlocale(LC_TIME, 'es_ES.UTF-8'); // Set locale to Spanish
echo rawurlencode(strftime('%d %B %Y', $time) . ' a las ');

                }
                if (!empty($appointment->start_time)) {
                    $time = strtotime($appointment->start_time);
                    echo rawurlencode(date('H:i:s', $time) . ".");
                }
            ?>"
               class="float" target="_blank">
               <!--<i class="fa fa-whatsapp my-float" style="font-size: 50px;"></i>-->
               <img src="{{asset('boton.png')}}">
            </a>
          </b>
        </p>
       
      </div>
    </div>
  </div>
</main>
@endsection
