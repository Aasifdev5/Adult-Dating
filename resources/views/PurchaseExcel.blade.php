@extends('master')
@section('title')
{{$PurchaseProject->course_name}}
@endsection
@section('content')
<section id="section">
    <article class="Purchase Purchasefont">
        <h1>{{$PurchaseProject->course_name}}</h1>
        <!-- background -->
        <div class="Purchasebg">
            @if(!empty($PurchaseProject->course_photo))
            <img src="{{asset('product_photo/')}}<?php echo '/' . $PurchaseProject->course_photo; ?>" alt="bg">
            @else
            <img src="{{asset('images/1.4.png')}}" alt="bg">
            @endif

        </div>

        <div class="content Purchasesection ">
            <form method="post" action="{{url('purchase')}}" id="myForm" enctype="multipart/form-data">
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
                <input type="hidden" name="product_id" value={{$PurchaseProject->id}} />
                <input type="hidden" name="user_id" value="{{$user_session->id}}">
                <div class="title">
                    <h4 style="font-weight: bold;"> Product Information</h4>
                </div>
                <div class="user-details">
                    <div class="input-box">
                        <span class=" Material">Type of Project</span>
                        <input type="value" placeholder="Enter Type of Project" value="{{old('project_type')}}" name="project_type">
                        <p class="text-danger">@error ('project_type'){{$message}} @enderror</p>
                    </div>
                    
                    <div class="input-box">
                        <span class=" Material">Subject of Project</span>
                        <input type="Valeu" placeholder=" Enter Subject of Project" value="{{old('project_subject')}}" name="project_subject">
                        <p class="text-danger">@error ('project_subject'){{$message}} @enderror</p>
                    </div>
                    <div class="input-box">
                        <span class=" Material">Project Details</span>
                        <textarea name="project_details" rows="6" cols="50" value="{{old('project_details')}}" placeholder="Enter Project Details"></textarea>
                        <p class="text-danger">@error ('project_details'){{$message}} @enderror</p>
                    </div>
                    <span class="details Material">Material</span>
                    <div class="uploader" id="uploader">
    <div class="drop-area" id="dropArea">
        <p id="dropText">Drag and drop files <span>or Browse files</span></p>
        <p class="Material">Maximum file size 100 MB</p>
        <input type="file" id="fileInput" name="material_file" style="display: none;">
        <div id="fileInfo" style="display: none;"></div>
    </div>
</div>

<script>
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const dropText = document.getElementById('dropText');
    const fileInfo = document.getElementById('fileInfo');

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('drag-over');
        dropText.innerText = 'Release to upload';
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('drag-over');
        dropText.innerText = 'Drag and drop files or Browse files';
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('drag-over');
        dropText.innerText = 'Drag and drop files or Browse files';

        const files = e.dataTransfer.files;
        fileInput.files = files;

        // Display file information
        fileInfo.innerText = `File: ${files[0].name}, Size: ${formatBytes(files[0].size)}`;
        fileInfo.style.display = 'block';

        // You can trigger your form submission or any other logic here
    });

    fileInput.addEventListener('change', () => {
        // Display file information
        fileInfo.innerText = `File: ${fileInput.files[0].name}, Size: ${formatBytes(fileInput.files[0].size)}`;
        fileInfo.style.display = 'block';

        // You can handle file selection from the file input here
    });

    // Function to format file size for better readability
    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';

        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        const i = Math.floor(Math.log(bytes) / Math.log(k));

        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }
