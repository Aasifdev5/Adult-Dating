@extends('master')
@section('title')
Post your ad
@endsection
@section('content')

<main>
    <hr class="my-2">
    <div class="text-center">
        <h1 class="main-title home pb-3">¡Publica gratis en solo unos pasos!</h1>
    </div>
    <hr class="my-2">
    <form method="post" action="{{url('post-insert-images')}}" enctype="multipart/form-data" autocomplete="off">
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
            <ul class="progressbar">
            <li class="personal ">
                        <strong>Información del anuncio</strong>
                    </li>
                    <li class="photo active">
                        <strong>Tus fotos</strong>
                    </li>
                    <li class="promote ">
                        <strong>Visibilidad</strong>
                    </li>
                    <li class="confirm ">
                        <strong>Finalizar</strong>
                    </li>
            </ul>
            <hr class="my-2">
            <div class="previous small bold">
                <a href="#">
                    <i aria-hidden="true" class="fa fa-pencil-square-o pr-1"></i> Edita tu anuncio </a>
            </div>
            <div class="panelar py-2 px-2 overflow-hidden">
                <div class="card-body pb-0">
                    <h5 class="small">Título: <span>&nbsp; <strong>{{session()->get('title')}}</strong>
                        </span>
                    </h5>
                    <h5 class="small">Texto: <span>&nbsp; <strong>{{session()->get('description')}}</strong>
                        </span>
                    </h5>
                    <h5 class="detailtag small text-uppercase">
                        <b> {{session()->get('age')}} years </b> | {{session()->get('category')}} | <i aria-hidden="true" class="fa fa-map-marker ml-2"></i>
                        <b>
                            <span translate="no" class="notranslate">{{session()->get('city')}}</span>
                        </b>
                    </h5>
                </div>
            </div>
            <hr class="my-2">
            <div class="form-card">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-4 text-capitalize">
                            <strong>Tus fotos</strong>
                        </h5>
                    </div>
                </div>
                <div class="upload-image pointer-events:auto;">
                    <!---->
                    <div class="panelar py-4 ">
                        <div class="panel-heading" style="">
                            <!---->
                        </div>
                        <div class="card h-100 upload-spinner progress" style="display: none;">
                            <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar" style="width: 100%;">100% </div>
                        </div>
                        <style>
                            /* Add your styles here */
                            .image-preview {
                                position: relative;
                                margin: 5px;
                            }

                            .image-preview img {
                                max-width: 330px;
                                max-height: 300px;
                            }

                            .remove-image {
                                position: absolute;
                                top: 5px;
                                right: 5px;
                                background-color: #fff;
                                border: 1px solid #ccc;
                                cursor: pointer;
                            }
                        </style>
                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
                        <div class="row sortable-list px-4">
                            <div class="mb-3 insert-ad col-12" style="height: auto;">
                                <div class="card h-100 upload-drop-zone boxenable">
                                    <label class="uploadphoto w-100">
                                        <div class="textdrop">
                                            <p class="align-middle txt-add-image" style="text-transform: uppercase;"> You can upload up to <span class="counter">10</span> pictures </p>
                                            <i aria-hidden="true" class="fa fa-camera fa-4x align-middle mb-2"></i>
                                            <p class="align-middle txt-add-image">
                                                <span class="txtnomobile">Arrastra la imagen aquí o</span> Haga clic para seleccionarlos
                                            </p>
                                            <input id="upload" name="ads_photos[]" accept="image/gif, image/jpeg, image/png" type="file" multiple="multiple" class="upload">
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div id="image-preview-container" class="col-sm-4"></div>
                            </div>

                        </div>

                        <!-- Bootstrap Modal for Image Preview -->
                        <div class="modal" id="imagePreviewModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Image Preview</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="imagePreviewCarousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <!-- Image previews will be dynamically added here -->
                                            </div>
                                            <a class="carousel-control-prev" href="#imagePreviewCarousel" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#imagePreviewCarousel" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Function to handle file selection and preview
                                $("#upload").change(function() {
                                    var files = $(this)[0].files;
                                    if (files.length > 0) {
                                        $("#image-preview-container").empty(); // Clear previous previews

                                        for (var i = 0; i < files.length; i++) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                var imagePreview = '<div class="image-preview"><img src="' + e.target.result + '" alt="Image"><button class="remove-image">Remove</button></div>';
                                                $("#image-preview-container").append(imagePreview);
                                                updateCounter();
                                            };
                                            reader.readAsDataURL(files[i]);
                                        }
                                    }
                                });

                                // Function to handle image removal
                                $("#image-preview-container").on("click", ".remove-image", function() {
                                    $(this).parent().remove();
                                    updateCounter();
                                });

                                // Function to update the image counter
                                function updateCounter() {
                                    var remaining = 10 - $("#image-preview-container .image-preview").length;
                                    $(".counter").text(remaining);
                                }

                                // Function to open the image preview modal
                                $("#image-preview-container").on("click", ".image-preview img", function() {
                                    var imageIndex = $(this).parent().index();
                                    openImagePreviewModal(imageIndex);
                                });

                                // Function to open the image preview modal
                                function openImagePreviewModal(index) {
                                    $("#imagePreviewCarousel .carousel-inner").empty();

                                    $("#image-preview-container .image-preview").each(function(i, element) {
                                        var imgSrc = $(element).find("img").attr("src");
                                        var activeClass = (i === index) ? "active" : "";
                                        var carouselItem = '<div class="carousel-item ' + activeClass + '"><img src="' + imgSrc + '" class="d-block w-100" alt="Preview"></div>';
                                        $("#imagePreviewCarousel .carousel-inner").append(carouselItem);
                                    });

                                    $("#imagePreviewModal").modal("show");
                                }
                            });
                        </script>
                        <div class="panel-heading text-center" style="">
                            <p class="small mb-3"> If you don't choose any preview photos, first photo inserted in photo gallery will be selected as default preview photo </p>
                            <div role="alert" class="alert alert-info fade show pt-1 pb-1 text-left">
                                <small>
                                    <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>Only one picture visible for <strong>free ads</strong>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div tabindex="-1" data-backdrop="static" class="modal">
                        <div role="document" class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-uppercase">We have verified the following mistakes:</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex flex-column bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <span>
                                                <div>One or more images were not saved.</div> You can upload up to 10 pictures jpeg or png. <br> Size of each picture cannot be more than 10MB.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-2">
            </div>

            <hr class="my-3">
            <div class="row stickymobile bordermobile">
                <div class="col-md-6 px-0 ml-auto">
                    <button type="submit" class="btn btn-primary waves-effect btn-block"> CONTINUAR </button>
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
