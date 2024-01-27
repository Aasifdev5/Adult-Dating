@extends('admin.Master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="page-body">
    @if($user_session->is_super_admin==1)
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
                <!-- Bookmark Start-->
                <div class="col">
                    <div class="bookmark pull-right">
                        <ul>
                            <li><a href="#" data-bs-toggle="tooltip" title="Calender" data-bs-original-title="Calendar"><i data-feather="calendar"></i></a></li>
                            <li><a href="#" data-bs-toggle="tooltip" title="Mail" data-bs-original-title="Mail"><i data-feather="mail"></i></a></li>
                            <li><a href="#" data-bs-toggle="tooltip" title="Chat" data-bs-original-title="Chat"><i data-feather="message-square"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                <form class="form-inline search-form">
                                    <div class="form-group form-control-search">
                                        <input type="text" placeholder="Search..">
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 xl-100">
                <div class="row">
                    <div class="item">
                        <div class="card">
                            <div class="card-body ecommerce-icons text-center"><i data-feather="dollar-sign"></i>
                                <div><span>Total Earning</span></div>
                                <h4 class="font-primary mb-0 counter">@if(!empty($total_earning))
                                    {{$total_earning}}
                                    @endif
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body ecommerce-icons text-center"><i data-feather="shopping-cart"></i>
                            <div><span>Total Sale Product</span></div>
                            <h4 class="font-primary mb-0 counter">@if(!empty($total_sale))
                                {{count($total_sale)}}
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="owl-carousel owl-theme" id="owl-carousel-14">
                        <div class="item">

                        </div>
                        <!--<div class="item">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body ecommerce-icons text-center"><i data-feather="map-pin"></i>-->
                        <!--            <div><span>Total Web Visitor</span></div>-->
                        <!--            <h4 class="font-primary mb-0 counter">65</h4>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="item">

                        </div>
                        <!--<div class="item">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body ecommerce-icons text-center"><i data-feather="trending-down"></i>-->
                        <!--            <div><span>Company Loss</span></div>-->
                        <!--            <h4 class="font-primary mb-0 counter">89</h4>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="item">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body ecommerce-icons text-center"><i data-feather="dollar-sign"></i>-->
                        <!--            <div><span>Total Earning</span></div>-->
                        <!--            <h4 class="font-primary mb-0 counter">72</h4>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="item">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body ecommerce-icons text-center"><i data-feather="map-pin"></i>-->
                        <!--            <div><span>Total Web Visitor</span></div>-->
                        <!--            <h4 class="font-primary mb-0 counter">65</h4>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="item">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body ecommerce-icons text-center"><i data-feather="shopping-cart"></i>-->
                        <!--            <div><span>Total Sale Product</span></div>-->
                        <!--            <h4 class="font-primary mb-0 counter">96</h4>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="item">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body ecommerce-icons text-center"><i data-feather="trending-down"></i>-->
                        <!--            <div><span>Company Loss</span></div>-->
                        <!--            <h4 class="font-primary mb-0 counter">89</h4>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
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
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                                </div>
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
                                    @foreach($usersData as $row)
                                    <tr>
                                        <td>
                                            <div class="d-inline-block align-middle">


                                                <div class="d-inline-block">
                                                    <p>{{$row->name}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{$row->email}}</p>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xl-3 xl-50 col-sm-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-body">-->
            <!--            <div class="number-widgets">-->
            <!--                <div class="media">-->
            <!--                    <div class="media-body align-self-center">-->
            <!--                        <h6 class="mb-0">Payment Status</h6>-->
            <!--                    </div>-->
            <!--                    <div class="radial-bar radial-bar-95 radial-bar-primary" data-label="95%"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 xl-50 col-sm-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-body">-->
            <!--            <div class="number-widgets">-->
            <!--                <div class="media">-->
            <!--                    <div class="media-body align-self-center">-->
            <!--                        <h6 class="mb-0">Work Process</h6>-->
            <!--                    </div>-->
            <!--                    <div class="radial-bar radial-bar-75 radial-bar-primary" data-label="75%"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 xl-50 col-sm-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-body">-->
            <!--            <div class="number-widgets">-->
            <!--                <div class="media">-->
            <!--                    <div class="media-body align-self-center">-->
            <!--                        <h6 class="mb-0">Sale Completed</h6>-->
            <!--                    </div>-->
            <!--                    <div class="radial-bar radial-bar-90 radial-bar-primary" data-label="90%"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-3 xl-50 col-sm-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-body">-->
            <!--            <div class="number-widgets">-->
            <!--                <div class="media">-->
            <!--                    <div class="media-body align-self-center">-->
            <!--                        <h6 class="mb-0">Payment Done</h6>-->
            <!--                    </div>-->
            <!--                    <div class="radial-bar radial-bar-80 radial-bar-primary" data-label="80%"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
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
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2" title="Copy"><i class="icofont icofont-copy-alt"></i></button>

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
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3" title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xl-4 xl-50 col-md-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header">-->
            <!--            <h5>Profile Status</h5>-->
            <!--            <div class="card-header-right">-->
            <!--                <ul class="list-unstyled card-option">-->
            <!--                    <li><i class="icofont icofont-simple-left"></i></li>-->
            <!--                    <li><i class="view-html fa fa-code"></i></li>-->
            <!--                    <li><i class="icofont icofont-maximize full-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-minus minimize-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-refresh reload-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-error close-card"></i></li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-body height-equal">-->
            <!--            <div class="progress-block">-->
            <!--                <div class="progress-title"><span>Basic Information</span><span class="pull-right">15/18</span></div>-->
            <!--                <div class="progress" style="height: 3px;">-->
            <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="progress-block">-->
            <!--                <div class="progress-title"><span>Portfolio</span><span class="pull-right">5/6</span></div>-->
            <!--                <div class="progress" style="height: 3px;">-->
            <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="progress-block">-->
            <!--                <div class="progress-title"><span>Legal Document</span><span class="pull-right">12/20</span></div>-->
            <!--                <div class="progress" style="height: 3px;">-->
            <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="progress-block">-->
            <!--                <div class="progress-title"><span>Interest</span><span class="pull-right">5/10</span></div>-->
            <!--                <div class="progress" style="height: 3px;">-->
            <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="progress-block">-->
            <!--                <div class="progress-title"><span>Product Info</span><span class="pull-right">15/17</span></div>-->
            <!--                <div class="progress" style="height: 3px;">-->
            <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="progress-block mb-0">-->
            <!--                <div class="progress-title"><span>Billing Details</span><span class="pull-right">2/5</span></div>-->
            <!--                <div class="progress" style="height: 3px;">-->
            <!--                    <div class="progress-bar bg-primary" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="code-box-copy">-->
            <!--                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head4" title="Copy"><i class="icofont icofont-copy-alt"></i></button>-->

            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-4 xl-50 col-md-6">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header">-->
            <!--            <h5>Logs</h5>-->
            <!--            <div class="card-header-right">-->
            <!--                <ul class="list-unstyled card-option">-->
            <!--                    <li><i class="icofont icofont-simple-left"></i></li>-->
            <!--                    <li><i class="view-html fa fa-code"></i></li>-->
            <!--                    <li><i class="icofont icofont-maximize full-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-minus minimize-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-refresh reload-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-error close-card"></i></li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-body height-equal log-content">-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-odd"></div><span>New User Registration</span><span class="pull-right">14:12</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-even"></div><span>New sale: souffle.</span><span class="pull-right">19:00</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-odd"></div><span>14 products added.</span><span class="pull-right">05:22</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-even"></div><span>New sale: Napole.</span><span class="pull-right">08:45</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-odd"></div><span>New User Registration</span><span class="pull-right">06:51</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-even"></div><span>New User Registration</span><span class="pull-right">09:42</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element">-->
            <!--                <div class="circle-double-odd"></div><span>New User Registration</span><span class="pull-right">10:45</span>-->
            <!--            </div>-->
            <!--            <div class="logs-element mb-0">-->
            <!--                <div class="circle-double-even"></div><span>New User Registration</span><span class="pull-right">02:05</span>-->
            <!--            </div>-->
            <!--            <div class="code-box-copy">-->
            <!--                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head5" title="Copy"><i class="icofont icofont-copy-alt"></i></button>-->

            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="col-xl-4 xl-100">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header">-->
            <!--            <h5>statics</h5>-->
            <!--            <div class="card-header-right">-->
            <!--                <ul class="list-unstyled card-option">-->
            <!--                    <li><i class="icofont icofont-simple-left"></i></li>-->
            <!--                    <li><i class="view-html fa fa-code"></i></li>-->
            <!--                    <li><i class="icofont icofont-maximize full-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-minus minimize-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-refresh reload-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-error close-card"></i></li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-body updating-chart height-equal">-->
            <!--            <div class="upadates text-center">-->
            <!--                <h2 class="font-primary"><i data-feather="dollar-sign"></i><span class="counter"> 89.68 </span><i data-feather="arrow-up"></i></h2>-->
            <!--                <p>Week2 +<span class="counter">15.44</span></p>-->
            <!--            </div>-->
            <!--            <div class="flot-chart-container">-->
            <!--                <div class="flot-chart-placeholder" id="updating-data-morris-chart"></div>-->
            <!--            </div>-->
            <!--            <div class="code-box-copy">-->
            <!--                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head6" title="Copy"><i class="icofont icofont-copy-alt"></i></button>-->

            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="col-xl-4 xl-50">-->
            <!--    <div class="card">-->
            <!--        <div class="card-header">-->
            <!--            <h5>Review</h5>-->
            <!--            <div class="card-header-right">-->
            <!--                <ul class="list-unstyled card-option">-->
            <!--                    <li><i class="icofont icofont-simple-left"></i></li>-->
            <!--                    <li><i class="view-html fa fa-code"></i></li>-->
            <!--                    <li><i class="icofont icofont-maximize full-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-minus minimize-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-refresh reload-card"></i></li>-->
            <!--                    <li><i class="icofont icofont-error close-card"></i></li>-->
            <!--                </ul>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--        <div class="card-body">-->
            <!--            <div class="text-center ecommerce-knob">-->
            <!--                <input class="knob" data-width="294" data-height="294" data-angleoffset="180" data-fgcolor="#4466f2" data-skin="tron" data-thickness=".1" value="35">-->
            <!--            </div>-->
            <!--            <div class="code-box-copy">-->
            <!--                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head8" title="Copy"><i class="icofont icofont-copy-alt"></i></button>-->

            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

        </div>
    </div>
    <!-- Container-fluid Ends-->
    @endif

</div>
@endsection
