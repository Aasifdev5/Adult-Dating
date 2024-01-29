@extends("admin.Master")
@section('title')
Orders
@endsection
@section("content")

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Social Citas</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Orders </li>


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
                        <h5> Orders List</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{url('admin/add_order')}}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                            Order </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Product Name</th>
                                        <th>Order Date</th>
                                        <th>Due On</th>
                                        <th>Price</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($orders as $i => $data)
                                    @php
                                    $timestamp = strtotime($data->order_date);

                                    $order_date = date('d-m-Y', $timestamp);
                                    $time = strtotime($data->due_on);

                                    $due_on = date('d F', $time);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td><a href="#" data-toggle="tooltip" title="User History">{{ \App\Models\User::getUserFullname($data->user_id) }}</a></td>
                                        <td>{{ \App\Models\Course::getProductFullname($data->product_id) }}</td>
                                        <td>{{ $order_date }}</td>
                                        <td>{{$due_on}}</td>
                                        <td>{{ $data->payment_amount }} </td>
                                        <td>{{$data->duration}}</td>
                                        <td><?php
                                            if ($data->status == "progress") {
                                            ?>
                                                <p style="color: purple;">In Progress</p>
                                            <?php
                                            } elseif($data->status == "completed"){
                                                echo "<p style='color: green'>Completed</p>";
                                            }else{
                                                echo "<p style='color: red'>Cancelled</p>";
                                            }
                                            ?>


                                        </td>


                                        <td>
                                            <a href="{{ url('admin/edit_order', ['id' => $data->id]) }}" class="btn btn-sm btn-success" type="submit">Edit</a>
                                            <a href="{{ url('admin/delete_order', ['id' => $data->id]) }}" class="btn btn-sm btn btn-danger" type="submit">Delete</a>
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
