@extends('admin.Master')
@section('title')
Edit Transaction
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
                    <h4 class="text-center">Edit Transaction</h4>

                    <form class="theme-form" action="{{url('admin/update_transaction')}}" method="post">
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
                        <input type="hidden" name="id" value="{{$transaction->id}}">
                        <div class="row g-1">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">User List</label>
                                    <select class="form-control select2" name="user_id">
                                        <option value="">Please Select</option>
                                        @foreach($users as $row)
                                        <option value="{{$row->id}}" @if($row->id==$transaction->user_id) selected
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
                                        <option value="{{$row->id}}"  @if($row->id==$transaction->product_id) selected
                                            @endif>{{$row->course_name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="text-danger">@error('product_id'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Date</label>
                                    <input class="form-control" type="date" name="date" value="{{$transaction->date}}">
                                    <span class="text-danger">@error('date'){{$message}}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Amount</label>

                                    <input type="text" name="amount" value="{{$transaction->payment_amount}}" class="form-control">
                                    <span class="text-danger">@error('amount'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Status</label>
                                    <select class="form-control select2" name="status">
                                        <option value="">Please Select</option>

                                        <option value="1"  @if($transaction->status==1) selected
                                            @endif>Paid</option>

                                        <option value="0"  @if($transaction->status==0) selected
                                            @endif>Failed</option>
                                    </select>

                                    <span class="text-danger">@error('status'){{$message}}@enderror</span>
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
