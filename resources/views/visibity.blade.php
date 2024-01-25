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
                <h1 class="main-title home pb-3">¡Publica gratis en solo unos pasos!</h1>
            </div>
            <hr class="my-2">
            <ul class="progressbar">
            <li class="personal ">
                        <strong>Información del anuncio</strong>
                    </li>
                    <li class="photo ">
                        <strong>Tus fotos</strong>
                    </li>
                    <li class="promote active">
                        <strong>Visibilidad</strong>
                    </li>
                    <li class="confirm ">
                        <strong>Finalizar</strong>
                    </li>
            </ul>
            <!---->
            <hr class="my-2">
            <div class="row">
                <div class="col">
                    <h5>
                        <strong>Visibilidad</strong>
                    </h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panelar">
                        <h4>
                            <i class="icon-top-ar mr-2"></i>
                            <strong> Para rellenar </strong>
                        </h4>
                        <p> Pon tu anuncio <small>
                                <strong>
                                    <i>Ad ID:{{session()->get('ad_id')}} </i>
                                </strong>
                            </small> on the top whenever you want! </p>

                        <div class="badger-right">
                            <span class="badge badge-Nuevo">Nuevo</span>
                        </div>
                        <div role="alert" class="alert alert-supertop"> XXL visibility with the Nuevo <strong>Anuncio supertop</strong>
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
                                <strong>Promociones</strong>
                            </h5>
                            <div>
                                <small>Ninguna promoción seleccionada</small>
                                <a href="{{url('finish')}}" class="btn btn-outline-primary waves-effect btn-block">Publicar anuncio gratis </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col fixed-bottom mobilecontactbar stickymobile px-2">
                    <div class="stickymobile">
                        <div class="panelshop">
                            <h5 class="promotitle">
                                <strong>Promociones</strong>
                            </h5>
                            <div>
                                <small>Ninguna promoción seleccionada</small>
                                <a type="{{url('finish')}}" class="btn btn-outline-primary waves-effect btn-block">Publicar anuncio gratis </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-1">

        </div>



    </div>
</main>
@endsection
