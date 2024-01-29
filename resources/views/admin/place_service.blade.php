@extends('admin.Master')
@section('title')
Place of Service List
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
                     <li class="breadcrumb-item"><a href="dashboard"><i
                              data-feather="home"></i></a></li>
                     <li class="breadcrumb-item">Category Management</li>
                     <li class="breadcrumb-item">Place of Service</li>

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
                  <h5> Place of Service List</h5>
                  <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="add_category"
                     data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                     Place of Service</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="display" id="advance-1">
                        <thead>
                           <tr>
                              <th class="text-center">#</th>
                              <th> Name</th>
                              <th>Action</th>

                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $count=1;
                           ?>
                           @foreach ($categories as $row)
                           <tr>
                              <td class="text-center">{{ $count++ }}</td>
                              <td>{{ $row->category_name }}</td>
                              <td>

                                 <a href="{{ route('edit_category', ['id' => $row->id]) }}"
                                    class="btn btn-sm btn-success" type="submit">Edit</a>
                                 <a href="{{ route('Delete_Category', ['id' => $row->id]) }}"
                                    class="btn btn-sm btn btn-danger" type="submit">Delete</a>
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
