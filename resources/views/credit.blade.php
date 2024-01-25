@extends('master')
@section('title')
Credits Buy
@endsection
@section('content')

<main>

    <hr class="my-2">


    <div class="container">
        <div class="row">
            @foreach($credits as $index => $row)
            <div class="col-md-6 frb frb-info">
                <input id="availabilityCheckbox_{{ $index }}" type="checkbox" value="">
                <label for="availabilityCheckbox_{{ $index }}">
                    <div class="card-body">
                        <h5 class="pricing-card-title mb-0 pacchetti">{{ $row->name }}</h5>
                        <div>
                            <small class="text-muted info pl-4">Discount Percentage : {{$row->discount_percentage}}</small>
                        </div>
                        <span class="text-muted price">Amount :${{ $row->amount }}</span>
                        <div class="form-group mt-4 mb-2">
                            <div class="mt-0 mb-2">
                                <span class="text-muted day">Discounted Amount : ${{ $row->discounted_amount }}</span>
                            </div>
                        </div>

                        <!-- Pay with Stripe button without style="display:none;" -->
                        <a href="{{ url('credit_buy_details', $row->id) }}" id="stripeButton_{{ $index }}" class="btn btn-primary pull-right">
                            Pay
                        </a>


                        <!-- Rest of the code... -->
                    </div>
                </label>
            </div>
            @endforeach


        </div>
    </div>

    <div class="container mt-5">
        <div class="card">

        </div>
    </div>
</main>
@endsection
