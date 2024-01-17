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
                    <form action="{{ route('admin.banners.store') }}" class="theme-form" method="post" enctype="multipart/form-data">
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
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title'){{$message}}@enderror</span>
                        <label for="image">Image:</label>
                        <input type="file"  class="form-control" value="{{old('image')}}" name="image" accept="image/*" >
                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Create Banner</button>
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
