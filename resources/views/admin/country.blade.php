@extends("admin.Master")
@section('title')
Country List
@endsection
@section("content")

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Adult Dating</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Country </li>


                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{session::get('success')}}</p>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{session::get('fail')}}</p>
                    </div>
                    @endif
                    <div class="card-header">
                        <h5> Country List</h5>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">


                                    @if ($countries->isNotEmpty())
                                    <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 m-0">
                                        <table class="table display" id="advance-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Country Name</th>
                                                    <!-- Add more table headers as needed -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($countries as $country)
                                                @php
                                                // Assuming $country['name'] is a JSON string
                                                $countryData = json_decode($country['name'], true);

                                                // Access the "en" value
                                                $englishValue = isset($countryData['en']) ? $countryData['en'] : '';
                                                @endphp

                                                <tr>
                                                    <td class="text-center">{{$loop->iteration}}</td>
                                                    <td>{{ $englishValue }}</td>
                                                    <!-- Add more table cells for additional fields as needed -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="row m-0">
                                        <div class="col-12 text-center mb-3 text-danger">
                                            <strong>{{ __('countries_not_found') }}</strong>
                                        </div>
                                    </div>
                                    @endif



                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DOM / jQuery  Ends-->


        </div>
    </div>


    <!-- Container-fluid Ends-->
    <!-- Container-fluid Ends-->
</div>



@endsection
