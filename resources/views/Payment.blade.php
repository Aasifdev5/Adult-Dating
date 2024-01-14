@extends('master')
@section('title')
Payment
@endsection
@section('content')
<main>
      <div class="welcome">
        <h2>Balance</h2>
      </div>
      <!-- links -->
      <div class="links">
        <li><a class="link active" href="Payment">Balance</a></li>
        <li><a class="link" href="AddFunds">Add Funds</a></li>
        <li><a class="link" href="WithdrawFunds">Withdraw Funds</a></li>
      </div>
      <!-- In Progress orders -->
      <div>
        <div class="display">
          <div class="box-payment">
            <div class="container">
              <h1>Total Balance</h1>
              <p> {{$user_session->balance}} $</p>
              <a class="funds-btn" href="AddFunds">Add Funds</a>
            </div>
          </div>
        </div>
    </main>
@endsection
