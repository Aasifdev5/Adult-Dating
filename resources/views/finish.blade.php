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
<li class="confirm active"><strong>Finish</strong></li>
 </ul>
        </h1>
        <h5>You are Ad Successfully Publish now</h5>

        <a href="{{url('ads')}}">
          <b>Manage</b> your ads <br>
            </a>
      </div>
    </div>
  </div>
</main>
@endsection
