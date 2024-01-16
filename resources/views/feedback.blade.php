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
        <h5>To activate your account, click on the link we sent you via email:</h5>
        <p>
          <b>{{$user->email}}</b>
        </p>
        <p> After confirming your email address, you can: <br>
          <b>Publish</b> without confirmation email <br> Easily <b>manage</b> your ads <br>
          <b>Access</b> packages and products designed for you <br>
          <br> If you do not receive the confirmation email within a few minutes after signing up, please check your Spam or Junk folder.
        </p>
      </div>
    </div>
  </div>
</main>
@endsection
