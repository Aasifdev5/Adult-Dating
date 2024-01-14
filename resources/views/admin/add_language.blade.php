@extends("admin.Master")
@section('title')
Add Language
@endsection
@section("content")


<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">

                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                           </svg></a></li>
                     <li class="breadcrumb-item">Languages</li>


                  </ol>
               </div>
            </div>

         </div>
      </div>
   </div>
   <!-- Container-fluid starts-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-header">
                  <h5> {{ __('Add') }} {{ __('Language') }} </h5>


               </div>
               <div class="card-body">

                  <div class="card-box">


                     <div class="content-page">
                        <div class="content">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="card-box">

                                       <script src="{{ asset('js/core/libs.min.js')}}"></script>
                                       <div class="row">
                                          <center>
                                             <div class="col-xl-12 col-lg-12">
                                                <div class="card">

                                                   <div class="card-body">
                                                      <div class="new-user-info">
                                                         <form action="{{route('save_language')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                            @if(Session::has('success'))
                                                            <div class="alert alert-success">{{Session::get('success')}}
                                                            </div>
                                                            @endif
                                                            @if(Session::has('fail'))
                                                            <div class="alert alert-danger">{{Session::get('fail')}}
                                                            </div>
                                                            @endif
                                                            @csrf
                                                            <div class="form-group row">
                                                               <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Language Name:</label>
                                                               <div class="col-sm-9">
                                                                  <input type="text" class="form-control" id="language_name" name="language_name" value="{{old('language_name')}}" placeholder="Enter Language Name">
                                                                  <span class="text-danger">@error ('language_name')
                                                                     {{$message}} @enderror</span>
                                                               </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-group row">
                                                               <label class="control-label col-sm-3 align-self-center mb-0" for="email1">Language Code:</label>
                                                               <div class="col-sm-9">
                                                                  <input type="text" class="form-control" id="language_code" name="language_code" value="{{old('language_code')}}" placeholder="Enter Language Code">
                                                                  <span class="text-danger">@error ('language_code')
                                                                     {{$message}} @enderror</span>
                                                               </div>
                                                            </div>
                                                            <br>
                                                           
                                                            <div class="col-md-12">
                                                               <div class="mb-3">
                                                                  <label class="col-form-label">Language Photo</label>
                                                                  <div class="personal-image">
                                                                     <label class="label">
                                                                        <input type="file" name="language_photo" id="profilePhotoInput" onchange="previewImage(this)" />
                                                                        <figure class="personal-figure">
                                                                           
                                                                          
                                                                           <img src="{{ asset('images/profile photo.png') }}" class="personal-avatar" alt="avatar" id="profileImagePreview">
                                                                           
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
                                                                        };

                                                                        if (file) {
                                                                           reader.readAsDataURL(file);
                                                                        } else {
                                                                           preview.src = "{{ asset('images/profile photo.png') }}"; // Default image when no file selected
                                                                        }
                                                                     }
                                                                  </script>
                                                                  <span class="text-danger">@error('product_photo'){{ $message }}@enderror</span>
                                                               </div>
                                                            </div>
                                                            <div class="form-group">
                                                               <div class="col-sm-12">
                                                                  <button type="submit" class="btn btn-primary btn-block pull-right">{{ __('Save') }}</button>
                                                               </div>

                                                            </div>
                                                         </form>

                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </center>

                                       </div>




                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>


               </div>
            </div>
         </div>
      </div>
      <!-- DOM / jQuery  Ends-->


   </div>
</div>
<!-- Container-fluid Ends-->
<!-- Container-fluid Ends-->
</div>


@endsection