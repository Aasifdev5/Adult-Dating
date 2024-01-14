@extends('master')
@section('title')
Activity Order
@endsection
@section('content')
<main>
      <article>
        <div class="welcome">
          <h2>Order Activity</h2>
        </div>
        <!-- links -->
        <div class="links">
          <li><a class="link active" href="ActivityOrder"> Activity</a></li>
          <li><a class="link" href="Details">Details</a></li>
          <li><a class="link" href="Delivery"> Delivery</a></li>
        </div>

        <div class="data-activity">

          <div class="activity-details">
            <!-- <p class="sign">Order From <span class="highlight">Raheel</span></p>
            <p class="sign">Delivery Date July 24, 4:56 am</p> -->
            <div>
              <p>your order is now in the works</p>
              <p>we notified you when order complete</p>
              <p>you should receive delivery by <span class="bold">
                <?php
                if(!empty($progress->due_on)){
                    $time = strtotime($progress->due_on);
                  echo  $due_on = date('d F Y', $time);
                }

                ?>

               </span> </p>
            </div>
          </div>
        </div>
      </article>

    </main>
@endsection
