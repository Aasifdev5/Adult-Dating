@extends('admin.Master')
@section('title')
Add Task
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
                    <h4 class="text-center">Add Task</h4>

                    <form class="theme-form" action="{{url('admin/save_task')}}" method="post">
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

                        <div class="row g-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Order List</label>
                                    <select class="form-control select2" name="order_id">
                                        <option value="">Please Select</option>
                                        @foreach($order as $row)
                                        <option value="{{$row->id}}">{{ \App\Models\Course::getProductFullname($row->product_id) }}</option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger">@error('order_id'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Progress</label>

                                    <input type="text" name="progress" value="{{old('progress')}}" class="form-control">
                                    <span class="text-danger">@error('progress'){{$message}}@enderror</span>
                                </div>
                            </div>
                        </div>



                        <div class="row g-2">
                            <div class="col-sm-4">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>

                        </div>

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
