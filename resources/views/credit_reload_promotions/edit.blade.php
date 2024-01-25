@extends('admin.Master')
@section('title')
Edit Credit
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
                    <h4 class="text-center">Edit Credit</h4>


                    <!-- Form to create a new banner -->
                    <form action="{{ url('admin/promotions/'.$existingPromotion->id) }}" class="theme-form" >
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <p>{{ session('fail') }}</p>
                        </div>
                        @endif
                        @csrf
                        @method('PUT') {{-- or @method('PATCH') depending on your route definition --}}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" value="{{ $existingPromotion->name }}" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="minimum_amount">Minimum Amount:</label>
                            <input type="number" class="form-control" id="minimum_amount" value="{{ $existingPromotion->minimum_amount }}" name="minimum_amount" required>
                        </div>
                        <div class="form-group">
                            <label for="discount_percentage">Discount Percentage:</label>
                            <input type="number" class="form-control" id="discount_percentage" value="{{ $existingPromotion->discount_percentage }}" name="discount_percentage" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount:</label>
                            <input type="number" class="form-control" id="amount" value="{{ $existingPromotion->amount }}" name="amount" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
