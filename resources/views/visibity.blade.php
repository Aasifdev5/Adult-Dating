@extends('master')
@section('title')
Visibility
@endsection
@section('content')
<main>
    <div data-v-e4b3c4ce="" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade" style="display: none; padding-right: 15px;">
        <div data-v-e4b3c4ce="" class="loader"></div>
    </div>
    <div>
        <form method="POST" action="{{url('post-publish')}}">


        </form>
        <div class="container">
            <hr class="my-2">
            <div class="text-center my-2">
                <h1 class="main-title home pb-3">Publish for free in just a few steps!</h1>
            </div>
            <hr class="my-2">
            <ul class="progressbar">
                <li class="personal complete">
                    <strong>Ad info</strong>
                </li>
                <li class="photo complete">
                    <strong>Your photos</strong>
                </li>
                <li class="promote active">
                    <strong>Visibility</strong>
                </li>
                <li class="confirm ">
                    <strong>Finish</strong>
                </li>
            </ul>
            <!---->
            <hr class="my-2">
            <div class="row">
                <div class="col">
                    <h5>
                        <strong>Visibility</strong>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panelar">
                        <h4>
                            <i class="icon-top-ar mr-2"></i>
                            <strong> Top ad </strong>
                        </h4>
                        <p> Put your ad <small>
                                <strong>
                                    <i>Ad ID:{{session()->get('ad_id')}} </i>
                                </strong>
                            </small> on the top whenever you want! </p>

                        <div class="badger-right">
                            <span class="badge badge-new">new</span>
                        </div>
                        <div role="alert" class="alert alert-supertop"> XXL visibility with the new <strong>SuperTop ad</strong>
                            <span class="emoji-l">🚀</span>
                            <br>

                        </div>
                        <!---->

                        <div class="row">
                            @foreach($top_ad as $index => $row)
                            <div class="col-md-6 frb frb-info">
                                <input id="availabilityCheckbox_{{ $index }}" type="checkbox" value="">
                                <label for="availabilityCheckbox_{{ $index }}">
                                    <div class="card-body">
                                        <h5 class="pricing-card-title mb-0 pacchetti">{{ $row->ad_type }}</h5>
                                        <div>
                                            <small class="text-muted info pl-4">{!! stripslashes($row->detail) !!}</small>
                                        </div>
                                        <span class="text-muted price">${{ $row->price }}</span>
                                        <div class="form-group mt-4 mb-2">
                                            <div class="mt-0 mb-2">
                                                <span class="text-muted day">Day</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="schedule" class="form-label">Schedule</label>
                                                <select class="form-control" id="schedule_{{ $index }}" name="schedule">
                                                    <option value="">Select time slot</option>
                                                    <option value="9 a.m. - 12 p.m.">9 a.m. - 12 p.m. </option>
                                                    <option value="12 p.m. - 3 p.m.">12 p.m. - 3 p.m. </option>
                                                    <option value="3 p.m. - 6 p.m.">3 p.m. - 6 p.m. </option>
                                                    <option value="6 p.m. - 8 p.m.">6 p.m. - 8 p.m. </option>
                                                    <option value="8 p.m. - 10 p.m.">8 p.m. - 10 p.m. </option>
                                                    <option value="10 p.m. - 12 a.m.">10 p.m. - 12 a.m. </option>
                                                </select>
                                                <span class="text-danger">@error('schedule') {{ $message }} @enderror</span>
                                            </div>
                                        </div>

                                        <!-- Add the Stripe payment button with an initial style of display:none -->
                                        <button id="stripeButton_{{ $index }}" class="btn btn-primary" style="display:none;">
                                            Pay with Stripe
                                        </button>

                                        <!-- Rest of the code... -->
                                    </div>
                                </label>
                            </div>
                            @endforeach

                            <!-- Add this script at the end of your HTML document -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    @foreach($top_ad as $index => $row)
                                    document.getElementById('schedule_{{ $index }}').addEventListener('change', function() {
                                        var selectedValue = this.value;
                                        var stripeButton = document.getElementById('stripeButton_{{ $index }}');
                                        stripeButton.style.display = selectedValue ? 'block' : 'none';
                                    });
                                    @endforeach
                                });
                            </script>



                        </div>

                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="sticky-top basket onlydk">
                        <div class="panelshop">
                            <h5 class="promotitle">
                                <strong>Promotions</strong>
                            </h5>
                            <div>
                                <small>No promotion selected</small>
                                <a href="{{url('finish')}}" class="btn btn-outline-primary waves-effect btn-block">Post ad for free </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col fixed-bottom mobilecontactbar stickymobile px-2">
                    <div class="stickymobile">
                        <div class="panelshop">
                            <h5 class="promotitle">
                                <strong>Promotions</strong>
                            </h5>
                            <div>
                                <small>No promotion selected</small>
                                <button type="button" class="btn btn-outline-primary waves-effect btn-block">Post ad for free </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-1">

        </div>
        <div id="visible_call_button_modal" tabindex="-1" role="dialog" data-backdrop="static" class="modal fade">
            <div role="document" class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="jumbotron card card-image-2 text-center mb-1 borderless">
                        <div class="container">
                            <h5>Phone number <br>NOT VISIBLE! </h5>
                        </div>
                    </div>
                    <div class="modal-body pb-0">
                        <div class="d-flex flex-column text-center">
                            <i class="fa fa-exclamation-triangle fa-2x"></i>
                            <p> You already have <strong>1 free ad</strong> associated with this phone number today. <br>
                                <strong>Promote</strong> your ad to make your phone number <strong>visible </strong>.
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="container">
                            <div class="row flex-column-reverse flex-md-row">
                                <div class="col-md p-2">
                                    <button data-dismiss="modal" type="button" class="btn btn-block btn-outline-primary">Publish for free <br>
                                        <span class="text-lowercase">(without number)</span>
                                    </button>
                                </div>
                                <div class="col-md p-2">
                                    <button type="button" data-dismiss="modal" class="btn btn-block btn-primary h-100">Promote ad</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="topExampleModal" tabindex="-1" role="dialog" aria-labelledby="imgTopLabel" aria-hidden="true" class="modal fade">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 id="imgTopLabel" class="modal-title w-100">
                            <i class="icon-top-ar mr-1"></i>
                        </h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <h4 class="text-center">
                            <p>Discover TOP's benefits:</p>
                        </h4>
                        <div class="lightboxpromuovitop"></div>
                        <div class="row indigo">
                            <div class="sfondotop light">
                                <ol class="list-numbered">
                                    <li> Ad among the <b>first search results</b>
                                    </li>
                                    <li>
                                        <b>More visibility</b> thanks to the preview photo
                                    </li>
                                    <li>
                                        <b>Visibility</b> in free ad detail page
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col mt-3 text-center">
                            <p> Climb top positions of ads list! TOP ad is the enhanced ad; unlike the free one, TOP automatically push your ad to the top positions of the first page. </p>
                            <p> If you want to be more visible, save time and get more contacts, promote your ad to increase its visibility with just a few clicks. </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-primary"> Close </button>
                    </div>
                </div>
            </div>
        </div>
        <div tabindex="-1" role="dialog" aria-labelledby="imgpremiumLabel" aria-hidden="true" class="modal fade">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 id="imgpremiumLabel" class="modal-title w-100">
                            <i class="icon-top-premium-ar mr-1"></i>
                        </h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <h4 class="text-center">
                            <p> Get immediate visibility! <br> Discover PREMIUM’s benefits: </p>
                        </h4>
                        <div class="lightboxpromuovipremium"></div>
                        <div class="row indigo">
                            <div class="sfondotop light">
                                <ol class="list-numbered">
                                    <li>
                                        <b>Predominant positioning</b> in the ads list
                                    </li>
                                    <li> Up to <b>3 preview images</b> in the ads list </li>
                                    <li> Highlighted <b>Phone number</b> in the ads list </li>
                                    <li>
                                        <b>Visibility</b> in free ad detail page
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col text-center mt-3">
                            <p> Premium Ad is an upgrade of the TOP, it has same: duration, number of pushes, number of days and time slots of the TOP chosen. Purchasable only with a TOP. </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-primary"> Close </button>
                    </div>
                </div>
            </div>
        </div>
        <div id="supertopExampleModal" tabindex="-1" role="dialog" aria-labelledby="imgSupertopLabel" aria-hidden="true" class="modal fade">
            <div role="document" class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 id="imgSupertopLabel" class="modal-title w-100">
                            <i class="icon-supertop gradientsupertop mr-1"></i>
                        </h5>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0 px-2">
                        <h4 class="text-center">
                            <p>Gain immediate visibility!</p>
                        </h4>
                        <div class="text-center"> Discover the advantages of the SuperTop ad: </div>
                        <div class="devicesupertop en"></div>
                        <div class="row bgsupertoplb">
                            <ul class="list-group list-group-flush list-icon">
                                <li class="list-group-item">
                                    <i aria-hidden="true" class="fa fa-star mr-2"></i>
                                    <strong>Extra visibility:</strong> an extra position at the top of all the results
                                </li>
                                <li class="list-group-item">
                                    <i aria-hidden="true" class="fa fa-arrows-alt mr-2"></i>
                                    <strong>Huge Dimensions:</strong> a much bigger ad than the Top one
                                </li>
                                <li class="list-group-item">
                                    <i aria-hidden="true" class="fa fa-camera mr-2"></i>
                                    <strong>3 Preview pictures:</strong> to look better
                                </li>
                                <li class="list-group-item">
                                    <i aria-hidden="true" class="fa fa-phone mr-2"></i>
                                    <strong>Immediate contact:</strong> visible phone number and WhatsApp in the list of ads
                                </li>
                                <li class="list-group-item">
                                    <i aria-hidden="true" class="fa fa-eye mr-2"></i>
                                    <strong>Visibility</strong> in the detail page of a free ad
                                </li>
                            </ul>
                        </div>
                        <div class="col mt-3 text-center">
                            <p> With the purchase of a SuperTop you will climb like a Top ad, but doubling your visibility (Only available with a Top ad) </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-primary">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
