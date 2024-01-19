@extends('admin.Master')
@section('title')
Schedule Appointment
@endsection
@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- sign up page start-->
        <div class="auth-bg-video">
            <video id="bgvid" poster="{{asset('admin/images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
                <source src="{{asset('admin/video/auth-bg.mp4')}}" type="video/mp4">
            </video>
            <div class="authentication-box">
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card mt-4 p-4">
                    <h4 class="text-center">Schedule Appointment</h4>


                    <!-- Form to create a new banner -->
                    <form action="{{ route('appointments.store') }}" class="theme-form" method="post" enctype="multipart/form-data">
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
                        <label for="profile_id">Select Profile:</label>
                        <select name="profile_id" class="form-control select2" id="profile_id">
                            @foreach ($profiles as $profile)
                            <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                            @endforeach
                        </select>

                        <span class="text-danger">@error('profile_id'){{$message}}@enderror</span>
                        <br><br>
                        <label for="start_time">Start Time:</label>
                        <input type="datetime-local" class="form-control" name="start_time" id="start_time" required>

                        <span class="text-danger">@error('start_time'){{$message}}@enderror</span>
                        <br>
                        <label for="end_time">End Time:</label>
                        <input type="datetime-local" class="form-control" name="end_time" id="end_time" required>
                        <span class="text-danger">@error('end_time'){{$message}}@enderror</span>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Schedule Appointment</button>
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
