@extends('admin.Master')
@section('title')
SMTP Setting
@endsection
@section('content')
<!-- page-wrapper Start-->
<div class="page-body">
   <div class="container-fluid">
      <!-- sign up page start-->

      <div class="authentication-box">
         <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
         <div class="card mt-4 p-4">
            <h4 class="text-center">SMTP Setting</h4>

            <form class="theme-form" action="update_smtp_setting" method="post" enctype="multipart/form-data">
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
               <input type="hidden" name="id" value="{{$user_session->id}}">
               <div class="row g-1">
                  <div class="col-md-12">
                     <div class="mb-2">
                        <label class="col-form-label"> Mail Host</label>
                        <input type="text" class="form-control" name="smtp_host" value="{{$settings->smtp_host}}" id="smtp_host">
                        <span class="text-danger">@error('smtp_host'){{$message}}@enderror</span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="col-form-label">Mail Port</label>
                        <input class="form-control" type="text" name="smtp_port" value="{{$settings->smtp_port}}">
                        <span class="text-danger">@error('smtp_port'){{$message}}@enderror</span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="col-form-label">Mail Username</label>
                        <input class="form-control" type="email" name="smtp_email" value="{{$settings->smtp_email}}">
                        <span class="text-danger">@error ('smtp_email'){{$message}}@enderror</span>
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <label class="col-form-label">Mail Password</label>
                  <input class="form-control" type="text" name="smtp_password" value="{{$settings->smtp_password}}">
                  <span class="text-danger">@error ('smtp_password'){{$message}}@enderror</span>

               </div>
               <div class="mb-3">
                  <label class="col-form-label">Mail Encryption</label>
                  <input class="form-control" type="text" name="smtp_encryption" value="{{$settings->smtp_encryption}}">
                  <span class="text-danger">@error ('smtp_encryption'){{$message}}@enderror</span>

               </div>
               <div class="mb-3">
                  <label class="col-form-label">Mail From Address</label>
                  <input class="form-control" type="email" name="smtp_email" value="{{$settings->smtp_email}}">
                  <span class="text-danger">@error ('smtp_email'){{$message}}@enderror</span>

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

   <!-- sign up page ends-->
</div>
</div>
<!-- page-wrapper Ends-->
@endsection