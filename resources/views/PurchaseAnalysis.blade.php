@extends('master')
@section('title')
{{$PurchaseProject->course_name}}
@endsection
@section('content')
<section id="section">
    <article class="Purchase Purchasefont">
        <h1>{{$PurchaseProject->course_name}}
        </h1>
        <!-- background -->
        <div class="Purchasebg">
            @if(!empty($PurchaseProject->course_photo))
            <img src="{{asset('product_photo/')}}<?php echo '/' . $PurchaseProject->course_photo; ?>" alt="bg">
            @else
            <img src="{{asset('images/1.3.png')}}" alt="bg">
            @endif

        </div>

        <div class="content Purchasesection ">
        <form method="post" action="{{url('purchase')}}" enctype="multipart/form-data">
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
                                <th scope="col" value="100">80$
                                    Basic</th>
                                <th scope="col" value="140">140$
                                    Standard</th>
                                <th scope="col" value="200">200$
                                    Premium</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Software</th>
                                <td>
                                    <select class="form-select form-select-md w-75 first_col" id="model_1">
                                        <option value="0" id="t_1" selected="">Select Software</option>
                                        <option id="t_1">Python</option>
                                        <option id="t_1">State</option>
                                        <option id="t_1">Spss</option>
                                        <option id="t_1">R</option>
                                        <option id="t_1">NVivo</option>
                                        <option id="t_1">SAS</option>
                                        <option id="t_1">Excel</option>
                                        <option id="t_1">Eviews</option>
                                        <option id="t_1">Minitab</option>
                                        <option id="t_1">JMP</option>
                                        <option id="t_1">XLSTAT</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 first_col" id="model_1">
                                        <option value="0" id="t_1" selected="">Select Software</option>
                                        <option id="t_1">Python</option>
                                        <option id="t_1">State</option>
                                        <option id="t_1">Spss</option>
                                        <option id="t_1">R</option>
                                        <option id="t_1">NVivo</option>
                                        <option id="t_1">SAS</option>
                                        <option id="t_1">Excel</option>
                                        <option id="t_1">Eviews</option>
                                        <option id="t_1">Minitab</option>
                                        <option id="t_1">JMP</option>
                                        <option id="t_1">XLSTAT</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select form-select-md w-75 first_col" id="model_1">
                                        <option value="0" id="t_1" selected="">Select Software</option>
                                        <option id="t_1">Python</option>
                                        <option id="t_1">State</option>
                                        <option id="t_1">Spss</option>
                                        <option id="t_1">R</option>
                                        <option id="t_1">NVivo</option>
                                        <option id="t_1">SAS</option>
                                        <option id="t_1">Excel</option>
                                        <option id="t_1">Eviews</option>
                                        <option id="t_1">Minitab</option>
                                        <option id="t_1">JMP</option>
                                        <option id="t_1">XLSTAT</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Questions Writing*</th>
                                <td>5 Queations*</td>
                                <td>10 Queations*</td>
                                <td>15 Queations*</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of words</th>
                                <td>2000 Words</td>
                                <td>5000 Words</td>
                                <td>8000 Words</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Pages**</th>
                                <td>6 Pages**</td>
                                <td>15 Pages**</td>
                                <td>24 Pages**</td>
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
                                <th scope="row">Dashboard</th>
                                <td>
                                    <select class="form-select form-select-md w-75 basic" name="bdashboard" onchange="acalculateTotal('atotal1')" aria-label="Large select example">
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
                                    <select class="form-select form-select-md w-75 standard" name="sdashboard" onchange="scalculateTotal2('atotal2')" aria-label="Large select example">
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
                                    <select class="form-select form-select-md w-75 premium" name="sdashboard" onchange="pcalculateTotal3('atotal3')" aria-label="Large select example">
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
                                <th scope="row">Delivery time***</th>
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
                                    <button type="submit" class="btn button" onclick="setValueAndSubmit('80')"> Continue <input type="text" readonly placeholder="80" class="transparent-input" name="bamount" id="total1" value="">$</button>
                                </td>
                                <td>

                                    <button type="submit" class="btn button" onclick="setValueAndSubmit('140')"> Continue <input type="text" readonly placeholder="140"  class="transparent-input" name="samount" id="total2" value="">$</button>
                                </td>
                                <td>

                                    <button type="submit" class="btn button" onclick="setValueAndSubmit('200')"> Continue <input type="text" readonly placeholder="200"  class="transparent-input" name="pamount" id="total3" value="">$</button>
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
            function acalculateTotal(totalId) {
                var basicValue = parseInt(document.querySelector('.basic').value);

                // Check if values are valid numbers
                if (!isNaN(basicValue)) {
                    var total = basicValue + 80;
                    document.getElementById('total1').value = total;
                    document.getElementById(totalId).textContent = total;
                }
            }
             // Function to calculate the total based on selected values for the first set
             function scalculateTotal2(totalId) {
                var standardValue = parseInt(document.querySelector('.standard').value);

                // Check if values are valid numbers
                if (!isNaN(standardValue)) {
                    var total = standardValue + 140;
                    document.getElementById('total2').value = total;
                    document.getElementById(totalId).textContent = total;
                }
            }
            function pcalculateTotal3(totalId) {
                var premiumValue = parseInt(document.querySelector('.premium').value);

                // Check if values are valid numbers
                if (!isNaN(premiumValue)) {
                    var total = premiumValue + 200;
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
                                    <select class="form-select form-select-md mt-2 mb-2" id="model_1">
                                        <option value="0" id="t_1" selected="">Select Software</option>
                                        <option id="t_1">Python</option>
                                        <option id="t_1">State</option>
                                        <option id="t_1">Spss</option>
                                        <option id="t_1">R</option>
                                        <option id="t_1">NVivo</option>
                                        <option id="t_1">SAS</option>
                                        <option id="t_1">Excel</option>
                                        <option id="t_1">Eviews</option>
                                        <option id="t_1">Minitab</option>
                                        <option id="t_1">JMP</option>
                                        <option id="t_1">XLSTAT</option>
                                    </select>
                                    <li><i class="fas fa-check"></i><span>5 Questions*</span></li>
                                    <li><i class="fas fa-check"></i><span>2000 words</span></li>
                                    <li><i class="fas fa-check"></i><span>6 Pages**</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualised Results</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 3 Days***</span></li>

                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size:15px;">Select
                                            Dashboard</span>
                                    </li>
                                    <select class="form-select form-select-md mt-2 mb-2 mbasic" name="mbdashboard" aria-label="Large select example" onchange="macalculateTotal('mtotal');" aria-label="Large select example">>
                                        <option value="0" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </ul>
                                <button type="submit" class="btn button" onclick="MsetValueAndSubmit('80')"> BASIC <input type="text" readonly placeholder="80" class="transparent-input" name="mbamount" id="total4" value="">$</button>


                            </div>
                        </div>




                        <div class="row">
                            <div class="price-details">
                                <span class="price">$140</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <select class="form-select form-select-md mt-2 mb-2" id="model_1">
                                        <option value="0" id="t_1" selected="">Select Software</option>
                                        <option id="t_1">Python</option>
                                        <option id="t_1">State</option>
                                        <option id="t_1">Spss</option>
                                        <option id="t_1">R</option>
                                        <option id="t_1">NVivo</option>
                                        <option id="t_1">SAS</option>
                                        <option id="t_1">Excel</option>
                                        <option id="t_1">Eviews</option>
                                        <option id="t_1">Minitab</option>
                                        <option id="t_1">JMP</option>
                                        <option id="t_1">XLSTAT</option>
                                    </select>
                                    <li><i class="fas fa-check"></i><span>10 Questions* Written</span></li>
                                    <li><i class="fas fa-check"></i><span>5000 words</span></li>
                                    <li><i class="fas fa-check"></i><span>15 Pages**</span></li>
                                    <li><i class="fas fa-check"></i><span>Researched Topic</span></li>
                                    <li><i class="fas fa-check"></i><span>Plagiarism Check</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualized Result</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 5 Days***</span></li>
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size:15px;">Select Dashboard</span>
                                    </li>
                                    <select class="form-select form-select-md mt-2 mb-2 mstandard" name="msdashboard" aria-label="Large select example" onchange="mscalculateTotal2('mstotal');" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </ul>
                                <button type="submit" class="btn button" onclick="MsetValueAndSubmit('140')"> STANDARD <input type="text" readonly placeholder="140" class="transparent-input" name="msamount" id="total5" value="">$</button>


                            </div>
                        </div>



                        <div class="row">
                            <div class="price-details">
                                <span class="price">$200</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <select class="form-select form-select-md mt-2 mb-2" id="model_1">
                                        <option value="0" id="t_1" selected="">Select Software</option>
                                        <option id="t_1">Python</option>
                                        <option id="t_1">State</option>
                                        <option id="t_1">Spss</option>
                                        <option id="t_1">R</option>
                                        <option id="t_1">NVivo</option>
                                        <option id="t_1">SAS</option>
                                        <option id="t_1">Excel</option>
                                        <option id="t_1">Eviews</option>
                                        <option id="t_1">Minitab</option>
                                        <option id="t_1">JMP</option>
                                        <option id="t_1">XLSTAT</option>
                                    </select>
                                    <li><i class="fas fa-check"></i><span>15 Questions*</span></li>
                                    <li><i class="fas fa-check"></i><span>8000 words</span></li>
                                    <li><i class="fas fa-check"></i><span>24 Pages**</span></li>
                                    <li><i class="fas fa-check"></i><span>Researched Topic</span></li>
                                    <li><i class="fas fa-check"></i><span>Plagiarism Check</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualised Results</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 7 Days***</span></li>
                                    <li class="mt-3"><i class="fas fa-check"></i><span style="font-size:15px;">Select
                                            Dashboard</span>
                                    </li>
                                    <select class="form-select form-select-md mt-2 mb-2 mpremium" name="mpdashboard" aria-label="Large select example" onchange="mpcalculateTotal3('mptotal');" aria-label="Large select example">
                                        <option value="0" id="t_1" selected="">Select Dashboard</option>
                                        <option value="50">Excel Basic (50$)</option>
                                        <option value="100">Excel Standard (100 $)</option>
                                        <option value="200">Excel Premium (200 $)</option>
                                        <option value="50">Power BI Basic (50 $)</option>
                                        <option value="100">Power BI Standard (100 $)</option>
                                        <option value="200">Power BI Premium (200 $)</option>
                                    </select>
                                </ul>
                                <button type="submit" class="btn button" onclick="MsetValueAndSubmit('200')"> PREMIUM <input type="text" readonly placeholder="200" class="transparent-input" name="mpamount" id="total6" value="">$</button>

 <input type="hidden" id="Mselected_value" name="Mamount">
                            </div>
                        </div>
                    </div>
                    <script>
                    function MsetValueAndSubmit(value) {
                document.getElementById('Mselected_value').value = value;
// Set the input value to a hidden input field in the form
        document.getElementById('Mselected_value').value = inputValue;
                
            }
            // Function to calculate the total based on selected values for the first set
            function macalculateTotal(totalId) {
                var mbasicValue = parseInt(document.querySelector('.mbasic').value);

                // Check if values are valid numbers
                if (!isNaN(mbasicValue)) {
                    var total = mbasicValue + 80;
                    document.getElementById('total4').value = total;
                    document.getElementById(totalId).textContent = total;
                }
            }
             // Function to calculate the total based on selected values for the first set
             function mscalculateTotal2(totalId) {
                var mstandardValue = parseInt(document.querySelector('.mstandard').value);

                // Check if values are valid numbers
                if (!isNaN(mstandardValue)) {
                    var total = mstandardValue + 140;
                    document.getElementById('total5').value = total;
                    document.getElementById(totalId).textContent = total;
                }
            }
            function mpcalculateTotal3(totalId) {
                var mpremiumValue = parseInt(document.querySelector('.mpremium').value);

                // Check if values are valid numbers
                if (!isNaN(mpremiumValue)) {
                    var total = mpremiumValue + 200;
                    document.getElementById('total6').value = total;
                    document.getElementById(totalId).textContent = total;
                }
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
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span> The number of questions that are
                    asked in the analysis of your contents Research /Report.</li>
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span> Approximately 250-333 words = one page.</li>
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i><span><i class="fa-solid fa-star" style="color: #EDB954;"></i><span><i class="fa-solid fa-star" style="color: #EDB954;"></i> xclude
                                weekend days.</li>
            </ul>
        </div>
    </article>

    <article class="section2">
        <h3 class="faq" style="font-weight: bold;">FAQs</h3>
        <div class="questions">
            <details class="details">
                <summary class="summary">
                    How do you handle revisions or changes to the scope of the project?
                </summary>
                <p>
                    We understand that projects can change and evolve over time, and we always open to revisions
                    or changes to the scope of the project. If you need to make any changes to the project after it
                    has begun, we will work with them to understand their new needs and revise the project plan as
                    needed.
                </p>
            </details>
            <details class="details">
                <summary class="summary">
                    What types of data can you analyze?
                </summary>
                <p>
                    We can analyze various types of data, including quantitative and categorical data, survey data,
                    marketing data, financial data, and more.
                </p>
            </details>
            <details class="details">
                <summary class="summary">
                    What level of detail do you provide in your reports?</summary>
                <p>
                    We provide comprehensive reports that include key insights, conclusions, and
                    recommendations. The level of detail will depend on your requirements and the complexity of
                    the analysis.
                </p>
            </details>
        </div>
    </article>
</section>
@endsection
