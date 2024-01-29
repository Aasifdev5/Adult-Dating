@extends('admin.Master')
@section('title')
QR codes List
@endsection
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Social Citas</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                            <li class="breadcrumb-item">QR codes</li>

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
                        <h5>QR codes List</h5>

                    </div>
                    <div class="card-body">
                        <h1>QR Code Generator</h1>

                        <form action="{{ route('qrcode.generate') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="data" class="form-label">Data for QR Code</label>
                                <input type="text" class="form-control" id="data" name="data" placeholder="Enter data">
                            </div>

                            <button type="submit" class="btn btn-primary">Generate QR Code</button>
                        </form>
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
