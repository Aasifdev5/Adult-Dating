@extends('admin.Master')
@section('title')
Top Ads  List
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
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                            <li class="breadcrumb-item">Top Ads</li>

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
                        <h5>Top Ads  List</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{ route('admin.ads.create') }}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                        Top Ads </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ad Type</th>
                                        <th>Price</th>
                                        <th>Detail</th>
                                        <th>Publish</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->id }}</td>
                                        <td>{{ $ad->ad_type }}</td>
                                        <td>{{ $ad->price }}</td>
                                        <td>{!!stripslashes ($ad->detail)!!}</td>
                                        <td>{{ $ad->publish ? 'Yes' : 'No' }}</td>

                                        <td>
                                            <a href="{{ route('admin.ads.edit', ['ad' => $ad->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.ads.destroy', ['ad' => $ad->id]) }}" method="POST" style="display: inline;">
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
