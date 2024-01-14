@extends('master')
@section('title')
Machine
@endsection
@section('content')
<section id="section">
      <article class="main">
        <!-- background -->
        <div class="section1">
          <div>
            <img src="images/1.png" alt="bg">
          </div>
        </div>
        <!-- input and text -->
        </div>
        <div class="section2">
          <div class="box-contain">
    <div class="content">
        <p></p>
        <input type="text" id="searchInput" placeholder="Search" oninput="searchMachineLearningCourses()">
    </div>
    <!-- Box -->
    <div id="machineLearningCoursesList">
        @foreach($machines as $row)
            <div class="box">
                <div class="logo-name">
                    <img src="images/logo.png" alt="">
                    <h1 class="logo_name">{{$row->course_name}}</h1>
                </div>
                <div class="text">
                    <p>{!!stripslashes($row->description)!!}</p>
                    <div class="btns">
                        <a href="#" class="btn">python</a>
                        <a href="{{ url('PurchaseMachine', ['id' => $row->id]) }}" class="btn">Purchase now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function searchMachineLearningCourses() {
        var input, filter, machineLearningCoursesList, boxes, box, name, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        machineLearningCoursesList = document.getElementById("machineLearningCoursesList");
        boxes = machineLearningCoursesList.getElementsByClassName("box");

        for (i = 0; i < boxes.length; i++) {
            box = boxes[i];
            name = box.getElementsByClassName("logo_name")[0];
            txtValue = name.textContent || name.innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                box.style.display = "";
            } else {
                box.style.display = "none";
            }
        }
    }
</script>

            
           
            
            
           
           
            <!-- pagination -->
            <div class="pagination">
              
              @include('admin.pagination', ['paginator' => $machines]) 
            </div>
          </div>
        </div>
      </article>
    </section>
@endsection