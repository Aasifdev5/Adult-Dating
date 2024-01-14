@extends('master')
@section('title')
Purchase Deep Project
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
                  <i>(Ad ID: in741dqjp)</i>
                </strong>
              </small> on the top whenever you want! </p>
            <p>
              <a data-toggle="modal" data-target="#topExampleModal">
                <i aria-hidden="true" class="fa fa-eye pr-2"></i> Show example </a>
            </p>
            <div class="badger-right">
              <span class="badge badge-new">new</span>
            </div>
            <div role="alert" class="alert alert-supertop"> XXL visibility with the new <strong>SuperTop ad</strong>
              <span class="emoji-l">🚀</span>
              <br>
              <a data-toggle="modal" data-target="#supertopExampleModal">Learn more!</a>
            </div>
            <!---->
            <div class="row" style="display: none;">
              <div class="frb frb-info col-md mb-4">
                <input type="checkbox" id="coupon" name="coupon" value="">
                <label for="coupon-1" class="h-100 mb-0">
                  <div class="card-body h-100 ">
                    <div class="pl-4 ">
                      <h5 class="font-semibold text-xl mt-1"> Use Coupon </h5>
                    </div>
                    <div style="height: calc(100% - 2.5rem);">
                      <div class="coupon rounded-lg flex-column h-100 coupon-border p-3" style="display: none;">
                        <div class="flex-grow">
                          <div class="coupon-header d-flex flex-column xs-flex-row ">
                            <!---->
                            <div class="align-self-center xs-align-self-start coupon-icon coupon-up"></div>
                            <div class="m-2"></div>
                            <div class="mx-auto xs-mx-0 my-auto ">
                              <div class="coupon-title text-xs sm-text-sm md-text-base pb-1">
                                <h5 class="text-gray-700 font-normal d-inline text-size-inherit">Coupon</h5>
                                <span class="font-bold "></span>
                              </div>
                              <div class="coupon-subtitle text-blue-600 text-lg sm-text-xl lg-text-2xl leading-4">
                                <h6 class="font-bold m-0 d-inline text-size-inherit"></h6>
                                <!---->
                              </div>
                              <!---->
                            </div>
                          </div>
                        </div>
                        <div class="mb-2"></div>
                        <hr class="m-0">
                        <!---->
                        <div class="mt-3 coupon-footer d-flex justify-content-between align-items-center">
                          <!---->
                          <!---->
                          <div class="mx-2"></div>
                          <div class="  d-flex flex-column align-self-center">
                            <small class="text-muted">expires on:</small>
                            <small></small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 frb frb-info">
                <!---->
                <input id="productCodeCheckboxButton_a97636417756dad8cd2ca9873de6129b48e6812a" type="checkbox" value="a97636417756dad8cd2ca9873de6129b48e6812a">
                <label>
                  <div class="card-body">
                    <h5 class="pricing-card-title mb-0 pacchetti"> 5x <span>1</span>
                    </h5>
                    <div>
                      <small class="text-muted info pl-4"> 5 top-ups a day for 1 day </small>
                    </div>
                    <span class="text-muted price"> Rs <span>141.00</span> (3 credits) </span>
                    <div class="form-group mt-4 mb-2">
                      <div class="mt-0 mb-2">
                        <span class="text-muted day">Day</span>
                        <!---->
                      </div>
                      <select disabled="disabled" tabindex="-1" data-toggle="popover" data-trigger="manual" data-content="Please, select time slot" data-placement="bottom" class="browser-default custom-select">
                        <option value="">select time slot</option>
                        <option value="64772587be2aa890b4315056">9 a.m. - 12 p.m. </option>
                        <option value="6477258e6a1e314c35725d4c">12 p.m. - 3 p.m. </option>
                        <option value="64772591883eb68ae281952c">3 p.m. - 6 p.m. </option>
                        <option value="647725941870e0bd375c7681">6 p.m. - 8 p.m. </option>
                        <option value="64772596228a0853c0c2532f">8 p.m. - 10 p.m. </option>
                        <option value="647725981870e0bd375c7683">10 p.m. - 12 a.m. </option>
                      </select>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <h5>Add Premium</h5>
                          <a>
                            <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                        </li>
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <i class="icon-top-premium-ar"></i>
                          <br>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <h4 class="mb-1">Add SuperTop</h4>
                          <p class="mb-0 pb-0">
                            <small>
                              <strong>Extra visibility in the list of ads</strong>
                            </small>
                          </p>
                        </li>
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <div class="d-flex justify-content-between mb-2">
                            <i class="icon-supertop gradientsupertop"></i>
                            <!---->
                          </div>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                          <div class="mt-3">
                            <a>
                              <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>
              </div>
              <div class="col-md-6 frb frb-info">
                <!---->
                <input id="productCodeCheckboxButton_cc0493e0647d8bfd7ffb376dc0e7d65c50ac16ae" type="checkbox" value="cc0493e0647d8bfd7ffb376dc0e7d65c50ac16ae">
                <label>
                  <div class="card-body">
                    <h5 class="pricing-card-title mb-0 pacchetti"> 5x <span>3</span>
                    </h5>
                    <div>
                      <small class="text-muted info pl-4"> 5 top-ups a day for 3 days </small>
                    </div>
                    <span class="text-muted price"> Rs <span>376.00</span> (8 credits) </span>
                    <div class="form-group mt-4 mb-2">
                      <div class="mt-0 mb-2">
                        <span class="text-muted day">Day</span>
                        <!---->
                      </div>
                      <select disabled="disabled" tabindex="-1" data-toggle="popover" data-trigger="manual" data-content="Please, select time slot" data-placement="bottom" class="browser-default custom-select">
                        <option value="">select time slot</option>
                        <option value="64772770cb76fe950905f978">9 a.m. - 12 p.m. </option>
                        <option value="6477276a3c582842a0817af0">12 p.m. - 3 p.m. </option>
                        <option value="64772761883eb68ae281968e">3 p.m. - 6 p.m. </option>
                        <option value="6477270235d75f1cf8da06cb">6 p.m. - 8 p.m. </option>
                        <option value="647726db205aaadef597ba5e">8 p.m. - 10 p.m. </option>
                        <option value="647726891870e0bd375c7748">10 p.m. - 12 a.m. </option>
                      </select>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <h5>Add Premium</h5>
                          <a>
                            <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                        </li>
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <i class="icon-top-premium-ar"></i>
                          <br>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <h4 class="mb-1">Add SuperTop</h4>
                          <p class="mb-0 pb-0">
                            <small>
                              <strong>Extra visibility in the list of ads</strong>
                            </small>
                          </p>
                        </li>
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <div class="d-flex justify-content-between mb-2">
                            <i class="icon-supertop gradientsupertop"></i>
                            <!---->
                          </div>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                          <div class="mt-3">
                            <a>
                              <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 frb frb-info">
                <!---->
                <input id="productCodeCheckboxButton_e723f357f836679985012b53cf6b4b88fcad14b2" type="checkbox" value="e723f357f836679985012b53cf6b4b88fcad14b2">
                <label>
                  <div class="card-body">
                    <h5 class="pricing-card-title mb-0 pacchetti"> 5x <span>7</span>
                    </h5>
                    <div>
                      <small class="text-muted info pl-4"> 5 top-ups a day for 7 days </small>
                    </div>
                    <span class="text-muted price"> Rs <span>752.00</span> (16 credits) </span>
                    <div class="form-group mt-4 mb-2">
                      <div class="mt-0 mb-2">
                        <span class="text-muted day">Day</span>
                        <!---->
                      </div>
                      <select disabled="disabled" tabindex="-1" data-toggle="popover" data-trigger="manual" data-content="Please, select time slot" data-placement="bottom" class="browser-default custom-select">
                        <option value="">select time slot</option>
                        <option value="647728cecb76fe950905f984">9 a.m. - 12 p.m. </option>
                        <option value="647728cb41e93947be50bd4c">12 p.m. - 3 p.m. </option>
                        <option value="647728c8be2aa890b4315232">3 p.m. - 6 p.m. </option>
                        <option value="647728c61870e0bd375c7850">6 p.m. - 8 p.m. </option>
                        <option value="647728c241e93947be50bd4a">8 p.m. - 10 p.m. </option>
                        <option value="647728c0228a0853c0c255d4">10 p.m. - 12 a.m. </option>
                      </select>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <h5>Add Premium</h5>
                          <a>
                            <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                        </li>
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <i class="icon-top-premium-ar"></i>
                          <br>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <h4 class="mb-1">Add SuperTop</h4>
                          <p class="mb-0 pb-0">
                            <small>
                              <strong>Extra visibility in the list of ads</strong>
                            </small>
                          </p>
                        </li>
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <div class="d-flex justify-content-between mb-2">
                            <i class="icon-supertop gradientsupertop"></i>
                            <!---->
                          </div>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                          <div class="mt-3">
                            <a>
                              <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>
              </div>
              <div class="col-md-6 frb frb-info">
                <!---->
                <input id="productCodeCheckboxButton_303b31829afb811775d6406e996e23b313492c6f" type="checkbox" value="303b31829afb811775d6406e996e23b313492c6f">
                <label>
                  <div class="card-body">
                    <h5 class="pricing-card-title mb-0 pacchettinotte"> 10x <span>1</span>
                    </h5>
                    <div>
                      <small class="text-muted info pl-4"> 10 top-ups a day for 1 day </small>
                    </div>
                    <span class="text-muted price"> Rs <span>188.00</span> (4 credits) </span>
                    <div>
                      <!---->
                      <div class="text-muted night">Night</div>
                      <ul class="list-unstyled">
                        <li>
                          <i aria-hidden="true" class="fa fa-clock-o"></i> 12 a.m. - 9 a.m.
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <h5>Add Premium</h5>
                          <a>
                            <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                        </li>
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <i class="icon-top-premium-ar"></i>
                          <br>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <h4 class="mb-1">Add SuperTop</h4>
                          <p class="mb-0 pb-0">
                            <small>
                              <strong>Extra visibility in the list of ads</strong>
                            </small>
                          </p>
                        </li>
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <div class="d-flex justify-content-between mb-2">
                            <i class="icon-supertop gradientsupertop"></i>
                            <!---->
                          </div>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                          <div class="mt-3">
                            <a>
                              <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 frb frb-info">
                <!---->
                <input id="productCodeCheckboxButton_c58df7ffd9a49b8f053cf9bd5a83de81337fca9b" type="checkbox" value="c58df7ffd9a49b8f053cf9bd5a83de81337fca9b">
                <label>
                  <div class="card-body">
                    <h5 class="pricing-card-title mb-0 pacchettinotte"> 10x <span>7</span>
                    </h5>
                    <div>
                      <small class="text-muted info pl-4"> 10 top-ups a day for 7 days </small>
                    </div>
                    <span class="text-muted price"> Rs <span>940.00</span> (20 credits) </span>
                    <div>
                      <!---->
                      <div class="text-muted night">Night</div>
                      <ul class="list-unstyled">
                        <li>
                          <i aria-hidden="true" class="fa fa-clock-o"></i> 12 a.m. - 9 a.m.
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <h5>Add Premium</h5>
                          <a>
                            <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                        </li>
                        <li class="list-group-item pb-0.5 pl-0 pr-0">
                          <i class="icon-top-premium-ar"></i>
                          <br>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                        </li>
                      </ul>
                    </div>
                    <div class="form-group mt-4 mb-2" style="display: none;">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <h4 class="mb-1">Add SuperTop</h4>
                          <p class="mb-0 pb-0">
                            <small>
                              <strong>Extra visibility in the list of ads</strong>
                            </small>
                          </p>
                        </li>
                        <li class="list-group-item pb-0.5 pl-2 pr-2 border-0">
                          <div class="d-flex justify-content-between mb-2">
                            <i class="icon-supertop gradientsupertop"></i>
                            <!---->
                          </div>
                          <!---->
                          <label class="switch switch-left-right float-right">
                            <input type="checkbox" class="switch-input">
                            <span data-on="Yes" data-off="No" class="switch-label"></span>
                            <span class="switch-handle"></span>
                          </label>
                          <div class="mt-3">
                            <a>
                              <i aria-hidden="true" class="fa fa-eye pr-2"></i>Show example </a>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </label>
              </div>
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
