@extends('master')
@section('title')
Data Visualization
@endsection
@section('content')
<section id="section">
      <article class="main">
        <!-- background -->
        <div class="section1">
          <div>
            <img src="images/6.png" alt="bg">
          </div>
        </div>
        <!-- input and text -->

        </div>
        <div class="section2">
          <div class="box-contain">
    <div class="content">
        <p></p>
        <input type="text" id="searchInput" placeholder="Search" oninput="searchDataVisualizations()">
    </div>
    <!-- Box -->
    <div id="dataVisualizationsList">
        @foreach($data_visualization as $row)
            <div class="box">
                <div class="logo-name">
                    <img src="images/logo.png" alt="">
                    <h1 class="logo_name">{{$row->course_name}}</h1>
                </div>
                <div class="text">
                    <p>{!!stripslashes($row->description)!!}</p>
                    <div class="btns">
                        <a href="#" class="btn">python</a>
                        <a href="{{ url('PurchaseExcel', ['id' => $row->id]) }}" class="btn">Purchase now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function searchDataVisualizations() {
        var input, filter, dataVisualizationsList, boxes, box, name, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        dataVisualizationsList = document.getElementById("dataVisualizationsList");
        boxes = dataVisualizationsList.getElementsByClassName("box");

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

            

            <div class="pagination">
              
              @include('admin.pagination', ['paginator' => $data_visualization]) 
            </div>
      </article>
    </section>
  </section>
@endsection