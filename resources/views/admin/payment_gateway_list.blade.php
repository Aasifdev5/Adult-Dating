@extends('admin.Master')
@section('title')
Payment Gateway
@endsection
@section('content')
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">
                  <h3>Sky Forecating</h3>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                           </svg></a></li>
                     <li class="breadcrumb-item">Settings</li>
                     <li class="breadcrumb-item">Payment Gateway</li>

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
                  <h5>Payment Gateway settings</h5>

                  </a>
               </div>
               <div class="card-body">
                  <div class="content-page">
                     <div class="content">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-12">
                                 <div class="card-box table-responsive">


                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                       {{ Session::get('flash_message') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                       <table class="table table-bordered display" id="advance-1">
                                          <thead>
                                             <tr>
                                             <th class="text-center">#</th>
                                                <th>Gateway Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($list as $i => $data)
                                             <tr>
                                             <td class="text-center">{{$i+1}}</td>
                                                <td>{{ stripslashes($data->gateway_name) }}</td>
                                                <td>@if($data->status==1)<span class="badge badge-success">Active</span>
                                                   @else<span class="badge badge-danger">Inactive</span>@endif
                                                </td>
                                                <td>
                                                   <a href="{{ url('admin/payment_gateway/edit',$data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="edit"> <i class="fa fa-edit"></i>
                                                   </a>

                                                </td>
                                             </tr>
                                             @endforeach



                                          </tbody>
                                       </table>
                                    </div>

                                 </div>
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
