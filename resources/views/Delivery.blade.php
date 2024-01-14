@extends('master')
@section('title')
Delivery
@endsection
@section('content')
<main>
      <!-- Detailes -->
      <article>
        <div class="welcome">
          <h2>Order Activity</h2>
        </div>
        <!-- links -->
        <div class="links">
          <li><a class="link " href="ActivityOrder"> Activity</a></li>
          <li><a class="link " href="Details">Details</a></li>
          <li><a class="link active" href="Delivery"> Delivery</a></li>
        </div>
      </article>
      <!-- Delivery -->
      <div class="delivery-container">
        <article class="Delivery">
            @if(!empty($check))
            @if($check->status=="progress")
          <div class="Delivery-box1">
            <img src="images/box.png" alt="" width="100px">
            <h2>The best things are worth the wait we should deliver this order by  <?php
            
            if (!empty($check->due_on)) {
                 $time = strtotime($check->due_on);
                echo  $order_date = date('d F Y', $time);
                    }
            
               
                ?>

               </h2>
          </div>
          @elseif($check->status=="completed")
          <div class="Delivery-box2">
            <img src="images/done.png" alt="" width="100px">
            <h2>Your Order was Complete</h2>
          </div>
          @else
          <div class="Delivery-box3">
            <h2>You don't have order</h2>
          </div>
          @endif
         
           
          @endif
           @if(empty($check))
           <div class="Delivery-box3">
            <h2>You don't have order</h2>
          </div>
            @endif
        </article>
      </div>

    </main>
@endsection
