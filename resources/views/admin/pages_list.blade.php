@extends("admin.Master")
@section('title')
Pages
@endsection
@section("content")


<div class="page-body">
   <div class="container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col">
               <div class="page-header-left">

                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless" data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                           </svg></a></li>
                     <li class="breadcrumb-item">Pages</li>


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
                  <h5> Pages </h5>

                  <div class="col-md-12">
                     <a href="{{URL::to('add')}}" class="btn btn-success btn-md waves-effect waves-light m-b-20 pull-right" data-toggle="tooltip" title="{{trans('words.add_page')}}"><i class="fa fa-plus"></i>
                        Add Page</a>
                  </div>
               </div>
               <div class="card-body">

                  <div class="card-box table-responsive">


                     @if(Session::has('flash_message'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span></button>
                        {{ Session::get('flash_message') }}
                     </div>
                     @endif
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
                                                   <th>Page Title</th>
                                                   <th>Status</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                @foreach($pages_list as $i => $page)
                                                <tr>
                                                <td class="text-center">{{$i+1}}</td>
                                                   <td>{{ stripslashes($page->page_title) }}</td>
                                                   <td>@if($page->status==1)<span class="badge badge-success">Active</span>
                                                      @else<span class="badge badge-danger">Inactive</span>@endif
                                                   </td>

                                                   <td>
                                                      <a target="_blank" href="{{ URL::to('admin/page/'.$page->page_slug) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="View"> <i class="fa fa-eye"></i>
                                                      </a>

                                                      <a href="{{ URL::to('admin/edit/'.$page->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('edit')}}"> <i class="fa fa-edit"></i>
                                                      </a>
                                                      @if($page->id!=5)
                                                      <a href="{{ url('admin/pages/delete/'.$page->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>
                                                      @endif
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
      </div>
      <!-- DOM / jQuery  Ends-->


   </div>
</div>
<!-- Container-fluid Ends-->
<!-- Container-fluid Ends-->
</div>


@endsection