@extends('master')
@section('title')
Post your ad
@endsection
@section('content')

<main>
    <hr class="my-2">
    <div class="text-center">
        <h1 class="main-title home pb-3">Publish for free in just a few steps!</h1>
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
                <li class="personal complete">
                    <strong>Ad info</strong>
                </li>
                <li class="photo active">
                    <strong>Your photos</strong>
                </li>
                <li class="promote ">
                    <strong>Visibility</strong>
                </li>
                <li class="confirm ">
                    <strong>Finish</strong>
                </li>
            </ul>
            <hr class="my-2">
            <div class="previous small bold">
                <a href="#">
                    <i aria-hidden="true" class="fa fa-pencil-square-o pr-1"></i> Edit your Ad </a>
            </div>
            <div class="panelar py-2 px-2 overflow-hidden">
                <div class="card-body pb-0">
                    <h5 class="small">Title: <span>&nbsp; <strong>{{session()->get('title')}}</strong>
                        </span>
                    </h5>
                    <h5 class="small">Text: <span>&nbsp; <strong>{{session()->get('description')}}</strong>
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
                            <strong>Your photos</strong>
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
                                                <span class="txtnomobile">Drag the picture here or</span> click to select them
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
                    <button type="submit" class="btn btn-primary waves-effect btn-block"> Go on </button>
                </div>
            </div>
        </div>
    </form>
    <div class="container mt-5">
        <div class="card">
            <div class="pt-4 card-body shadow-sm rounded text-center text-md-left">
                <div class="pb-1">
                    <span class="pr-2 pl-2">
                        <svg width="25px" height="26px" viewBox="0 0 26 27" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="noun-customer-service-6223576" fill="#000000" fill-rule="nonzero">
                                    <g id="Group">
                                        <path d="M14.5,26.7500067 C15.2509067,26.7495557 15.9520691,26.37443 16.36914,25.75 L18.7915,25.75 C21.02156,25.7606403 22.9550019,24.2095693 23.42822,22.03027 L24.73193,16.1626 C24.7388806,16.1102138 24.7398636,16.0572079 24.73486,16.0046 C26.1094834,11.4030533 24.6681544,6.42271392 21.0484211,3.26655287 C17.4286878,0.110391814 12.2984552,-0.639223287 7.92699701,1.34928744 C3.55553882,3.33779816 0.749466559,7.69751926 0.749967999,12.5 C0.744778444,14.7703438 1.37864467,16.9963228 2.5791,18.92334 L2.59473,18.95068 L2.59424,18.95068 C2.60624,18.97095 2.62085,18.98853 2.63281,19.00868 C2.73559771,19.216043 2.86440275,19.4094555 3.01611,19.58424 C3.03174,19.60572 3.04468,19.62965 3.06055,19.65089 C3.08506883,19.6822594 3.1114849,19.7120986 3.13965,19.74024 L3.15283,19.74903 L5.2627,21.85889 C6.33717124,22.9311591 8.07689876,22.9311591 9.15137,21.85889 L9.85889,21.15137 C10.931148,20.0768942 10.931148,18.3371758 9.85889,17.2627 L7.7373,15.14111 C6.6628242,14.068852 4.9231058,14.068852 3.84863,15.14111 L3.14111,15.84863 C3.05742946,15.9380162 2.97993982,16.0330031 2.90918,16.13293 C1.4553678,12.1027762 2.53613036,7.59408694 5.65907447,4.66101181 C8.78201858,1.72793667 13.3495547,0.931732928 17.2807227,2.63514936 C21.2118908,4.33856579 23.7544438,8.21564592 23.75,12.5 C23.7432167,13.7400571 23.5201459,14.969424 23.09082,16.13281 C23.0200287,16.032945 22.9425406,15.9380001 22.85889,15.84863 L22.15137,15.14111 C21.0768942,14.068852 19.3371758,14.068852 18.2627,15.14111 L16.14111,17.2627 C15.068852,18.3371758 15.068852,20.0768942 16.14111,21.15137 L16.84863,21.85889 C17.9231012,22.9311591 19.6628288,22.9311591 20.7373,21.85889 L22.271,20.3252 L21.96436,21.70508 C21.6404759,23.1962456 20.3174161,24.2574589 18.7915,24.25 L16.72461,24.25 C16.5872499,23.050673 15.5259201,22.1747763 14.3223134,22.2674274 C13.1187068,22.3600785 12.2039358,23.3880912 12.2517497,24.5943113 C12.2995636,25.8005315 13.2928361,26.7529105 14.5,26.7500067 Z M4.20166,16.90918 L4.90918,16.20166 C5.39775135,15.7146865 6.18818865,15.7146865 6.67676,16.20166 L8.79834,18.32324 C9.2856378,18.8116773 9.2856378,19.6023827 8.79834,20.09082 L8.09082,20.79834 C7.60238271,21.2856378 6.81167729,21.2856378 6.32324,20.79834 L4.22754,18.70251 C4.12060667,18.55713 4.01969333,18.40601 3.9248,18.24915 C3.74269295,17.7871546 3.85136941,17.2611732 4.20166,16.90918 Z M19.67676,20.79834 C19.1883227,21.2856378 18.3976173,21.2856378 17.90918,20.79834 L17.20166,20.09082 C16.7143622,19.6023827 16.7143622,18.8116773 17.20166,18.32324 L19.32324,16.20166 C19.8118114,15.7146865 20.6022486,15.7146865 21.09082,16.20166 L21.79834,16.90918 C22.1487439,17.2612108 22.257429,17.7873281 22.0752,18.24939 C21.9812,18.40439 21.88257,18.55469 21.77686,18.69839 L19.67676,20.79834 Z M14.5,23.75 C14.9142136,23.75 15.25,24.0857864 15.25,24.5 C15.25,24.9142136 14.9142136,25.25 14.5,25.25 C14.0857864,25.25 13.75,24.9142136 13.75,24.5 C13.7504574,24.0859761 14.0859761,23.7504574 14.5,23.75 L14.5,23.75 Z" id="Shape"></path>
                                        <circle id="Oval" cx="13" cy="11" r="1.25"></circle>
                                        <circle id="Oval" cx="17.5" cy="11" r="1.25"></circle>
                                        <circle id="Oval" cx="8.5" cy="11" r="1.25"></circle>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>
                    <span>
                        <b>Need help?</b>
                    </span>
                </div>
                <div class="pl-md-4 ml-md-4 small"> Contact us through one of our channels from <b>Monday</b> to <b>Friday</b> from 2pm to 9pm. </div>
                <div class="pt-4 ml-md-4 pb-0 pl-md-4 pb-2">
                    <h6 class="d-md-inline d-sm-block p-2">
                        <a href="https://wa.me/" target="_blank">
                            <i class="fab fa-whatsapp mr-2"></i> WhatsApp </a>
                    </h6>
                    <h6 class="d-md-inline d-sm-block p-2">
                        <a href="https://t.me/" target="_blank">
                            <i class="fab fa-telegram-plane mr-2"></i> Telegram </a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
