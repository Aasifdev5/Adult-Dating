@extends('admin.Master')
@section('title')
Mail Templates
@endsection
@section('content')

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
                     <li class="breadcrumb-item">Mail Templates</li>
                    
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
                  <h5>Mail Templates List</h5>
                  <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{ url('admin/mail-templates/add') }}"
                     data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                     Mail Templates</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="display" id="advance-1">
                     <thead>
                <tr>
                    <th class="tb-w-2x">#</th>
                    <th class="tb-w-3x">Name</th>
                    <th class="tb-w-7x">Subject</th>
                    <th class="tb-w-3x">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailTemplates as $mailTemplate)
                    <tr class="item">
                        <td>{{ $mailTemplate->id }}</td>
                        <td>
                            <a href="{{ url('admin/mail-templates/edit', $mailTemplate->id) }}"
                                class="text-dark"><i data-feather="mail"></i> {{ $mailTemplate->name }}</a>
                        </td>
                        <td>{{ $mailTemplate->subject }}</td>
                        <td>
                            @if ($mailTemplate->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Disabled</span>
                            @endif
                        </td>
                        <td>
                            <div class="text-end">
                                <button type="button" class="btn btn-sm rounded-3" data-bs-toggle="dropdown"
                                    aria-expanded="true">
                                    <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-sm-end" data-popper-placement="bottom-end">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url('admin/mail-templates/edit', $mailTemplate->id) }}"><i
                                                class="fa fa-edit me-2"></i>Edit</a>
                                    </li>
                                </ul>
                            </div>
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