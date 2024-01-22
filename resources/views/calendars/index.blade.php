@extends('master')
@section('title')
Profile List
@endsection
@section('content')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container">
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
                        <h5> Profile List</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{ route('calendars.create') }}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                            Profile </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table table-striped" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Days</th>
                                        <th>Price</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($calendars as $calendar)
                                    <tr>
                                        <td>{{ $calendar->id }}</td>
                                        <td>{{ $calendar->name }}</td>
                                        <td>{!!stripslashes ($calendar->details) !!}</td>
                                        <td>{{ $calendar->days }}</td>
                                        <td>{{ $calendar->price }}</td>
                                        <td>
                                            <a href="{{ route('calendars.edit', ['calendar' => $calendar->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('calendars.destroy', ['calendar' => $calendar->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
