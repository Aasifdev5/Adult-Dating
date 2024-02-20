@extends('admin.Master')
@section('title')
    Ads List
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
                                <li class="breadcrumb-item"><a href="https://laravel.pixelstrap.com/endless"
                                        data-bs-original-title="" title=""><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-home">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg></a></li>
                                <li class="breadcrumb-item">Ads</li>


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
                            <h5>Ads List</h5>


                        </div>
                        <div class="card-body">
                            <div class="content-page">
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box table-responsive">


                                                    @if (Session::has('flash_message'))
                                                        <div class="alert alert-success">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            {{ Session::get('flash_message') }}
                                                        </div>
                                                    @endif
                                                    <main>




                                                        <div class="table-responsive">
                                                            <table class="display table table-bordered table-striped"
                                                                id="advance-1">
                                                                <thead>
                                                                    <tr>
                                                                        <th>ID</th>
                                                                        <th>Profile Photos</th>
                                                                        <th>Profile</th>
                                                                        <th>Date</th>
                                                                        <th>Action</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                   @foreach ($ads as $appointment)
                                                                   <tr>
                                                                       <td>{{ $loop->iteration }}</td>
                                                                       <td>
                                                                           <div id="carousel-{{ $appointment->id }}" class="carousel" data-ride="carousel">
                                                                               <div class="carousel-inner">
                                                                                   @foreach (App\Models\Image::where('user_id', $appointment->user_id)
                                                                                       ->where('ad_id', $appointment->id)
                                                                                       ->limit(3)
                                                                                       ->get() as $index => $adsPhoto)
                                                                                       <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                                                           <div class="item-image-supertop">
                                                                                               <img src="{{ asset($adsPhoto->path) }}"
                                                                                                   alt="Image {{ $index + 1 }}"
                                                                                                   class="rounded-circle" width="120" height="100">
                                                                                           </div>
                                                                                       </div>
                                                                                   @endforeach
                                                                               </div>

                                                                               <span class="badge badge-photocounter">
                                                                                   <i aria-hidden="true" class="fas fa-images"></i>
                                                                                   {{ $ads->where('user_id', $appointment->user_id)->where('ad_id', $appointment->id)->count() }}
                                                                               </span>
                                                                           </div>
                                                                       </td>
                                                                       <td>{{ \App\Models\User::getUserFullname($appointment->user_id) }}</td>
                                                                       <td>
                                                                           @if (!empty($appointment->created_at))
                                                                               {{ \Carbon\Carbon::parse($appointment->created_at)->format('d F Y') }}
                                                                           @endif
                                                                       </td>
                                                                       <td>
                                                                           <form action="{{ url('admin/ads_destroy', ['ad' => $appointment->id]) }}" method="POST" style="display: inline;">
                                                                               @csrf
                                                                               @method('DELETE')
                                                                               <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                                           </form>
                                                                       </td>
                                                                   </tr>
                                                               @endforeach







                                                                </tbody>
                                                            </table>
                                                        </div>


                                                </div>
                                                <br>


                                                </main>

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

    <!-- Optionally, add Bootstrap JS and Popper.js (required for Bootstrap dropdowns, popovers, etc.) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
