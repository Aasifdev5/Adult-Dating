@extends('master')
@section('title')
Age Verification
@endsection
@section('content')

<main>

    <hr class="my-2">
    <form method="post" action="{{url('verificationSubmit')}}" enctype="multipart/form-data" autocomplete="off">
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
        <input type="hidden" name="user_id" value="{{session()->get('user_id')}}">
        <div class="container">

            <hr class="my-2">

            <div class="form-group">
                <label for="document">Government Document</label>
                <input type="file" class="form-control" name="document" accept=".jpeg, .png, .pdf" required>
                <img id="documentPreview" src="#" alt="Document Preview" style="display:none; max-width: 100%; margin-top: 10px;">
            </div>

            <div class="form-group">
                <label for="live_photo">Live Photo</label>
                <input type="file" class="form-control" name="live_photo" accept="image/*" required>
                <img id="livePhotoPreview" src="#" alt="Live Photo Preview" style="display:none; max-width: 100%; margin-top: 10px;">
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Function to update the preview image
                    function readURL(input, previewId) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $(previewId).attr('src', e.target.result).show();
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    // Triggered when the "Government Document" file input changes
                    $('input[name="document"]').change(function() {
                        readURL(this, '#documentPreview');
                    });

                    // Triggered when the "Live Photo" file input changes
                    $('input[name="live_photo"]').change(function() {
                        readURL(this, '#livePhotoPreview');
                    });
                });
            </script>




            <hr class="my-3">
            <div class="row stickymobile bordermobile">
                <div class="col-md-6 px-0 ml-auto">
                    <button type="submit" class="btn btn-primary">Submit Verification</button>

                </div>
            </div>
        </div>
    </form>
    <div class="container mt-5">
        <div class="card">

        </div>
    </div>
</main>
@endsection
