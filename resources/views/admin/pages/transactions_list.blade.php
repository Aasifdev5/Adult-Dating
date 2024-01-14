@extends("admin.Master")
@section('title')
Transactions
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
                            <li class="breadcrumb-item">Transactions </li>


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
                        <h5> Transactions List</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="add_transaction" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                            Transaction </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Product Name</th>

                                        <th>Amount</th>


                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($transactions_list as $i => $transaction_data)
                                    @php
                                    $timestamp = strtotime($transaction_data->date);

                                    $formattedDate = date('d-m-Y', $timestamp);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td><a href="#" data-toggle="tooltip" title="User History">{{ \App\Models\User::getUserFullname($transaction_data->user_id) }}</a></td>
                                        <td>{{ \App\Models\Course::getProductFullname($transaction_data->product_id) }}</td>

                                        <td>{{ $transaction_data->payment_amount }} </td>


                                        <td>{{ $formattedDate }}</td>
                                        <td><?php

                                            if ($transaction_data->status == 1) {
                                                echo "<p style='color: green'>Paid</p>";
                                            } else {
                                                echo "<p style='color: red'>Failed</p>";
                                            }
                                            ?>


                                        </td>
                                        <td>
                                            <a href="{{ url('admin/edit_transaction', ['id' => $transaction_data->id]) }}" class="btn btn-sm btn-success" type="submit">Edit</a>
                                            <a href="{{ url('admin/delete_transaction', ['id' => $transaction_data->id]) }}" class="btn btn-sm btn btn-danger" type="submit">Delete</a>
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
