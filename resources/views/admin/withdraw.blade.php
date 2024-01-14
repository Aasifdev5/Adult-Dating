@extends("admin.Master")
@section('title')
Withdraw Requests
@endsection
@section("content")

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Sky Forecasting</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Withdraw Requests </li>


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
                        <h5> Withdraw Requests List</h5>
                    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>

                                        <th>Amount</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($balance as $i => $data)

                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td><a href="#" data-toggle="tooltip" title="User History">{{ \App\Models\User::getUserFullname($data->user_id) }}</a></td>

                                        <td>{{ $data->amount }} </td>


                                        <td>
                                            <!-- <a href="{{ url('admin/edit_balance', ['id' => $data->id]) }}" class="btn btn-sm btn-success" type="submit">Edit</a> -->
                                            <a href="{{ url('admin/delete_balance', ['id' => $data->id]) }}" class="btn btn-sm btn btn-danger" type="submit">Delete</a>
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
