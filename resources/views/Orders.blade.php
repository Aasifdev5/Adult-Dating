@extends('master')
@section('title')
Orders
@endsection
@section('content')
<main>
    <div class="welcome">
        <h2>Manage Orders</h2>
    </div>
    <!-- links -->
    <div class="links">
        <li><a class="link" href="ActiveOrders"> Active</a></li>
        <li><a class="link" href="CompletedOrders">Completed</a></li>
        <li><a class="link" href="CancelledOrders"> Cancelled</a></li>
    </div>
    <!-- In Progress orders -->
    <div>
        <div class="flex">
            <div class="content">
                <h1>Active Orders</h1>
                <a class="btn-view" href="{{url('ActiveOrders')}}">View All</a>
            </div>
        </div>
        <div class="display">
            <div class="activity">
                <div class="activity-data">
                    <table class="table table-borderless table-active" style="background-color: #EFF0FF;">
                        <tr class="table-secondary">
                            <thead>
                                <th class="text-center">Order ID</th>
                                <th>Product Name</th>
                                <th>Order Date</th>
                                <th>Due On</th>
                                <th>Price</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach($progress as $row)
                                @php
                                    $timestamp = strtotime($row->order_date);

                                    $order_date = date('d-m-Y', $timestamp);
                                    $time = strtotime($row->due_on);

                                    $due_on = date('d F', $time);
                                    @endphp
                                <tr>
                                    <td class="text-center">{{$row->id}}</td>

                                    <td>{{\App\Models\Course::getProductFullname($row->product_id)}}</td>
                                    <td>{{ $order_date }}</td>
                                        <td>{{$due_on}}</td>
                                        <td>{{ $row->payment_amount }} </td>
                                        <td><?php
                                            if ($row->status == "progress") {
                                            ?>
                                                <p style="color: purple;">In Progress</p>
                                            <?php
                                            } elseif($row->status == "completed"){
                                                echo "<p style='color: green'>Completed</p>";
                                            }else{
                                                echo "<p style='color: red'>Cancelled</p>";
                                            }
                                            ?>


                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- Completed orders -->
    <div>
        <div class="flex">
            <div class="content">
                <h1>Completed Orders</h1>
                <a class="btn-view" href="{{url('CompletedOrders')}}">View All</a>
            </div>
        </div>
        <div class="display">
            <div class="activity">
                <div class="activity-data">
                <table class="table table-borderless table-active" style="background-color: #EFF0FF;">
                        <tr class="table-secondary">
                            <thead>
                                <th class="text-center">Order ID</th>
                                <th>Product Name</th>
                                <th>Order Date</th>
                                <th>Due On</th>
                                <th>Price</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($completed as $row)
                                @php
                                    $timestamp = strtotime($row->order_date);

                                    $order_date = date('d-m-Y', $timestamp);
                                    $time = strtotime($row->due_on);

                                    $due_on = date('d F', $time);
                                    @endphp
                                <tr>
                                    <td class="text-center">{{$row->id}}</td>

                                    <td>{{\App\Models\Course::getProductFullname($row->product_id)}}</td>
                                    <td>{{ $order_date }}</td>
                                        <td>{{$due_on}}</td>
                                        <td>{{ $row->payment_amount }} </td>
                                        <td><?php
                                            if ($row->status == "progress") {
                                            ?>
                                                <p style="color: purple;">In Progress</p>
                                            <?php
                                            } elseif($row->status == "completed"){
                                                echo "<p style='color: green'>Completed</p>";
                                            }else{
                                                echo "<p style='color: red'>Cancelled</p>";
                                            }
                                            ?>


                                        </td>
                                </tr>
                                @endforeach
                            </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Cancelled orders -->
    <div>
        <div class="flex">
            <div class="content">
                <h1>Cancelled Orders</h1>
                <a class="btn-view" href="{{url('CancelledOrders')}}">View All</a>
            </div>
        </div>
        <div class="display">
            <div class="activity">
                <div class="activity-data">
                <table class="table table-borderless table-active" style="background-color: #EFF0FF;">
                        <tr class="table-secondary">
                            <thead>
                                <th class="text-center">Order ID</th>
                                <th>Product Name</th>
                                <th>Order Date</th>
                                <th>Due On</th>
                                <th>Price</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach($cancel as $row)
                                @php
                                    $timestamp = strtotime($row->order_date);

                                    $order_date = date('d-m-Y', $timestamp);
                                    $time = strtotime($row->due_on);

                                    $due_on = date('d F', $time);
                                    @endphp
                                <tr>
                                    <td class="text-center">{{$row->id}}</td>

                                    <td>{{\App\Models\Course::getProductFullname($row->product_id)}}</td>
                                    <td>{{ $order_date }}</td>
                                        <td>{{$due_on}}</td>
                                        <td>{{ $row->payment_amount }} </td>
                                        <td><?php
                                            if ($row->status == "progress") {
                                            ?>
                                                <p style="color: purple;">In Progress</p>
                                            <?php
                                            } elseif($row->status == "completed"){
                                                echo "<p style='color: green'>Completed</p>";
                                            }else{
                                                echo "<p style='color: red'>Cancelled</p>";
                                            }
                                            ?>


                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</main>
@endsection