</script>

                </div>


        </div>
    </article>
    <!-- Package Pricing -->
    <article class="heading-table">
        <div class="head">
            <h4> Project Packages
            </h4>
        </div>
        <div class="mainbox container-fluid mt-lg-2">
            <div class="row">
                <div class="table-responsive-md">
                    <table class="table caption-top">
                        <thead style="border-bottom: 3px solid #000;">
                            <tr>
                                <th scope="col">Packages</th>
                                <th scope="col" value="100">50$
                                    Basic</th>
                                <th scope="col" value="140">100$
                                    Standard</th>
                                <th scope="col" value="200">200$
                                    Premium</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Software</th>
                                <td>Excel</td>
                                <td>Excel</td>
                                <td>Excel</td>
                            </tr>
                            <tr>
                                <th scope="row">Graph / Charts</th>
                                <td>2</td>
                                <td>5</td>
                                <td>7</td>
                            </tr>
                            <tr>
                                <th scope="row">Web embedding</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Data source connectivity</th>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Interactive visuals</th>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Presentation</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Dashboards</th>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <th scope="row">Revisions</th>
                                <td>Unlimited</td>
                                <td>Unlimited</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <th scope="row">Delivery Time*</th>
                                <td>3 Days*</td>
                                <td>5 Days*</td>
                                <td>7 Days*</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <style>
                                        /* Set the background color with transparency */
                                        input.transparent-input {
                                            background: none;
                                            /* Set background to none (transparent) */
                                            border: none;
                                            /* Remove border */
                                            outline: none;
                                            /* Remove outline */
                                            width: 45px;
                                            color: #fff;
                                            padding: 5px;
                                            /* Adjust padding as needed */
                                        }
                                    </style>
                                    <button type="button" class="btn button" onclick="setValueAndSubmit('50')"> Basic 50$</button>
                                </td>
                                <td>

                                    <button type="button" class="btn button" onclick="setValueAndSubmit('100')"> Standard 100$</button>
                                </td>
                                <td>
                                    <button type="button" class="btn button" onclick="setValueAndSubmit('200')"> Premium 200$</button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




        <!-- Hidden inputs to capture the selected value and name -->
        <input type="hidden" id="selected_value" name="Examount">

        <script>
            function setValueAndSubmit(value) {
                document.getElementById('selected_value').value = value;

                document.getElementById('myForm').submit();
            }
        </script>
        <!-- Tablet & Mobile Responsive -->

        <div class="main_con container-fluid w-100 mb-lg-3">
            <div class="wrapper">
                <input type="radio" name="slider" id="tab-1" checked="">
                <input type="radio" name="slider" id="tab-2">
                <input type="radio" name="slider" id="tab-3">
                <summary>
                    <label for="tab-1" class="tab-1">BASIC</label>
                    <label for="tab-2" class="tab-2">STANDARD</label>
                    <label for="tab-3" class="tab-3">PREMIUM</label>
                    <div class="slider"></div>
                </summary>
                <div class="card-area">
                    <div class="cards">
                        <div class="row row-1">
                            <div class="price-details">
                                <span class="price">$50</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Excel Software</span></li>
                                    <li><i class="fas fa-check"></i><span>2 Charts</span></li>
                                    <!-- <li><i class="fas fa-check"></i><span>Web embedding</span></li> -->
                                    <li><i class="fas fa-check"></i><span>Data source</span></li>
                                    <li><i class="fas fa-check"></i><span>Interactive visuals</span></li>
                                    <!-- <li><i class="fas fa-check"></i><span>Presentation</span></li> -->
                                    <li><i class="fas fa-check"></i><span> 1 Dashboards</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 3 Days*</span></li>
                                </ul>

                                <button type="button" class="btn button" onclick="MsetValueAndSubmit('50')"> Basic 50$</button>

                            </div>
                        </div>




                        <div class="row">
                            <div class="price-details">
                                <span class="price">$100</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Excel Software</span></li>
                                    <li><i class="fas fa-check"></i><span>5 Charts</span></li>
                                    <li><i class="fas fa-check"></i><span>Web embedding</span></li>
                                    <li><i class="fas fa-check"></i><span>Data source</span></li>
                                    <li><i class="fas fa-check"></i><span>Interactive visuals</span></li>
                                    <!-- <li><i class="fas fa-check"></i><span>Presentation</span></li> -->
                                    <li><i class="fas fa-check"></i><span> 1 Dashboards</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 5 Days*</span></li>
                                </ul>

                                <button type="button" class="btn button" onclick="MsetValueAndSubmit('100')"> STANDARD 100$</button>

                            </div>
                        </div>



                        <div class="row">
                            <div class="price-details">
                                <span class="price">$200</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Excel Software</span></li>
                                    <li><i class="fas fa-check"></i><span>7 Charts</span></li>
                                    <li><i class="fas fa-check"></i><span>Web embedding</span></li>
                                    <li><i class="fas fa-check"></i><span>Data source</span></li>
                                    <li><i class="fas fa-check"></i><span>Interactive visuals</span></li>
                                    <li><i class="fas fa-check"></i><span>Presentation</span></li>
                                    <li><i class="fas fa-check"></i><span> 1 Dashboards</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 7 Days*</span></li>
                                </ul>

                                <button type="button" class="btn button" onclick="MsetValueAndSubmit('200')"> PREMIUM 200$</button>

                            </div>
                        </div>
                    </div>
                    <!-- Hidden inputs to capture the selected value and name -->
                    <input type="hidden" id="mselected_value" name="MExamount">

                    <script>
                        function MsetValueAndSubmit(value) {
                            document.getElementById('mselected_value').value = value;

                            document.getElementById('myForm').submit();
                        }
                    </script>
                </div>
            </div>
        </div>
        </form>
    </article>
    <!-- information of packages -->
    <article>
        <div class="columns-info section2">
            <ul class="info">
                <li><i class="fa-solid fa-star" style="color: #EDB954;"></i><span> Exclude weekend days.</li>
            </ul>
        </div>
    </article>
    <!-- FAQs -->
    <article class="section2">
        <h3 class="faq" style="font-weight: bold;">FAQs</h3>
        <div class="questions">
            <details class="details">
                <summary class="summary">
                    What are the things required from the client?
                </summary>
                <p>
                    Proper detailed requirements and data source information or file (.csv, excel, XML, other).
                </p>
            </details>
            <details class="details">
                <summary class="summary">
                    Do you provide remote support?
                </summary>
                <p>
                    Yes, I provide remote support upon request. What level of detail do you provide in your reports?
                </p>
            </details>
        </div>
    </article>
</section>
@endsection
