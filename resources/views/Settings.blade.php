@extends('master')
@section('title')
Settings
@endsection
@section('content')
<main id="main">
  <div class="boxing">
    <div class="title">
      <h3>Account Overview</h3>
    </div>
    <div class="links">
      <li><a class="link" href="Overview"> Account </a></li>
      <li><a class="link active" href="Settings">Settings</a></li>
      <li><a class="link" href="Billing"> Billing</a></li>
      <li><a class="link" href="Statements"> Statements</a></li>
    </div>
    <div class="content">
      <form action="{{url('setting')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" class="form-control" value="{{$user_session->id}}">
        @if(Session::has('success'))
        <div class="alert alert-success" style="background-color: green;">
          <p style="color: #fff;">{{session::get('success')}}</p>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger" style="background-color: red;">
          <p style="color: #fff;">{{session::get('fail')}}</p>
        </div>
        @endif
        @csrf
        <div class="title">
          <h4 style="padding-top: 10px;"> Profile Settings</h4>
        </div>
        <div class="personal-image">
          <label class="label">
            <input type="file" name="profile_photo" id="profilePhotoInput" onchange="previewImage(this)" />
            <figure class="personal-figure">
              @if(!empty($user_session->profile_photo))
              <img src="profile_photo/{{$user_session->profile_photo}}" class="personal-avatar" alt="avatar" id="profileImagePreview">
              @else
              <img src="images/profile photo.png" class="personal-avatar" alt="avatar" id="profileImagePreview">
              @endif

              <figcaption class="personal-figcaption">
                  
                <!-- <img src="https://raw.githubusercontent.com/ThiagoLuizNunes/angular-boilerplate/master/src/assets/imgs/camera-white.png"> -->
              </figcaption>
            </figure>
          </label>
          <p>PNG, JPG, JPEG

Maximum upload file size 2MB .</p>
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
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter First Name" value="{{
                                              $user_session->name;
                }}" name="name">
          </div>
          <!-- <div class="input-box">
                <input type="value" placeholder="Enter Second Name" name="Choose_data" required>
              </div> -->
          <div class="input-box">
            <span class="details">Country</span>
            <input type="text" placeholder="Enter Your Country" value="{{$user_session->country}}" name="country">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter Your Email" value="{{
                                              $user_session->email;
                }}" name="email">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter Your Phone Number" name="mobile_number" value="{{$user_session->mobile_number}}">
          </div>

          <div class="btns">
            <button class="btn">Save Changes</button>
            <button class="btn">Discard</button>
          </div>
      </form>

    </div>
  </div>

  <hr style="margin-top: 40px;">
  <!-- sign in  -->
  <div class="sign-in">
    <h1 class="sign"> Change Password</h1>
    <a href="#" class="link"><i class='bx bxl-google'></i></a>
    <a href="#" class="link"><i class='bx bxl-facebook-circle'></i></a>
  </div>
  <!-- small form -->
  <form action="{{url('update_password')}}" method="post">
    <input type="hidden" name="user_id" class="form-control" value="{{$user_session->id}}">
    @if(Session::has('success'))
    <div class="alert alert-success" style="background-color: green;">
      <p style="color: #fff;">{{session::get('success')}}</p>
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger" style="background-color: red;">
      <p style="color: #fff;">{{session::get('fail')}}</p>
    </div>
    @endif
    @csrf
    <div class="small-form">
      <h5>Password</h5>
      <input type="text" id="input1" name="old_password" class="input-field" placeholder="Password">
      <h5>New Password</h5>
      <input type="password" id="input2" name="new_password" class="input-field" placeholder="New Password">
      <h5>Confirm New Password</h5>
      <input type="password" id="input2" name="confirm_password" class="input-field" placeholder="Confirm New Password">
      <button type="submit" id="submitButton" class="submit-button">Save Changes</button>
    </div>
  </form>
  <!-- remember me -->
  <div class="account">

    <p></p>
  </div>

  <div>
    <form  action="https://skyforecasting.net/help-center/">
    <input type="hidden" name="user_id" class="form-control" value="{{$user_session->id}}">
    @csrf
      <h2 class="sign">Deactivate Account</h2>
      <p style="font-size: 14px;">You Are Deactivating Your Account?</p>
      <label for="myCheckbox">
        <input type="checkbox" id="myCheckbox" name="check" style="margin: 20px 0;">
        You Are Deactivating Your Account?
      </label>
      <div class="btns">
        <button type="submit" class="btn">Deactivate account</button>
      </div>
    </form>

  </div>
  </div>
</main>
@endsection