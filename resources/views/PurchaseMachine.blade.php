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
            <img src="{{asset('images/1.1.png')}}" alt="bg">
            @endif
        </div>

        <div class="content Purchasesection ">
            <form method="post" id="myForm" action="{{url('purchase')}}" enctype="multipart/form-data">
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
                                <th scope="col" value="100">80$
                                    Basic</th>
                                <th scope="col" value="140">120$
                                    Standard</th>
                                <th scope="col" value="200">160$
                                    Premium</th>
                            </tr>
                        </thead style="border-bottom: 3px solid #000;">
                        <tbody>
                            <tr>
                                <th scope="row">Software</th>
                                <td>Python-Jupiter
                                    notebook</td>
                                <td>Python-Jupiter
                                    notebook</td>
                                <td>Python-Jupiter
                                    notebook</td>
                            </tr>
                            <tr>
                                <th scope="row">Questions Writing</th>
                                <td>5 Queations*</td>
                                <td>10 Queations*</td>
                                <td>15 Queations*</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of words</th>
                                <td>2000 Words**</td>
                                <td>5000 Words**</td>
                                <td>8000 Words**</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Pages</th>
                                <td>6 Pages</td>
                                <td>15 Pages</td>
                                <td>24 Pages</td>
                            </tr>
                            <tr>
                                <th scope="row">Topic Research</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Plagiarism Check</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Visualize Result</th>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Source Code</th>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Build a Documented
                                    Baseline Model</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Add Second Model</th>
                                <td>
                                    <select class="form-select form-select-md w-75 first_col" name="bsecondmodel" onchange="calculateTotal('total1')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60" id="t_1">Time Series (60 )</option>
                                        <option value="80" id="t_1">Machine Learning (80 )</option>
                                        <option value="100" id="t_1">Deep Learning (100 )</option>
                                        <option value="100" id="t_1">Hybrid (100 )</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 fourth_col" name="ssecondmodel" onchange="calculateTotal2('total2')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60" id="t_1">Time Series (60 )</option>
                                        <option value="80" id="t_1">Machine Learning (80 )</option>
                                        <option value="100" id="t_1">Deep Learning (100 )</option>
                                        <option value="100" id="t_1">Hybrid (100 )</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 seventh_col" name="psecondmodel" onchange="calculateTotal3('total3')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60" id="t_1">Time Series (60 )</option>
                                        <option value="80" id="t_1">Machine Learning (80 )</option>
                                        <option value="100" id="t_1">Deep Learning (100 )</option>
                                        <option value="100" id="t_1">Hybrid (100 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Name Model</th>
                                <td><input type="text" aria-label="Name the Model" class="form-control w-75"></td>
                                <td><input type="text" aria-label="Name the Model" class="form-control w-75"></td>
                                <td><input type="text" aria-label="Name the Model" class="form-control w-75"></td>
                            </tr>
                            <tr>
                                <th scope="row">Add Third Model</th>
                                <td>
                                    <select class="form-select form-select-md w-75 second_col" name="bthirdmodel" onchange="calculateTotal('total1')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60">Time Series (60 $)</option>
                                        <option value="80">Machine Learning (80 $)</option>
                                        <option value="100">Deep Learning (100 $)</option>
                                        <option value="100">Hybrid (100 $)</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 fifth_col" name="sthirdmodel" onchange="calculateTotal2('total2')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60">Time Series (60 $)</option>
                                        <option value="80">Machine Learning (80 $)</option>
                                        <option value="100">Deep Learning (100 $)</option>
                                        <option value="100">Hybrid (100 $)</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 eighth_col" name="pthirdmodel" onchange="calculateTotal3('total3')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60" id="t_1">Time Series (60 )</option>
                                        <option value="80" id="t_1">Machine Learning (80 )</option>
                                        <option value="100" id="t_1">Deep Learning (100 )</option>
                                        <option value="100" id="t_1">Hybrid (100 )</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Name Model</th>
                                <td><input type="text" aria-label="Name the Model" class="form-control w-75"></td>
                                <td><input type="text" aria-label="Name the Model" class="form-control w-75"></td>
                                <td><input type="text" aria-label="Name the Model" class="form-control w-75"></td>
                            </tr>
                            <tr>
                                <th scope="row">Dashboard</th>
                                <td>
                                    <select class="form-select form-select-md w-75 third_col" name="bdashboard" onchange="calculateTotal('total1')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 sixth_col" name="sdashboard" onchange="calculateTotal2('total2')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 ninth_col" name="pdashboard" onchange="calculateTotal3('total3')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Revision</th>
                                <td>Unlimited</td>
                                <td>Unlimited</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <th scope="row">Delivery time</th>
                                <td>3 Days***</td>
                                <td>5 Days***</td>
                                <td>7 Days***</td>
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
             <button type="submit" class="btn button" onclick="setValueAndSubmit('80')" > Continue <input type="text" readonly placeholder="80" class="transparent-input" name="bamount"  id="total1" value="">$</button>
                                </td>
                                <td>

                                    <button type="submit" class="btn button" onclick="setValueAndSubmit('120')" > Continue <input type="text" readonly placeholder="120"  class="transparent-input" name="samount"  id="total2" value="">$</button>
                                </td>
                                <td>

                                    <button type="submit" class="btn button" onclick="setValueAndSubmit('160')"> Continue <input type="text" readonly placeholder="160"  class="transparent-input"  name="pamount" id="total3" value="">$</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<input type="hidden" id="selected_value" name="amount">

        <script>
         function setValueAndSubmit(value) {
                document.getElementById('selected_value').value = value;
// Set the input value to a hidden input field in the form
        document.getElementById('selected_value').value = inputValue;
                
            }
            // Function to calculate the total based on selected values for the first set
            function calculateTotal(totalId) {
                var firstValue = parseFloat(document.querySelector('.first_col').value);
                var secondValue = parseFloat(document.querySelector('.second_col').value);
                var thirdValue = parseFloat(document.querySelector('.third_col').value);

                // Check if values are valid numbers
                if (!isNaN(firstValue) && !isNaN(secondValue) && !isNaN(thirdValue)) {
                    var total = firstValue + secondValue + thirdValue + 80;
                    document.getElementById('total1').value = total;
                    // If you also want to update the content of an element with the specified totalId
                    document.getElementById(totalId).textContent = total;
                }
            }

            // Function to calculate the total based on selected values for the second set
            function calculateTotal2(totalId) {
                var fourthValue = parseFloat(document.querySelector('.fourth_col').value);
                var fifthValue = parseFloat(document.querySelector('.fifth_col').value);
                var sixthValue = parseFloat(document.querySelector('.sixth_col').value);

                // Check if values are valid numbers
                if (!isNaN(fourthValue) && !isNaN(fifthValue) && !isNaN(sixthValue)) {
                    var total = fourthValue + fifthValue + sixthValue + 120;
                    document.getElementById('total2').value = total;
                    document.getElementById(totalId).textContent = total;
                }
            }

            // Function to calculate the total based on selected values for the third set
            function calculateTotal3(totalId) {
                var seventhValue = parseFloat(document.querySelector('.seventh_col').value);
                var eighthValue = parseFloat(document.querySelector('.eighth_col').value);
                var ninthValue = parseFloat(document.querySelector('.ninth_col').value);

                // Check if values are valid numbers
                if (!isNaN(seventhValue) && !isNaN(eighthValue) && !isNaN(ninthValue)) {
                    var total = seventhValue + eighthValue + ninthValue + 160;
                    document.getElementById('total3').value = total;
                    document.getElementById(totalId).textContent = total;
                }
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
                                <span class="price">$80</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Python Jupiter Notebook </span></li>
                                    <li><i class="fas fa-check"></i><span>5 Questions* Written</span></li>
                                    <li><i class="fas fa-check"></i><span>6 Pages with 2000 words**</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualised Results</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 3 Days***</span></li>
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size: 15px;">Add Second
                                            Model</span>
                                    </li>
                                    <select class="form-select form-select-md  ten_col" name="mbsecond" onchange="McalculateTotal('total4')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60" id="t_1">Time Series (60 $)</option>
                                        <option value="80" id="t_1">Machine Learning (80 $)</option>
                                        <option value="100" id="t_1">Deep Learning (100 $)</option>
                                        <option value="100" id="t_1">Hybrid (100 $)</option>
                                    </select>
                                    <input type="text" aria-label="Name the Model" class="form-control  mt-2">
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size: 15px;">Add Third
                                            Model</span>
                                    </li>
                                    <select class="form-select form-select-md  eleven_col" name="mbthird" onchange="McalculateTotal('total4')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60">Time Series (60 $)</option>
                                        <option value="80">Machine Learning (80 $)</option>
                                        <option value="100">Deep Learning (100 $)</option>
                                        <option value="100">Hybrid (100 $)</option>
                                    </select>
                                    <input type="text" aria-label="Name the Model" class="form-control  mt-2">
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size:15px;">Select
                                            Dashboard</span>
                                    </li>
                                    <select class="form-select form-select-md  twelve_col" name="mbdashboard" onchange="McalculateTotal('total4')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </ul>
                                <button type="submit" class="btn button" onclick="MsetValueAndSubmit('80')"> Continue <input type="text" readonly placeholder="80" class="transparent-input" name="mbamount" id="total4" value="">$</button>

                            </div>
                        </div>





                        <div class="row">
                            <div class="price-details">
                                <span class="price">$120</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Python Jupiter Notebook </span></li>
                                    <li><i class="fas fa-check"></i><span>10 Questions* Written</span></li>
                                    <li><i class="fas fa-check"></i><span>15 Pages with 5000 words**</span></li>
                                    <li><i class="fas fa-check"></i><span>Get Researched Topic</span></li>
                                    <li><i class="fas fa-check"></i><span>Plagiarism Check</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualized Result</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 5 Days***</span></li>
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size: 15px;">Add Second
                                            Model</span>
                                    </li>
                                    <select class="form-select form-select-md  thirdteen_col" name="mssecond" onchange="McalculateTotal2('total5')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60" id="t_1">Time Series (60 $)</option>
                                        <option value="80" id="t_1">Machine Learning (80 $)</option>
                                        <option value="100" id="t_1">Deep Learning (100 $)</option>
                                        <option value="100" id="t_1">Hybrid (100 $)</option>
                                    </select>
                                    <input type="text" aria-label="Name the Model" class="form-control ">
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size: 15px;">Add Third Model</span>
                                    </li>
                                    <select class="form-select form-select-md  fourtheen_col" name="msthird" onchange="McalculateTotal2('total5')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60">Time Series (60 $)</option>
                                        <option value="80">Machine Learning (80 $)</option>
                                        <option value="100">Deep Learning (100 $)</option>
                                        <option value="100">Hybrid (100 $)</option>
                                    </select>
                                    <input type="text" aria-label="Name the Model" class="form-control ">
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size:15px;">Select Dashboard</span>
                                    </li>
                                    <select class="form-select form-select-md  fifteen_col" name="msdashboard" onchange="McalculateTotal2('total5')" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </ul>
                                <button type="submit" class="btn button" onclick="MsetValueAndSubmit('120')" > Standard <input type="text" readonly placeholder="120" class="transparent-input" name="msamount" id="total5" value="">$</button>

                            </div>
                        </div>



                        <div class="row">
                            <div class="price-details">
                                <span class="price">$160</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Python Jupiter Notebook </span></li>
                                    <li><i class="fas fa-check"></i><span>15 Questions* Written</span></li>
                                    <li><i class="fas fa-check"></i><span>24 Pages with 8000 words**</span></li>
                                    <li><i class="fas fa-check"></i><span>Get Researched Topic</span></li>
                                    <li><i class="fas fa-check"></i><span>Plagiarism Check</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualised Results</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 7 Days***</span></li>
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size: 15px;">Add Second
                                            Model</span>
                                    </li>
                                    <select class="form-select form-select-md  mt-2 mb-2 seventheen_col" name="mpsecond" aria-label="Large select example" onchange="McalculateTotal3('total6');" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60">Time Series (60 $)</option>
                                        <option value="80">Machine Learning (80 $)</option>
                                        <option value="100">Deep Learning (100 $)</option>
                                        <option value="500">Hybrid (100 $)</option>
                                    </select>
                                    <input type="text" aria-label="Name the Model" class="form-control ">
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size: 15px;">Add Third
                                            Model</span>
                                    </li>
                                    <select class="form-select form-select-md  mt-2 mb-2 eightheen_col" name="mpthird" aria-label="Large select example" onchange="McalculateTotal3('total6');" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Model</option>
                                        <option value="60">Time Series (60 $)</option>
                                        <option value="80">Machine Learning (80 $)</option>
                                        <option value="100">Deep Learning (100 $)</option>
                                        <option value="100">Hybrid (100 $)</option>
                                    </select>
                                    <input type="text" aria-label="Name the Model" class="form-control">
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size:15px;">Select
                                            Dashboard</span>
                                    </li>
                                    <select class="form-select form-select-md mt-2 mb-2 nintheen_col" name="mpdashboard" aria-label="Large select example" onchange="McalculateTotal3('total6');" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </ul>
                                <button type="submit" class="btn button" onclick="MsetValueAndSubmit('160')"> PREMIUM <input type="text" readonly placeholder="160" class="transparent-input" name="mpamount" id="total6" value="">$</button>

                            </div>
                            <input type="hidden" id="Mselected_value" name="Mamount">
                            <script>
                            function MsetValueAndSubmit(value) {
                document.getElementById('Mselected_value').value = value;
// Set the input value to a hidden input field in the form
        document.getElementById('Mselected_value').value = inputValue;
                
            }
                                // Function to calculate the total based on selected values for the first set
                                function McalculateTotal(totalId) {
                                    var firstValue = parseFloat(document.querySelector('.ten_col').value);
                                    var secondValue = parseFloat(document.querySelector('.eleven_col').value);
                                    var thirdValue = parseFloat(document.querySelector('.twelve_col').value);

                                    // Check if values are valid numbers
                                    if (!isNaN(firstValue) && !isNaN(secondValue) && !isNaN(thirdValue)) {
                                        var total = firstValue + secondValue + thirdValue + 80;
                                        document.getElementById('total4').value = total;
                                        document.getElementById(totalId).textContent = total;
                                    }
                                }

                                // Function to calculate the total based on selected values for the second set
                                function McalculateTotal2(totalId) {
                                    var fourthValue = parseFloat(document.querySelector('.thirdteen_col').value);
                                    var fifthValue = parseFloat(document.querySelector('.fourtheen_col').value);
                                    var sixthValue = parseFloat(document.querySelector('.fifteen_col').value);

                                    // Check if values are valid numbers
                                    if (!isNaN(fourthValue) && !isNaN(fifthValue) && !isNaN(sixthValue)) {
                                        var total = fourthValue + fifthValue + sixthValue + 120;
                                        document.getElementById('total5').value = total;
                                        document.getElementById(totalId).textContent = total;
                                    }
                                }

                                // Function to calculate the total based on selected values for the third set
                                function McalculateTotal3(totalId) {
                                    var seventhValue = parseFloat(document.querySelector('.seventheen_col').value);
                                    var eighthValue = parseFloat(document.querySelector('.eightheen_col').value);
                                    var ninthValue = parseFloat(document.querySelector('.nintheen_col').value);

                                    // Check if values are valid numbers
                                    if (!isNaN(seventhValue) && !isNaN(eighthValue) && !isNaN(ninthValue)) {
                                        var total = seventhValue + eighthValue + ninthValue + 160;
                                        document.getElementById('total6').value = total;
                                        document.getElementById(totalId).textContent = total;
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    </form>
    <!-- information of packages -->
    <article>
        <div class="columns-info section2">
            <ul class="info">
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span> The number of questions that are
                    asked in the analysis of your contents Research /Report.</li>
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span> Approximately 250-333 words = one page.</li>
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i><span><i class="fa-solid fa-star" style="color: #EDB954;"></i><span><i class="fa-solid fa-star" style="color: #EDB954;"></i> xclude
                                weekend days.</li>
            </ul>
        </div>
    </article>
    <!-- some question  -->
    <article class="section2">
        <h3 class="faq" style="font-weight: bold;">FAQs</h3>
        <div class="questions">
            <details class="details">
                <summary class="summary">
                    How do you handle Models not working on python environment of the project?
                </summary>
                <p>
                    When encountering a situation where a Python project is not working properly, utilize Excel or other
                    software, seek expert advice if needed.
                </p>
            </details>
            <details class="details">
                <summary class="summary">
                    What types of tools in prediction can you measurement the error?
                </summary>
                <p>
                    Common tools for measuring prediction errors include Mean Absolute Error (MAE), Mean
                    Squared Error (MSE), Root Mean Squared Error (RMSE), R-squared (R²), and Mean Absolute
                    Percentage Error (MAPE).
                </p>
            </details>
            <details class="details">
                <summary class="summary">
                    What level of detail do you provide in your reports? </summary>
                <p>
                    We provide comprehensive reports that include key insights, conclusions, and
                    recommendations. The level of detail will depend on your requirements and the complexity of
                    the analysis.
                </p>
            </details>
        </div class="questions">
    </article>
</section>
@endsection
