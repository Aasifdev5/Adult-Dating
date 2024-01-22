@extends('master')
@section('title')
Add  Profile
@endsection
@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="container">
        <!-- sign up page start-->
        <div class="auth-bg-video">

            <div class="authentication-box">
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card mt-4 p-4">
                    <h4 class="text-center">Add  Profile</h4>

                    <form action="{{ route('calendars.store') }}" class="theme-form" method="POST">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{session::get('success')}}</p>
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <p>{{session::get('fail')}}</p>
                        </div>
                        @endif
                        @csrf
                        <div class="mb-3">
                            <label for="ad_type" class="form-label">Profile </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">
                            <span class="text-danger">@error('price') {{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label>
                            <textarea class="form-control" id="details" name="details" value="{{old('details')}}"></textarea>
                            <span class="text-danger">@error('details') {{$message}}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="schedule" class="form-label">Days</label>
                            <input type="number" class="form-control" id="days" value="{{old('days')}}" name="days">
                            <span class="text-danger">@error('days') {{$message}}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!-- sign up page ends-->
</div>
</div>
<!-- page-wrapper Ends-->
@endsection
