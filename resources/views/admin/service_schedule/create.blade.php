@extends('admin.Master')
@section('title')
Add Banner
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
                    <h4 class="text-center">Add Banner</h4>


                    <!-- Form to create a new banner -->
                    <form action="{{ route('admin.service_schedule.store') }}" class="theme-form" method="post">
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
                        <div class="form-group">
                            <label for="day_of_week">Day of Week</label>
                            <select class="form-control" id="day_of_week" name="day_of_week" required>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                            <span class="text-danger">@error('day_of_week'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                            <span class="text-danger">@error('start_time'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required>
                            <span class="text-danger">@error('end_time'){{$message}}@enderror</span>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Add Schedule</button>

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
