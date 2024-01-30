@extends('master')
@section('title')
{{stripslashes($page_info->page_title)}}
@endsection
@section('content')
<div class="container">
<!-- Start Breadcrumb -->
<div class="breadcrumb-section bg-xs" style="background-image: url({{ URL::asset('site_assets/images/breadcrum-bg.jpg') }})">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <h2>{{stripslashes($page_info->page_title)}}</h2>
          <nav id="breadcrumbs">
            <ul>
              {{-- <li><a href="{{ URL::to('/') }}" title="{{trans('home')}}">Home</a></li>
              <li>{{stripslashes($page_info->page_title)}}</li> --}}
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumb -->

  <!-- Start Details Info Page -->
  <div class="details-page-area vfx-item-ptb vfx-item-info">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="details-item-block">

            {!!stripslashes($page_info->page_content)!!}

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Details Info Page -->
</div>



@endsection
