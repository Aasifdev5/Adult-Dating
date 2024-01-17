@extends('admin.Master')
@section('title')
Edit Calender Profile
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
                    <h4 class="text-center">Edit Calender Profile</h4>



                    <form action="{{ route('admin.calendars.update', ['calendar' => $calendar->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ad_type" class="form-label">Profile</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $calendar->name }}" required>
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $calendar->price }}" required>
                            <span class="text-danger">@error('price'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label>
                            <textarea class="form-control" id="details" name="details" required>{{ $calendar->details }}</textarea>
                            <span class="text-danger">@error('details'){{$message}}@enderror</span>
                        </div>


                        <div class="mb-3">
                            <label for="schedule" class="form-label">Days</label>
                            <input type="number" class="form-control" id="days" name="days" value="{{ $calendar->days }}">
                            <span class="text-danger">@error('days'){{$message}}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
