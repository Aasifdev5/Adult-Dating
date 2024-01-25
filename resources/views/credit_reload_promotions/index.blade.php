@extends('admin.Master')
@section('title')
Credits
@endsection
@section('content')

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
                            <li class="breadcrumb-item">Credits</li>


                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                        <h5> Credits</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{url('admin/promotions/create')}}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                            Credits </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-bordered table-striped" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Minimum Amount</th>
                                        <th>Discount Percentage</th>
                                        <th>Amount</th>
                                        <th>Discount Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $promotion->id }}</td>
                                        <td>{{ $promotion->name }}</td>
                                        <td>{{ $promotion->minimum_amount }}</td>
                                        <td>{{ $promotion->discount_percentage }}</td>
                                        <td>{{$promotion->amount}}</td>
                                        <td>{{$promotion->discounted_amount}}</td>
                                        <td>
                                            <!-- <a href="{{ url('admin/promotions/'.$promotion->id) }}" class="btn btn-sm btn-warning">Edit</a> -->
                                            <form action="{{ url('admin/promotions/'.$promotion->id) }}" method="POST" style="display: inline;">
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
                </div>
            </div>
            <!-- DOM / jQuery  Ends-->


        </div>
    </div>


    <!-- Container-fluid Ends-->
    <!-- Container-fluid Ends-->
</div>


@endsection
