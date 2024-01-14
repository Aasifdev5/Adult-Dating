@extends('master')
@section('title')
Activity
@endsection
@section('content')
<main>
      <article>
        <div class="welcome">
          <h2>Order Activity</h2>
        </div>
        <!-- links -->
        <div class="links">
          <li><a class="link active" href="Activity"> Activity</a></li>
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
              <p>you should receive delivery by <span class="bold">July 25, 4:30 pm</span> </p>
            </div>
          </div>
        </div>
      </article>
      <!-- chat box  -->
      <article>
        <div class="container">
          <div class="chat">
            <div class="chat-header">
              <div class="profile">
                <div class="left">
                  <!-- <img src="images/imgchat/arrow.png" class="arrow"> -->
                  <img src="images/profile photo.png" class="pp">
                  <h2>Admin</h2>
                  <span>35 minutes ago</span>
                </div>
                <div class="right">

                  <img src="images/imgchat/phone.png" class="icon">
                  <img src="images/imgchat/more.png" class="icon">
                </div>
              </div>
            </div>
            <div class="chat-box">
              <div class="chat-r">
                <div class="sp"></div>
                <div class="mess mess-r">
                  <p>
                    Lorem ipsum dolor sit amet consectetur. Adipiscing.
                  </p>
                  <div class="check">
                    <span>27 Jul 2023, 0:10</span>
                    <img src="images/imgchat/check-2.png">
                  </div>
                </div>
              </div>
              <div class="chat-l">
                <div class="mess">
                  <p>
                    Lorem ipsum dolor sit amet consectetur. Adipiscing.

                  </p>
                  <div class="check">
                    <span>27 Jul 2023, 0:10</span>
                  </div>
                </div>
                <!-- <div class="sp"></div> -->
              </div>

              <div class="chat-r">
                <div class="sp"></div>
                <div class="mess mess-r">
                  <p>
                    Lorem ipsum dolor sit amet consectetur. Adipiscing.
                  </p>
                  <div class="check">
                    <span>27 Jul 2023, 0:10</span>
                    <img src="images/imgchat/check-2.png">
                  </div>
                </div>
              </div>
              <div class="chat-l">
                <div class="mess">
                  <p>Lorem ipsum dolor sit amet consectetur. Adipiscing.</p>
                  <div class="check">
                    <span>27 Jul 2023, 0:10</span>
                  </div>
                </div>
                <div class="sp"></div>
              </div>

              <div class="chat-footer">
                <img src="images/imgchat/emo.png" class="emo">
                <textarea placeholder="message"></textarea>
                <div class="icons">
                  <img src="images/imgchat/attach file.png">
                  <img src="images/imgchat/camera.png">
                </div>
                <img src="images/imgchat/mic.png" class="mic">
              </div>
            </div>
          </div>
      </article>
    </main>
@endsection