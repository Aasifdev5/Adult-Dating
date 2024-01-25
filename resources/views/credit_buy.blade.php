@extends('master')
@section('title')
Credits Buy Details
@endsection
@section('content')

<main>

    <hr class="my-2">


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buying Credits</h5>

                        <!-- Cart items go here -->
                        <div class="cart-item">
                            <div class="cart-item-details">
                                <h6 class="cart-item-title">{{ $credit->name }}</h6>
                                <p class="cart-item-price">${{ $credit->discounted_amount }}</p>
                            </div>
                        </div>

                        <div class="cart-total mt-4">
                            <h6>Total: ${{ $credit->discounted_amount }}</h6>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>

                        <!-- Order summary details go here -->
                        <p>Subtotal: ${{ $credit->discounted_amount }}</p>

                        <hr>
                        <h6>Total: ${{ $credit->discounted_amount }}</h6>

                        <!-- Dummy Bank Details -->
                        <div class="mt-3">
                            <h6>Bank Details</h6>
                            <p>Bank: Dummy Bank</p>
                            <p>Account Number: 1234567890</p>
                            <p>IFSC Code: DUMMY123</p>
                        </div>

                        <!-- Dummy QR Code -->
                        <div class="mt-3">
                            <h6>Scan QR Code</h6>
                            <img src="path/to/dummy_qr_code.png" alt="QR Code" class="img-fluid">
                        </div>

                        <!-- Checkout button -->
                        <button class="btn btn-success btn-block mt-3">Checkout</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="container mt-5">
        <div class="card">

        </div>
    </div>
</main>
@endsection
