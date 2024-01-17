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


                        <form action="{{ route('credit_reloads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$user_session->id}}">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_receipt" class="form-label">Payment Receipt</label>
                                <input type="file" class="form-control" id="payment_receipt" name="payment_receipt" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </form>
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Payment Receipt</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creditReloads as $creditReload)
                                    <tr>
                                        <td>{{ $creditReload->id }}</td>
                                        <td>{{ $creditReload->amount }}</td>
                                        <td>
                                            @if ($creditReload->payment_receipt)
                                            <img src="{{ Storage::url($creditReload->payment_receipt) }}" alt="Payment Receipt" style="max-width: 100px;">
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
