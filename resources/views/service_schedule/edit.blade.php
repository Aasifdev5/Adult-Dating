@extends('master')
@section('title')
Edit Service Time
@endsection
@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="container">
        <!-- sign up page start-->
        <div class="auth-bg-video">

            <div class="authentication-box">
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card mt-4 p-4">
                    <h4 class="text-center">Edit Service Time</h4>

                    <form action="{{ route('service_schedule.update', $serviceSchedule->id) }}" class="theme-form" method="post">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif

                        @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <p>{{ session('fail') }}</p>
                        </div>
                        @endif

                        @csrf
                        @method('PUT') {{-- Add this line to specify the HTTP method as PUT for update --}}

                        <div class="form-group">
                            <label for="day_of_week">Day of Week</label>
                            <select class="form-control" id="day_of_week" name="day_of_week" required>
                                <option value="monday" {{ $serviceSchedule->day_of_week === 'monday' ? 'selected' : '' }}>Monday</option>
                                <option value="tuesday" {{ $serviceSchedule->day_of_week === 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="wednesday" {{ $serviceSchedule->day_of_week === 'wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="thursday" {{ $serviceSchedule->day_of_week === 'thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="friday" {{ $serviceSchedule->day_of_week === 'friday' ? 'selected' : '' }}>Friday</option>
                                <option value="saturday" {{ $serviceSchedule->day_of_week === 'saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="sunday" {{ $serviceSchedule->day_of_week === 'sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                            <span class="text-danger">@error('day_of_week'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $serviceSchedule->start_time) }}" required>
                            <span class="text-danger">@error('start_time'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $serviceSchedule->end_time) }}" required>
                            <span class="text-danger">@error('end_time'){{ $message }}@enderror</span>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Update Service Time</button>
                    </form>




                </div>
            </div>
        </div>
    </div>

    <!-- sign up page ends-->
</div>
</div>
<!-- page-wrapper Ends-->
@endsection
