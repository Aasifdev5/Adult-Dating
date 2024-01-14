@extends('admin.Master')
@section('title')
Edit User
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
               <h4 class="text-center">Edit User</h4>

               <form class="theme-form" action="{{url('admin/update_user')}}" method="post" enctype="multipart/form-data">
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
                  <input type="hidden" name="user_id" value="{{$userData->id}}">
                  <div class="row g-1">
                     <div class="col-md-12">
                        <div class="mb-2">
                          
                           <div class="personal-image">
                              <label class="label">
                                 <input type="file" name="profile_photo" id="profilePhotoInput" onchange="previewImage(this)" />
                                 <figure class="personal-figure">
                                    @if(!empty($userData->profile_photo))
                                    <img src="{{asset('profile_photo/')}}<?php echo '/' . $userData->profile_photo; ?>" class="personal-avatar" alt="avatar" id="profileImagePreview">
                                    @else
                                    <img src="images/profile photo.png" class="personal-avatar" alt="avatar" id="profileImagePreview">
                                    @endif

                                    
                                 </figure>
                              </label>
                              <p>PNG, JPG, JPEG</p>
                           </div>
                           <!-- ... (rest of your form code) ... -->


                           <script>
                              function previewImage(input) {
                                 var preview = document.getElementById('profileImagePreview');
                                 var file = input.files[0];
                                 var reader = new FileReader();

                                 reader.onloadend = function() {
                                    preview.src = reader.result;
                                 }

                                 if (file) {
                                    reader.readAsDataURL(file);
                                 } else {
                                    preview.src = "images/profile photo.png"; // Default image when no file selected
                                 }
                              }
                           </script>
                           <span class="text-danger">@error('profile_photo'){{$message}}@enderror</span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label class="col-form-label">Full Name</label>
                           <input class="form-control" type="text" name="name" value="{{$userData->name}}" placeholder="John">
                           <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label class="col-form-label">Country </label>
                           <input class="form-control" type="text" name="country" value="{{$userData->country}}" placeholder="India">
                           <span class="text-danger">@error ('country'){{$message}}@enderror</span>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="col-form-label">Email</label>
                     <input class="form-control" type="email" name="email" value="{{$userData->email}}" placeholder="John Deo">
                     <span class="text-danger">@error ('email'){{$message}}@enderror</span>

                  </div>
                  <div class="col-lg-12">
                        <label class="form-label">Email Address </label>
                        <div class="input-group">
                            <input type="email" name="email" class="form-control form-control-lg"
                                value="{{ $userData->email }}" required>
                            <button class="btn btn-dark" type="button" data-bs-toggle="modal"
                                data-bs-target="#sendMailModal"><i data-feather="mail"></i> Send Email</button>
                        </div>
                    </div>
                  <div class="mb-3">
                    
                     <label class="col-form-label">Status</label>
                           <select class="form-control select2" name="status">
                              <option value="">Please Select</option>
                              <option value="1" @if($userData->status=="1") selected @endif>Yes</option>
                              <option value="0" @if($userData->status=="0") selected @endif>No</option>

                           </select>
                           <span class="text-danger">@error('status'){{$message}}@enderror</span>

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
<div class="modal fade" id="sendMailModal" tabindex="-1" aria-labelledby="sendMailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMailModalLabel">Send Mail to {{ $userData->email }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/sendMail', $userData->id)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Subject</label>
                                    <input type="subject" name="subject" class="form-control form-control-lg" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Reply to </label>
                                    <input type="email" name="reply_to" class="form-control form-control-lg"
                                        value="{{$user_session->email}}" required>
                                </div>
                            </div>
                        </div>
                        <textarea name="message" rows="10" class="ckeditor"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-lg">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection