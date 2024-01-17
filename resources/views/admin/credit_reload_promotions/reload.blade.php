@extends('admin.Master')
@section('title')
Add Calender Profile
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
                    <h4 class="text-center">Add Calender Profile</h4>


                    <form action="{{ route('admin.credit_reload.reload') }}" class="theme-form" method="POST">
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
                            <label for="price" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="price" name="amount" value="{{old('amount')}}">
                            <span class="text-danger">@error('amount') {{$message}}@enderror</span>
                        </div>

                        <button type="submit" class="btn btn-primary">Reload Credit</button>
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
