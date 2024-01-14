@extends("admin.Master")
@section('title')
Languages
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
                     <li class="breadcrumb-item">Languages</li>


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
                  <h5> Languages </h5>

                  <div class="col-md-12">
                     <a href="add_language" class="btn btn-success btn-md waves-effect waves-light m-b-20 pull-right" data-toggle="tooltip" title="{{trans('words.add_language')}}"><i class="fa fa-plus"></i>
                        Add Language</a>
                  </div>
               </div>
               <div class="card-body">

                  <div class="card-box table-responsive">


                     <div class="content-page">
                        <div class="content">
                           <div class="container-fluid">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="card-box table-responsive">


                                       <div class="table-responsive">
                                          <table  class="table table-border table-striped display"  id="advance-1" data-toggle="data-table">
                                             @if(Session::has('success'))
                                             <div class="alert alert-success">{{Session::get('success')}}</div>
                                             @endif
                                             @if(Session::has('fail'))
                                             <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                             @endif
                                             <thead>
                                                <tr class="ligth">
                                                   <th>#</th>
                                                   <th>Language Name</th>
                                                   <th>Language Code</th>
                                                   <th>Language Photo</th>
                                                   <th style="min-width: 100px">Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php $count = 1; ?>
                                                @foreach($language as $row)
                                                <tr>
                                                   <td><?php echo $count++; ?></td>
                                                   <td>{{$row->name}}</td>
                                                   <td>{{$row->code}}</td>
                                                   <td><img src="{{asset('images/language//')}}<?php echo '/' . $row->language_photo; ?>" class="img-circle" width="100" height="70">
                                                  
                                                </td>
                                                   <td>
                                                      <div class="flex align-items-center list-user-action">
                                                         @if($row->name!="English")
                                                         <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Edit" href="{{ route('edit_language', ['id' => $row->id]) }}" aria-label="Edit" data-bs-original-title="Edit">
                                                            <span class="btn-inner">
                                                               <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                  <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                  </path>
                                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                  </path>
                                                                  <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                  </path>
                                                               </svg>
                                                            </span>
                                                         </a>

                                                         <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" href="{{ route('delete_language', ['id' => $row->id]) }}" aria-label="Delete" data-bs-original-title="Delete">
                                                            <span class="btn-inner">
                                                               <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                  <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                  </path>
                                                                  <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                  <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                                  </path>
                                                               </svg>
                                                            </span>
                                                         </a>
                                                         @endif
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