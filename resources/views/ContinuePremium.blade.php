@extends('master')
@section('title')
Premium
@endsection
@section('content')
<section id="section">
      <article class="Purchase Purchasefont">
        <div class="content Purchasesection ">
          <form>
            <div class="title">
              <h4> Billing Information</h4>
            </div>
            <div class="user-details">
              <div class="input-box">
                <span class=" Material">Full name</span>
                <input type="value" placeholder="Enter Your Name" name="Choose_data" required>
              </div>
              <div class="input-box">
                <span class=" Material">Company Name</span>
                <input type="Valeu" placeholder="Enter Company Name " name="Choose_data" required>
              </div>
              <div class="input-box">
                <span class=" Material">Country</span>
                <input type="Valeu" placeholder="Enter Your Country" name="Choose_data" required>
              </div>
              <div class="input-box">
                <span class=" Material">State/Province/Territory</span>
                <input type="Valeu" placeholder="Enter State/Province/Territory" name="Choose_data" required>
              </div>
              <div class="input-box">
                <span class=" Material">Address</span>
                <input type="Valeu" placeholder="Enter The Address" name="Choose_data" required>
              </div>


            </div>
          </form>

        </div>
      </article>
      <!-- Payment Options -->
      <article class="Purchase">
        <div class="container Purchasesection">
          <h4 style="font-size: 25px;">Payment Options
          </h4>
          
          <div class="checkbox">
            <input type="radio">
            <label for="checkbox"><img src="images/paypal.png" alt=""></label>
          </div>
          <div class="checkbox">
            <input type="radio">
            <label for="checkbox">Credit & Debit Cards</label>
          </div>

          <div class="images">
            <a href="#"><img src="images/visa.png" alt="Visa"></a>
            <a href="#"><img src="images/mastercard.png" alt="MasterCard"></a>

            <a href="#"><img src="images/jcb.png" alt="jcb"></a>
            <a href="#"> <img src="images/maestro.png" alt="maestro"></a>
          </div>

          <div class="input-group">
            <input type="text" placeholder="Card Number" maxlength="14">
            <input type="text" placeholder="Security Code" maxlength="3">
          </div>
          <div class="input-group">
            <input type="text" placeholder="Expiration (mm/yy)">
            <input type="text" placeholder="Name">
          </div>
        </div>
      </article>

      <!-- Diposet -->
      <article class="Purchase">
        <div class="box Purchasesection">
          <div class="flex">
            <img src="images/1.9.png" alt="">
            <h1>Machine Learning Project</h1>
          </div>
          <div class="flextext">
            <h2>Premium</h2>
            <h2>200$</h2>
          </div>
          <div class="flex">
            <p>Enter Promo Code</p>
            <input type="text">
          </div>
          <div class="flextext">
            <h2>Services Fee</h2>
            <h2>50$</h2>
          </div>
          <div class="flextext">
            <h2>Total</h2>
            <h2>400$</h2>
          </div>
          <div class="flextext">
            <h2>Total Delivery Time</h2>
            <h2>7 Day</h2>
          </div>
          <button>Diposet</button>
        </div>
      </article>
    </section>
@endsection