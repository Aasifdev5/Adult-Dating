@extends('admin.Master')
@section('title')
Edit Top ad
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
                    <h4 class="text-center">Edit Top ad</h4>



                    <form action="{{ route('admin.ads.update', ['ad' => $ad->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ad_type" class="form-label">Ad Type</label>
                            <input type="text" class="form-control" id="ad_type" name="ad_type" value="{{ $ad->ad_type }}" required>
                            <span class="text-danger">@error('ad_type'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $ad->price }}" required>
                            <span class="text-danger">@error('price'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="detail" class="form-label">Detail</label>
                            <textarea class="form-control" id="detail" name="detail" required>{{ $ad->detail }}</textarea>
                            <span class="text-danger">@error('detail'){{$message}}@enderror</span>
                        </div>

                        <div class="mb-3 form-check">
                        <label class="form-check-label" for="publish">Publish</label>
                            <select name="publish" id="publish" value="{{old('publish')}}" class="form-control">
                                <option value="1" @if($ad->publish==1) selected @endif>Yes</option>
                                <option value="0" @if($ad->publish==0) selected @endif >No</option>
                            </select>

                            <span class="text-danger">@error('publish') {{$message}}@enderror</span>
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
