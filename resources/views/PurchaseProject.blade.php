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
            <img src="{{asset('images/1.9.png')}}" alt="bg">
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

        </div>
    </article>
    <!-- table compares -->
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
                                <th scope="col" value="100">100$
                                    Basic</th>
                                <th scope="col" value="140">300$
                                    Standard</th>
                                <th scope="col" value="200">500$
                                    Premium</th>
                            </tr>
                        </thead>
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
                            <!-- <tr>
                      <th scope="row">Questions Writing</th>
                      <td>5 Queations*</td>
                      <td>10 Queations*</td>
                      <td>15 Queations*</td>
                    </tr> -->
                            <tr>
                                <th scope="row">Number of words</th>
                                <td>2000 Words</td>
                                <td>5000 Words</td>
                                <td>8000 Words</td>
                            </tr>
                            <tr>
                                <th scope="row">Number of Pages*</th>
                                <td>6 Pages*</td>
                                <td>15 Pages*</td>
                                <td>24 Pages*</td>
                            </tr>
                            <tr>
                                <th scope="row">Topic Research</th>
                                <td><i class="bx bx-check"></i></td>
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
                                <th scope="row">Model creation</th>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Model documentation</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">variation</th>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <th scope="row">API integration</th>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-x"></i></td>
                                <td><i class="bx bx-check"></i></td>
                            </tr>
                            <tr>
                                <th scope="row">Revisions</th>
                                <td>Unlimited</td>
                                <td>Unlimited</td>
                                <td>Unlimited</td>
                            </tr>
                            <tr>
                                <th scope="row">Delivery Time**</th>
                                <td>3 Days**</td>
                                <td>5 Days**</td>
                                <td>7 Days**</td>
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
                                    <button type="button" class="btn button" onclick="setValueAndSubmit('100')"> Basic 100$</button>
                                </td>
                                <td>

                                    <button type="button" class="btn button" onclick="setValueAndSubmit('300')"> Standard 300$</button>
                                </td>
                                <td>
                                    <button type="button" class="btn button" onclick="setValueAndSubmit('500')"> Premium 500$</button>

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
                                <span class="price">$100</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Python Jupiter Notebook </span></li>
                                    <li><i class="fas fa-check"></i><span>6 Pages* with 2000 words</span></li>
                                    <li><i class="fas fa-check"></i><span>Topic Research</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualised Results</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Model creation</span></li>
                                    <li><i class="fas fa-check"></i><span> 1 variation</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 3 Days**</span></li>
                                </ul>

                                <button type="button" class="btn button" onclick="MsetValueAndSubmit('100')"> Basic 100$</button>
                            </div>
                        </div>




                        <div class="row">
                            <div class="price-details">
                                <span class="price">$300</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Python Jupiter Notebook </span></li>
                                    <li><i class="fas fa-check"></i><span>15 Pages* with 5000 words</span></li>
                                    <li><i class="fas fa-check"></i><span>Topic Research</span></li>
                                    <li><i class="fas fa-check"></i><span>Plagiarism Check</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualized Result</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Model creation</span></li>
                                    <!-- <li><i class="fas fa-x"></i><span>Model documentation</span></li> -->
                                    <li><i class="fas fa-check"></i><span> 2 variation</span></li>
                                    <!-- <li><i class="fas fa-x"></i><span>API integration</span></li> -->
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 5 Days**</span></li>
                                </ul>

                                <button type="button" class="btn button" onclick="MsetValueAndSubmit('300')"> STANDARD 300$</button>

                            </div>
                        </div>



                        <div class="row">
                            <div class="price-details">
                                <span class="price">$500</span>
                            </div>
                            <div class="content_wrapper text-center">
                                <ul class="features">
                                    <li><i class="fas fa-check"></i><span>Python Jupiter Notebook </span></li>
                                    <li><i class="fas fa-check"></i><span>24 Pages* with 8000 words</span></li>
                                    <li><i class="fas fa-check"></i><span>Topic Research</span></li>
                                    <li><i class="fas fa-check"></i><span>Plagiarism Check</span></li>
                                    <li><i class="fas fa-check"></i><span>Visualized Result</span></li>
                                    <li><i class="fas fa-check"></i><span>Free Source Code</span></li>
                                    <li><i class="fas fa-check"></i><span>Model creation</span></li>
                                    <li><i class="fas fa-check"></i><span>Model documentation</span></li>
                                    <li><i class="fas fa-check"></i><span> 3 variation</span></li>
                                    <li><i class="fas fa-check"></i><span>API integration</span></li>
                                    <li><i class="fas fa-check"></i><span>Unlimited Revisions</span></li>
                                    <li><i class="fas fa-check"></i><span>Delivered in 7 Days**</span></li>
                                </ul>

                                <button type="button" class="btn button" onclick="MsetValueAndSubmit('500')"> PREMIUM 500$</button>
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
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i></span> Approximately 250-333 words = one
                    page of your contents Research.
                </li>
                <li><span><i class="fa-solid fa-star" style="color: #EDB954;"></i><span><i class="fa-solid fa-star" style="color: #EDB954;"></i><span> Exclude
                                weekend days.</li>
            </ul>
        </div>
    </article>

    <article class="section2">
        <h3 class="faq" style="font-weight: bold;">FAQs</h3>
        <div class="questions">
            <details class="details">
                <summary class="summary">
                    Does this order provide perfect working of the model at the end?
                </summary>
                <p>
                    Yes, sure we will provide complete working model with complete requirements and documentation at the end
                    for
                    a better understanding of the model.
                </p>
            </details>
            <details class="details">
                <summary class="summary">
                    What are the essential components of a machine learning project? </summary>
                <p>
                    When encountering a situation where a Python project is not working properly, utilize Excel or other
                    software, seek expert advice if needed.
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
