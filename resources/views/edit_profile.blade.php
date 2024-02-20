@extends('master')
@section('title')
Age Verification
@endsection
@section('content')

<main>

    <hr class="my-2">


    <div class="container">
        <form action="{{ url('update_profile') }}" method="post" enctype="multipart/form-data">
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
            <input type="hidden" name="user_id" value="{{$user_session->id}}">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $user_session->name) }}">
            </div>
<div class="form-group">
                <label for="email">Número de teléfono móvil</label>
                <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $user_session->mobile_number) }}">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user_session->email) }}">
            </div>

            <div class="col-md-12">
                <div class="mb-2">

                    <div class="personal-image">
                        <label class="label">
                            <input type="file" name="profile_photo" id="profilePhotoInput" onchange="previewImage(this)" />
                            <figure class="personal-figure">
                                @if(!empty($user_session->profile_photo))
                                <img src="{{asset('profile_photo/')}}<?php echo '/' . $user_session->profile_photo; ?>" class="personal-avatar rounded-circle" width="100px" height="100px" alt="avatar" id="profileImagePreview">
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

            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Actualización del perfil</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="card">

        </div>
    </div>
</main>
@endsection
