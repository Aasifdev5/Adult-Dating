@extends('admin.Master')
@section('title')
Add User
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
               <h4 class="text-center">Add User</h4>

               <form class="theme-form" action="{{url('admin/save_user')}}" method="post" enctype="multipart/form-data">
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
                        <div class="mb-2">
                          
                           <div class="personal-image">
                              <label class="label">
                                 <input type="file" name="profile_photo" id="profilePhotoInput" onchange="previewImage(this)" />
                                 <figure class="personal-figure">
                                   
                                    <img src="images/profile photo.png" class="personal-avatar" alt="avatar" id="profileImagePreview">
                                   
                                    
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
                           <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="John">
                           <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="mb-3">
                           <label class="col-form-label">Country </label>
                           <input class="form-control" type="text" name="country" value="{{old('country')}}" placeholder="India">
                           <span class="text-danger">@error ('country'){{$message}}@enderror</span>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <label class="col-form-label">Email</label>
                     <input class="form-control" type="email" name="email" value="{{old('email')}}" placeholder="John Deo">
                     <span class="text-danger">@error ('email'){{$message}}@enderror</span>

                  </div>
                 <div class="mb-3">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" type="password" name="password" value="{{old('password')}}" >
                                <span class="text-danger">@error ('password'){{$message}}@enderror</span>
                                
                            </div>
                  <div class="mb-3">
                    
                     <label class="col-form-label">Status</label>
                           <select class="form-control select2" name="status">
                              <option value="">Please Select</option>
                              <option value="1">Yes</option>
                              <option value="0">No</option>

                           </select>
                           <span class="text-danger">@error('status'){{$message}}@enderror</span>

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