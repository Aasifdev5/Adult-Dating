@extends('admin.Master')
@section('title')
User List
@endsection
@section('content')
<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">
                  <h3>Social Citas</h3>
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                           </svg></a></li>
                     <li class="breadcrumb-item">Users Management</li>


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
                  <h5>Users List</h5>
 <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{url('admin/add_user')}}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                        User </a>

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
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Email Status</th>
                                                <th>IP Address</th>
                                                <th>Status</th>
                                                <th>Registered Date</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($usersData as $i => $data)
                                             @if($data->account_type!="admin")
                                             <tr>
                                                <td class="text-center">{{$i+1}}</td>
                                                <td><img class="img-radius img-70 align-top m-r-15 rounded-circle" src="{{asset('profile_photo/')}}<?php echo '/' . $data->profile_photo; ?>" height="70px" alt="">{{ stripslashes($data->name) }}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->password}}</td>
                                                <td>
                                                   @if ($data->email_verified_at === null)
                                                   <span class="badge badge-danger">Not Verified</span>
                                                   @else<span class="badge badge-success">Verified</span>
                                                   @endif
                                                </td>
                                                <td>{{$data->ip_address}}</td>
                                                <td>@if($data->status==1)<span class="badge badge-success">Active</span>
                                                   @else<span class="badge badge-danger">Inactive</span>@endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y  H:i:s') }}</td>

                                                <td>
                                                   <a href="{{ url('admin/user/edit',$data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="edit"> <i class="fa fa-edit"></i>
                                                   </a>
                                                    <a href="{{ url('admin/user/delete_user',$data->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 m-r-5" data-toggle="tooltip" title="edit"> <i class="fa fa-trash"></i>
                                                   </a>

                                                </td>
                                             </tr>
                                             @endif
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
