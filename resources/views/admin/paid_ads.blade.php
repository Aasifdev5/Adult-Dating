@extends('admin.Master')
@section('title')
Paid Top Ads  List
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

                            <li class="breadcrumb-item">Paid Top Ads</li>

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
                        <h5>Paid Top Ads  List</h5>
                        <h3 class="text-danger">Note: Please Delete a paid  top ad When Expiry Date is come</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                       
                                        <th>Created On</th>
                                        <th>Validity</th>
                                        <th>Expired Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                       @foreach ($ads as $ad)
    @php
        $top_ad_details = \App\Models\Ad::where('id', $ad->top_ad_id)->first();
        
        // Find the position of "for" in the detail property
        $forPosition = stripos($top_ad_details->detail, 'for');

        if ($forPosition !== false) {
            // Get the substring after "for"
            $substringAfterFor = substr($top_ad_details->detail, $forPosition + strlen('for'));

            // Trim any leading or trailing whitespaces
            $result = trim($substringAfterFor);

            // Find the position of "day" or "days" in the result
            $daysPosition = stripos($result, 'days');
            if ($daysPosition === false) {
                $daysPosition = stripos($result, 'day');
            }
        } else {
            $result = "No 'for' found in the string.";
            $daysPosition = false;
        }
       
        $startDate = \Carbon\Carbon::parse($ad->created_at)->format('Y-m-d'); // Your starting date
        $numberOfDaysToAdd = $daysPosition !== false ? (int)trim(substr($result, 0, $daysPosition)) : 0;

        $newDate = \Carbon\Carbon::parse($startDate)->addDays($numberOfDaysToAdd)->format('Y-m-d');
    @endphp

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ \Carbon\Carbon::parse($ad->created_at)->format('d-m-Y') }}</td>
        <td>@php echo $result @endphp</td>
        <td>{{ \Carbon\Carbon::parse($newDate)->format('d-m-Y') }}</td>
        <td>
            <form action="{{ url('admin/paid_ads_destroy', ['ad' => $ad->id]) }}" method="POST" style="display: inline;">
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
