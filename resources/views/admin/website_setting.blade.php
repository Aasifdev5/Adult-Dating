@extends('admin.Master')

@section('title')

General Setting

@endsection


@section('content')
<!-- page-wrapper Start-->
<div class="page-body">
   <div class="container-fluid">
      <!-- page-wrapper Start-->
      <div class="page-wrapper">
         <div class="container-fluid">
            <!-- sign up page start-->
            <div class="auth-bg-video">
               <video id="bgvid" poster="{{asset('admin/images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
                  <source src="{{asset('admin/video/auth-bg.mp4')}}" type="video/mp4">
               </video>
               <div class="authentication-box" style="width: 75%;margin-left:250px;">
                  <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                  <div class="card mt-4 p-4">
                     <h4 class="text-center">General Setting</h4>

                     <form method="post" action="update_general_settings" enctype="multipart/form-data">
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
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label class="form-label" for="">Site Name:</label>
                              <input type="text" class="form-control" name="site_name" value="{{$settings->site_name}}">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="">Default TimeZone:</label>
                              <select name="time_zone" value="" class="form-control select2">
                                 @foreach($time as $row)
                                 <option value="{{str_replace(array('(','+',')','0','U','5','4','3','2','1','9','T',':','C','-','6','7','8'),"",$row)}}">{{$row}}</option>
                                 @endforeach
                              </select>
                           </div>

                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Site Logo:</label>
                              <input type="file" class="form-control" onchange="previewImage(this)" name="site_logo">
                              <img src="{{asset('site_logo/')}}<?php echo '/' . $settings->site_logo; ?>" id="logoImagePreview" width="100" height="100">
                           </div>
                           <script>
                              function previewImage(input) {
                                 var preview = document.getElementById('logoImagePreview');
                                 var file = input.files[0];
                                 var reader = new FileReader();

                                 reader.onloadend = function() {
                                    preview.src = reader.result;
                                 };

                                 if (file) {
                                    reader.readAsDataURL(file);
                                 } else {
                                    preview.src = "{{ asset('images/profile photo.png') }}"; // Default image when no file selected
                                 }
                              }
                           </script>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Default Language:</label>
                              <select name="default_language" value="" class="form-control select2">
                                 <option value="English">English</option>
                                 <option value="">Hindi</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Site Favicon:</label>
                              <input type="file" class="form-control" onchange="FpreviewImage(this)" name="site_favicon">
                              <img src="{{asset('site_favicon/')}}<?php echo '/' . $settings->site_favicon; ?>" id="faviconImagePreview" width="100" height="100">
                           </div>
                           <script>
                              function FpreviewImage(input) {
                                 var preview = document.getElementById('faviconImagePreview');
                                 var file = input.files[0];
                                 var reader = new FileReader();

                                 reader.onloadend = function() {
                                    preview.src = reader.result;
                                 };

                                 if (file) {
                                    reader.readAsDataURL(file);
                                 } else {
                                    preview.src = "{{ asset('images/profile photo.png') }}"; // Default image when no file selected
                                 }
                              }
                           </script>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Site Styling:</label>
                              <select name="styling" value="" class="form-control select2">
                                 <option value="1">Styling 1</option>
                                 <option value="2">Styling 2</option>
                                 <option value="3">Styling 3</option>
                                 <option value="4">Styling 4</option>
                                 <option value="5">Styling 5</option>
                                 <option value="6">Styling 6</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Email:</label>
                              <input type="text" class="form-control" placeholder="" value="{{$settings->site_email}}" name="site_email">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Currency Code:</label>
                              <select name="currency_code" value="" class="form-control select2">
                                 @foreach($currency as $row)
                                 <option value="{{$row}}">{{$row}}</option>
                                 @endforeach
                              </select>
                           </div>


                           <div class="form-group col-md-6">
                              <label class="form-label" for="email">Description</label>
                              <textarea name="site_description" class="form-control">{{$settings->site_description}}</textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="email">Site Keyword</label>
                              <textarea name="site_keywords" value="{{$settings->site_keywords}}" class="form-control"></textarea>
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="email">Footer Icon</label>
                              <input type="file" name="site_icon" class="form-control">

                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Facebook Url:</label>
                              <input type="text" class="form-control" value="{{$settings->footer_fb_link}}" name="footer_fb_link">
                           </div>

                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Twiter Url:</label>
                              <input type="text" class="form-control" value="{{$settings->footer_twitter_link}}" name="footer_twitter_link">
                           </div>
                           <div class="form-group col-md-6">
                              <label class="form-label" for="fname">Instagram Url:</label>
                              <input type="text" class="form-control" value="{{$settings->footer_instagram_link}}" name="footer_instagram_link">
                           </div>


                           <div class="form-group col-md-6">
                              <label class="form-label" for="email">Copyright Text</label>
                              <textarea name="site_copyright" class="form-control">{{$settings->site_copyright}}</textarea>
                           </div>

                        </div>
                        <hr>

                        <button type="submit" class="btn btn-primary">Save Setting</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>

@endsection
