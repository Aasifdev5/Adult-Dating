@extends('master')
@section('title')
Details
@endsection
@section('content')
<main>
    <article>
        <div class="welcome">
            <h2>Order Activity</h2>
        </div>
        <!-- links -->
        <div class="links">
            <li><a class="link" href="ActivityOrder"> Activity</a></li>
            <li><a class="link active" href="Details">Details</a></li>
            <li><a class="link" href="Delivery"> Delivery</a></li>
        </div>
        <!-- In Progress orders -->
        <div>
            <div>
                <div class="data-activity">
                    <h2><i style="padding-right: 10px;" class="fa-solid fa-arprogress-up-right-dots"></i>Sales Analysis</h2>
                    <div class="activity-details">
                        <p class="sign">Order From <span class="highlight"> <?php
                                                                            if (!empty($progress->order_date)) {
                                                                                $time = strtotime($progress->order_date);
                                                                                echo  $order_date = date('d F Y', $time);
                                                                            }

                                                                            ?>

                            </span></p>
                        <p class="sign"> & Delivery Date <?php

                                                            if (!empty($progress->due_on)) {
                                                                $time = strtotime($progress->due_on);
                                                                echo  $due_on = date('d F Y', $time);
                                                            }
                                                            ?>

                        </p>
                        <p>Order Number # @if(!empty($progress->id)) {{$progress->id}} @endif</p>
                        <p>Work Should be Complete on <span class="bold"><?php
                                                                            if (!empty($progress->due_on)) {
                                                                                $time = strtotime($progress->due_on);
                                                                                echo  $due_on = date('d F Y', $time);
                                                                            }
                                                                            ?>

                            </span></p>
                        <p>Your order <?php
                                        if (!empty($progress->order_date)) {
                                            $time = strtotime($progress->order_date);
                                            echo  $order_date = date('d F Y', $time);
                                        }
                                        ?>

                        </p>
                    </div>
                </div>
    </article>



    <div class="display">
        <div class="activity">
            <div class="activity-data">
                <table class="table table-borderless table-active" style="background-color: #EFF0FF;">
                    <tr class="table-secondary">
                        <thead>

                            <th>Item</th>
                            <!--<td>Qty</td>-->
                            <th>Duration</th>
                            <th>Price</th>

                        </thead>
                        <tbody>

                            @if(!empty($progress))
                            <tr>

                                <td>{{\App\Models\Course::getProductFullname($progress->product_id)}}</td>
                                <!--<td>1</td>-->
                                <td>{{$progress->duration}} Days</td>
                                <td>{{ $progress->payment_amount }} </td>

                            </tr>
                            @endif
                        </tbody>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <div class="paragraph">
        <p>If something Appears to be missing or incorrect, Please contactwith our customer support team</p>
    </div>
</main>
@endsection
