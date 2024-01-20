@extends('admin.Master')
@section('title')
Category List
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
                            <li class="breadcrumb-item">Ads Management</li>
                            <li class="breadcrumb-item">Category List</li>

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
                        <p>{{Session::get('success')}}</p>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{Session::get('fail')}}</p>
                    </div>
                    @endif
                    <div class="card-header">
                        <h5>Category List</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="Add_Course_list" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Add
                            Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="">#</th>
                                        <!-- <th>id</th> -->
                                        <th> Category </th>

                                        <th> Image</th>

                                        <!-- <th>description</th> -->

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $row)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $row->category_id}}</td>

                                        <td> @if(!empty($row->course_photo))
                                            <img src="{{asset('product_photo/')}}<?php echo '/' . $row->course_photo; ?>" class="personal-avatar" alt="avatar" id="profileImagePreview">
                                            @endif
                                        </td>

                                        <!-- <td>{{$row->description}}</td> -->

                                        <td>
                                            <a href="{{ route('edit_courses', ['id' => $row->id]) }}" class="btn btn-sm btn-success" type="submit">Edit</a>
                                            <a href="{{ route('Delete_course', ['id' => $row->id]) }}" class="btn btn-sm btn btn-danger" type="submit">Delete</a>
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

</div>
</div>

</body>

</html>
@endsection
