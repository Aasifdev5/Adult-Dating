@extends("admin.Master")
@section('title')
Transactions
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
                     <li class="breadcrumb-item"><a href="dashboard"><i
                              data-feather="home"></i></a></li>
                     <li class="breadcrumb-item">Subscription </li>
                    

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
            @if(Session::has('success'))
                  <div class="alert alert-success">
                     <p>{{session::get('success')}}</p>
                  </div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">
                     <p>{{session::get('fail')}}</p>
                  </div>
                  @endif
               <div class="card-header">
                  <h5> Subscription Plan List</h5>
                  <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{url('admin\subscription_plan\add_plan')}}"
                     data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                     Plan</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-bordered" id="advance-1">
                        <thead>
                           <tr>
                              <th>Plan Name</th>
                              <th>Duration</th>
                              <th>Price</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($plan_list as $i => $plan_data)
                           <tr>
                              <td>{{ $plan_data->plan_name }}</td>
                              <td>{{ App\Models\SubscriptionPlan::getPlanDuration($plan_data->id) }}</td>
                              <td>
                                 {{ $plan_data->plan_price }}</td>
                              <td>@if($plan_data->status==1)<span
                                    class="badge badge-success">{{trans('active')}}</span> @else<span
                                    class="badge badge-danger">{{trans('inactive')}}</span>@endif</td>
                              <td>
                                 <a href="{{ url('admin/subscription_plan/edit_plan/'.$plan_data->id) }}"
                                    class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                    data-toggle="tooltip" title="{{trans('edit')}}"> <i class="fa fa-edit"></i>
                                 </a>
                                 <a href="{{ url('admin/subscription_plan/delete/'.$plan_data->id) }}"
                                    class="btn btn-icon waves-effect waves-light btn-danger m-b-5"
                                    onclick="return confirm('{{trans('dlt_warning_text')}}')"
                                    data-toggle="tooltip" title="{{trans('remove')}}"> <i
                                       class="fa fa-remove"></i> </a>
                              </td>
                           </tr>
                           @endforeach



                        </tbody>
                     </table>
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