@extends('master')
@section('title')
Withdraw Funds
@endsection
@section('content')
<main>
      <div class="welcome">
        <h2>Withdraw Funds</h2>
      </div>
      <!-- links -->
      <div class="links">
        <li><a class="link" href="Payment">Balance</a></li>
        <li><a class="link " href="AddFunds">Add Funds</a></li>
        <li><a class="link active" href="WithdrawFunds">Withdraw Funds</a></li>
      </div>

      <!-- In funds -->
      <!-- <div class="welcome">
        <h2 style="margin-top: 20px;">Withdraw Funds</h2>
        <p style="margin-top: 10px;">Select payment method</p>
      </div>
      <article>
        <div class="funds">
          <div class="box-funds">
            <p>Bank Card</p>
            <div class="flex">
              <p>$100</p>
            </div>
          </div>
          <div class="box-funds">
            <p>PayPal</p>
            <div class="flex">
              <img src="images/paypal.png" alt="">
            </div>
          </div>
        </div>
        <p style="margin-top: 15px;font-weight: bold;padding-left: 20px;">Payment Processed by Ecommpay </p>
      </article> -->

      <!-- Payment options -->
     <form method="post"  action="{{url('save_withdraw')}}">
                @if(Session::has('success'))
                <div class="alert alert-success" style="background-color: green;">
                    <p style="color: #fff;">{{session::get('success')}}</p>
                </div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger" style="background-color: red;">
                    <p style="color: #fff;">{{session::get('fail')}}</p>
                </div>
                @endif
                @csrf
                
                <input type="hidden" name="user_id" value="{{$user_session->id}}">
      <!-- Information payment -->
      <center>
          <article class="info-payment">
        <div class="welcome">
          <h3></h3>
          <div class="flex" style="justify-content: center;">
            <input class="add-input" type="text" name="amount" required placeholder="USD">
            <div style="padding-left: 15px;">
              <button type="submit" class="submit">Withdraw Money</button>
            </div>
          </div>
        </div>

        <div class="Purchase" style="padding-left: 15px;">
          <div class="checkbox">
            <input type="checkbox" required>
            <label style="font-size:13px;font-weight: 700;" for="checkbox">I agree with <span
                style="color: #00A3E8;">terms and
                conditions</span></label>
          </div>
          </form>
        </div>
      </article>
      </center>
      
    </main>
@endsection