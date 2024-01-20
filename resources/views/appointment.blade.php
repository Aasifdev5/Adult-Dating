@extends('master')
@section('title')
Appointment List
@endsection
@section('content')


<main>
    <!-- Container-fluid starts-->
    <div class="container">
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
                        <h5> Appointment List</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{ route('appointments.create') }}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                            Appointment</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-striped" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile Photos</th>
                                        <th>Profile</th>
                                        <th>Client Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>
                                            <div id="carousel-{{ $appointment->id }}" class="carousel" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    @php
                                                    $adsPhotos = App\Models\Image::where('user_id', $appointment->profile_id)
                                                    ->where('ad_id', $appointment->ad_id)
                                                    ->limit(3)
                                                    ->get();
                                                    @endphp

                                                    @foreach ($adsPhotos as $index => $adsPhoto)
                                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                        <div class="item-image-supertop">
                                                            <img src="{{ asset('storage/' . $adsPhoto->path) }}" alt="Image {{ $index + 1 }}" class="rounded-circle" width="120" height="100">
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <span class="badge badge-photocounter">
                                                    <i aria-hidden="true" class="fas fa-images"></i> {{ $adsPhotos->count() }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>{{ \App\Models\User::getUserFullname($appointment->profile_id) }}</td>
                                        <td>{{ \App\Models\User::getUserFullname($appointment->user_id) }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <td>
                                            <a href="{{ url('edit_appointment', ['id' => $appointment->id]) }}" class="btn btn-sm btn-success" type="submit">Edit</a>

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
</main>




@endsection
