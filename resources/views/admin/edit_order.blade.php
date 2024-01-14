@extends('admin.Master')
@section('title')
Edit Order
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
                    <h4 class="text-center">Edit Order</h4>

                    <form class="theme-form" action="{{url('admin/update_order')}}" method="post">
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
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <div class="row g-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">User List</label>
                                    <select class="form-control select2" name="user_id">
                                        <option value="">Please Select</option>
                                        @foreach($users as $row)
                                        <option value="{{$row->id}}" @if($row->id==$order->user_id) selected
                                            @endif>{{$row->name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger">@error('user_id'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Product List</label>
                                    <select class="form-control select2" name="product_id">
                                        <option value="">Please Select</option>
                                        @foreach($course as $row)
                                        <option value="{{$row->id}}"  @if($row->id==$order->product_id) selected
                                            @endif>{{$row->course_name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger">@error('product_id'){{$message}}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Order Date</label>
                                    <input class="form-control" type="date" name="order_date" value="{{$order->order_date}}">
                                    <span class="text-danger">@error('order_date'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Due On</label>
                                    <input class="form-control" type="date" name="due_on" value="{{$order->due_on}}">
                                    <span class="text-danger">@error('due_on'){{$message}}@enderror</span>
                                </div>
                            </div>
 <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Order Duration</label>
                                    <select class="form-control select2" name="duration">
                                        <option value="">Please Select</option>

                                        <option value="3"  @if($order->duration==3) selected
                                            @endif>3 days</option>
                                        <option value="5"  @if($order->duration==5) selected
                                            @endif>5 days</option>
                                        <option value="7"  @if($order->duration==7) selected
                                            @endif>7 days</option>
                                    </select>

                                    <span class="text-danger">@error('duration'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Order Status</label>
                                    <select class="form-control select2" name="status">
                                        <option value="">Please Select</option>

                                        <option value="progress"  @if($order->status=="progress") selected
                                            @endif>Progress</option>
                                        <option value="completed"  @if($order->status=="completed") selected
                                            @endif>Completed</option>
                                        <option value="cancel"  @if($order->status=="cancel") selected
                                            @endif>Cancel</option>
                                    </select>

                                    <span class="text-danger">@error('status'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Amount</label>

                                    <input type="text" name="amount" value="{{$order->payment_amount}}" class="form-control">
                                    <span class="text-danger">@error('amount'){{$message}}@enderror</span>
                                </div>
                            </div>



                        </div>



                        <div class="row g-2">
                            <div class="col-sm-4">
                                <button class="btn btn-primary" type="submit">Update</button>
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
