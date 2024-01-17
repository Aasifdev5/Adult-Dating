@extends('admin.Master')
@section('title')
Payment Report
@endsection
@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <div class="page-header-left">
                        <h3>Adult Dating</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                            <li class="breadcrumb-item">Payment Report</li>

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
                        <h5>Credit Reload List</h5>

                    </div>
                    <div class="card-body">

                        <form action="{{ route('subscription.activate') }}" method="POST">
                            @csrf

                            <h2>Profiles</h2>
                            @foreach ($profiles as $profile)
                            <label>
                                <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                                {{ $profile->name }}
                            </label>
                            <br>
                            @endforeach

                            <button type="submit" class="btn btn-primary mt-3">Activate Subscription</button>
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
