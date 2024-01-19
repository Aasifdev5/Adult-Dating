@extends('admin.Master')
@section('title')
Edit Banner
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
                    <h4 class="text-center">Edit Banner</h4>



                    <!-- Form to edit an existing banner -->
                    <form action="{{ route('admin.banners.update', $banner->id) }}" class="theme-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $banner->title }}" >
                        <span class="text-danger">@error('title'){{$message}}@enderror</span>
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                        <span class="text-danger">@error('image'){{$message}}@enderror</span>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Banner</button>
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
