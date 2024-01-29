@extends('admin.Master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="page-body">
        @if ($user_session->is_super_admin == 1)
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <div class="page-header-left">
                                <h3>Social Citas</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>

                                </ol>
                            </div>
                        </div>

                        <div class="col">
                            <div class="bookmark pull-right">

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-7 xl-100">
                        <div class="row">

                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i
                                                data-feather="dollar-sign"></i>
                                            <div><span>Total Earning</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($total_earning))
                                                    {{ $total_earning }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i data-feather="tv"></i>
                                            <div><span>Total Top Ads </span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($top_ad))
                                                    {{ $top_ad->count() }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i data-feather="tv"></i>
                                            <div><span>Total Ads</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($ads))
                                                    {{ $ads->count() }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i data-feather="users"></i>
                                            <div><span>Total User</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($total_users))
                                                    {{ $total_users->count() }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>



                        </div>
                    </div>
                    <div class="col-xl-5 xl-100">
                        <div class="card">
                            <div class="card-header">
                                <h5>New Users</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive sellers">
                                    <table class="table table-bordernone">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usersData as $row)
                                                @if ($row->account_type != 'admin')
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">


                                                                <div class="d-inline-block">
                                                                    <p>{{ $row->name }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>{{ $row->email }}</p>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1"
                                        title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Sale</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body charts-box">
                                <div class="flot-chart-container">
                                    <div class="flot-chart-placeholder" id="graph123"></div>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head"
                                        title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Income</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body chart-block">
                                <canvas id="myLineCharts"></canvas>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head2" title="Copy"><i
                                            class="icofont icofont-copy-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Total Profit</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body chart-block">
                                <canvas id="profitchart"></canvas>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head3" title="Copy"><i
                                            class="icofont icofont-copy-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
        @endif

    </div>
@endsection
