@extends("admin.Master")
@section('title')
Transactions Report
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
                            <li class="breadcrumb-item">Transactions Report</li>


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
                        <h5> Transactions Report</h5>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Payment ID</th>
                                        <th>Name</th>
                                        <th>Product Name</th>
                                        <th>Type of Project</th>
                                        <th>Subject of Project</th>
                                        <th>Project Details</th>
                                        <th>Material File</th>
                                        <th>Amount</th>
                                        <th>Payer Name</th>
                                        <th>Payer Email</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th>Payment Method</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($transaction as $i => $transaction_data)
                                    @php
                                    $timestamp = strtotime($transaction_data->created_at);

                                    $formattedDate = date('d-m-Y', $timestamp);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td>{{$transaction_data->payment_id}}</td>
                                        <td><a href="#" data-toggle="tooltip" title="User History">{{ \App\Models\User::getUserFullname($transaction_data->user_id) }}</a></td>
                                        <td>{{ \App\Models\Course::getProductFullname($transaction_data->product_id) }}</td>
                                        <td>{{$transaction_data->project_type}}</td>

                                        <td>{{$transaction_data->project_subject}}</td>
                                        <td>{{$transaction_data->project_details}}</td>
                                        @if(!empty($transaction_data->material_file))
                                         <td><a href="{{ asset('material_file/') }}<?php echo '/'.$transaction_data->material_file;?>" download>Download</a></td>
@endif
                                        <td>${{ $transaction_data->amount }} </td>
                                        <td>{{ $transaction_data->payer_name }} </td>
                                        <td>{{ $transaction_data->payer_email }} </td>
                                        <td>{{ $formattedDate }}</td>
                                        <td>{{$transaction_data->payment_status}}</td>
                                        <td>{{$transaction_data->payment_method}}</td>
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
