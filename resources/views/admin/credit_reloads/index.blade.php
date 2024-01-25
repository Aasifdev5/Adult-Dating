@extends('admin.Master')
@section('title')
Credit Reload
@endsection
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Adult Dating</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                            <li class="breadcrumb-item">Credit Reload</li>

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
                        <h5>Credit Reload List</h5>

                    </div>
                    <div class="card-body">



                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Credits Name</th>
                                        <th>Discounted Percentage</th>
                                        <th>Discounted Amount</th>
                                        <th>Amount</th>
                                        <th>Payment Receipt</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creditReloads as $creditReload)
                                    @php
                                    $userFullname = \App\Models\User::getUserFullname($creditReload->user_id);
                                    $creditsDetails = \App\Models\CreditReloadPromotion::find($creditReload->credit_id);

                                    @endphp

                                    <tr>
                                        <td>{{ $creditReload->id }}</td>
                                        <td>{{ $userFullname }}</td>
                                        <td>{{ $creditsDetails->name }}</td>
                                        <td>{{ $creditsDetails->discount_percentage }}</td>
                                        <td>{{ $creditsDetails->discounted_amount }}</td>
                                        <td>{{ $creditReload->amount }}</td>
                                        <td>
                                            @if ($creditReload->payment_receipt)
                                            <img src="{{ asset('uploads/payment_receipts/' . $creditReload->payment_receipt) }}" alt="Payment Receipt" style="max-width: 100px;">

                                            @else
                                            No receipt uploaded
                                            @endif
                                        </td>
                                        <td>
                                            @if ($creditReload->accepted)
                                            Accepted
                                            @else
                                            Pending
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$creditReload->accepted)
                                            <a href="{{ route('credit_reloads.accept', ['id' => $creditReload->id]) }}" class="btn btn-sm btn-success">Accept</a>
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
            <!-- DOM / jQuery  Ends-->


        </div>
    </div>


    <!-- Container-fluid Ends-->
    <!-- Container-fluid Ends-->
</div>


@endsection
