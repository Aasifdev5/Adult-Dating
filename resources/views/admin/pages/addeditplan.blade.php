@extends("admin.Master")
@section('title')
Edit Subscription Plan
@endsection
@section("content")


<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col">
          <div class="page-header-left">
            <h3>Sky Forecasting</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg></a></li>
              <li class="breadcrumb-item">Subscription</li>
              <li class="breadcrumb-item"> Subscription Plan Edit</li>

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
            <h5>Subscription Plan Edit </h5>

            </a>
          </div>
          <div class="card-body">
            <div class="content-page">
              <div class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-12">

                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                      </div>
                      @endif
                      {!! Form::open(array('url' => array('admin/subscription_plan/add_edit_plan'),'class'=>'form-horizontal','name'=>'slider_form','id'=>'slider_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

                      <input type="hidden" name="id" value="{{ isset($plan_info->id) ? $plan_info->id : null }}">


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Plan Name*</label>
                        <div class="col-sm-8">
                          <input type="text" name="plan_name" value="{{ isset($plan_info->plan_name) ? $plan_info->plan_name : null }}" class="form-control">
                        </div>
                      </div>
                      <br>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Duration*</label>
                        <div class="col-sm-4">
                          <input type="number" name="plan_duration" value="{{ isset($plan_info->plan_duration) ? $plan_info->plan_duration : null }}" class="form-control" placeholder="7">
                        </div>
                        <div class="col-sm-4">
                          <select name="plan_duration_type" class="form-control">
                            <option value="1" @if(isset($plan_info->plan_duration_type) AND $plan_info->plan_duration_type=='1') selected @endif>Day(s)</option>
                            <option value="30" @if(isset($plan_info->plan_duration_type) AND $plan_info->plan_duration_type=='30') selected @endif>Month(s)</option>
                            <option value="365" @if(isset($plan_info->plan_duration_type) AND $plan_info->plan_duration_type=='365') selected @endif>Year(s)</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Price*</label>
                        <div class="col-sm-8">
                          <input type="text" name="plan_price" value="{{ isset($plan_info->plan_price) ? $plan_info->plan_price : null }}" class="form-control" placeholder="9.99">
                          <small id="emailHelp" class="form-text text-muted mb-2">The minimum amount for processing a transaction through Stripe in USD is $0.50. For more info <a href="https://support.chargebee.com/support/solutions/articles/228511-transaction-amount-limit-in-stripe" target="_blank">click here</a></small>
                        </div>
                      </div>
                      <br>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-8">
                          <select class="form-control" name="status">
                            <option value="1" @if(isset($plan_info->status) AND $plan_info->status==1) selected @endif>{{trans('active')}}</option>
                            <option value="0" @if(isset($plan_info->status) AND $plan_info->status==0) selected @endif>{{trans('inactive')}}</option>
                          </select>
                        </div>
                      </div>
                      <br>
                      <div class="form-group row mb-0">

                      </div>
                      <br>
                      <div class="form-group">
                        <div class="offset-sm-2 col-sm-9 pl-1">
                          <button type="submit" class="btn btn-primary waves-effect waves-light"> Save </button>
                        </div>
                      </div>
                      {!! Form::close() !!}
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