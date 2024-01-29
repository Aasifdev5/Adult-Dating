@extends('admin.Master')
@section('title')
    Mail Templates
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
                                <li class="breadcrumb-item">Mail Templates</li>

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
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ session::get('success') }}</p>
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">
                                <p>{{ session::get('fail') }}</p>
                            </div>
                        @endif
                        <form id="vironeer-submited-form" action="{{ url('admin/mail-templates/save') }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header bg-lg-3 text-white">Template</div>
                                <div class="card-body">
                                    <div class="row g-3 mb-4">
                                        <div class="col-lg-12 col-lg-8">
                                            <label class="form-label">Subject </label>
                                            <input type="text" name="subject" class="form-control"
                                                value="{{ old('subject') }}" required>
                                        </div>

                                        <div class="col-lg-4">
                                            <label class="form-label">Status </label>
                                            <input type="checkbox" name="status" data-toggle="toggle" </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Body </label>
                                            <textarea name="body" class="ckeditor">{{ old('body') }}</textarea>
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-sm-4">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- DOM / jQuery  Ends-->

                                </div>
                        </form>
                    </div>
                </div>


                <!-- Container-fluid Ends-->
                <!-- Container-fluid Ends-->
            </div>
        @endsection
