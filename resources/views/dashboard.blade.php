@extends('master')
@section('title')
Dashboard
@endsection
@section('content')
<main>
  <div class="container">
    <hr class="my-3">
    <div class="my-4 personal">
      <h6 class="text-uppercase">
        <strong>welcome</strong>
      </h6>
      <p>
        <i> {{$user_session->email}}</i>
      </p>
    </div>
    <div class="customerid pb-3">
      <small>Customer code:</small>
      <br>
      <a href="#" data-toggle="modal" data-target="#exampleModal">IN2TJ5KG</a>
    </div>
    <div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade" style="display: none;">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="exampleModalLabel" class="modal-title">Your customer code</h5>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <small>This is your customer code:</small>
            <h5>IN2TJ5KG</h5>
            <p> To avoid possible fraudulent communications, we provide you with this unique code that will allow you to know if the people who contact you are from Skokka or not. <br> If and when we contact you via whatsapp or telephone, we will communicate this code and you can verify that it is the same by comparing it with the one shown in this section. </p>
            <p>
              <b>SAME CODE → </b> we are contacting you.
            </p>
            <p>
              <b>DIFFERENT CODE → </b> scam, don't reply and report to Skokka
            </p>
            <b>This code is yours and may change for security reasons. NEVER share it with anyone.</b>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 order-md-2">
        <form method="get" action="/u/yoti/initialize_verification/">
          <input type="hidden" name="csrfmiddlewaretoken" value="AFZXi1lbCUwF6yGXyrYhm0dVjTVg8i3jl9QTV9J1ckM2pLpiNO8qOtPnV597Jl7E">
          <div class="card dashboard id-verification mb-4">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body">
                    <h5 class="card-title pb-0 mb-1">
                      <i aria-hidden="true" class="fa fa-id-card-o mr-2"></i> Verify your age!
                    </h5>
                    <div class="row small no-gutters mt-3">
                      <div class="col">
                        <a href="/yoti/tutorial/" target="_blank">
                          <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                          <b>How does it work?</b>
                        </a>
                      </div>
                      <div class="col">
                        <a href="/yoti/faq/" target="_blank">
                          <i aria-hidden="true" class="fa fa-info-circle mr-1"></i>
                          <b>Any questions?</b>
                        </a>
                      </div>
                    </div>
                    <div class="col px-0">
                      <div class="badger-right">
                        <span class="badge badge-new">new</span>
                      </div>
                      <div class="promo-id-verification mb-4 mt-4">
                        <h5>
                          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16" class="text-success bi bi-check-circle">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                          </svg>
                          <strong class="align-middle ml-1">Age verified</strong>
                        </h5>
                        <!---->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-7 order-md-0">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card dashboard mb-4">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body">
                      <h5 class="card-title skokka-text">
                        <a href="{{url('ads')}}" class="">
                          <i class="fa fa-pencil-square-o float-left mr-2"></i> Your Ads <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                        </a>
                      </h5>
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"> Active <span class="badge badge-light badge-pill">{{count($ads)}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"> Not published <span class="badge badge-light badge-pill">0</span>
                        </li>
                      </ul>
                      <!---->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card dashboard mb-4">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body">
                      <h5 class="card-title skokka-text">
                        <a href="{{url('credits')}}" class="">
                          <i class="fa fa-database float-left mr-2"></i> Credits <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                        </a>
                      </h5>
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center"> Currents <span class="badge badge-light badge-pill">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center"> Used <span class="badge badge-light badge-pill">0</span>
                        </li>
                      </ul>
                      <a data-href="{{url('credits')}}">
                        <button type="button" class="btn btn-primary"> Buy Credits </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card dashboard mb-4">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body">
                      <h5 class="card-title skokka-text">
                        <a href="{{url('product')}}" class="">
                          <i class="fa fa-line-chart float-left mr-2"></i> Products <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                        </a>
                      </h5>
                      <p>Purchase our products to be always on TOP!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="card dashboard mb-4">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body">
                      <h5 class="card-title skokka-text">
                        <a href="{{url('edit-profile')}}" class="">
                          <i class="fa fa-user-circle-o float-left mr-2"></i> Edit Profile <i aria-hidden="true" class="fa fa-angle-right float-right"></i>
                        </a>
                      </h5>
                      <p>Manage your personal info.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
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
  </div>
</main>
@endsection
