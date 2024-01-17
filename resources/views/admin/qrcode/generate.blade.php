@extends('admin.Master')
@section('title')
Generated QR Code
@endsection
@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- sign up page start-->
        <div class="auth-bg-video">
            <video id="bgvid" poster="{{asset('admin/images/coming-soon-bg.jpg')}}" playsinline="" autoplay="" muted="" loop="">
                <source src="{{asset('admin/video/auth-bg.mp4')}}" type="video/mp4">
            </video>
            <div class="authentication-box">
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card mt-4 p-4">
                    <h1 class="text-center">Generated QR Code</h1>


                    <div class="container text-center">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <center>
                                    <a href="" id="container">{!! $simple !!}</a>
                                </center>


                            </div>

                        </div>
                        <a href="{{ route('qrcode.download', ['data' => urlencode($data)]) }}" class="btn btn-primary" onclick="downloadSVG()">Download QR Code</a>
                        <a href="{{ route('qrcode.index') }}" class="btn btn-secondary">Back</a>
                    </div>

                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
                    <script>
                        function downloadSVG() {
                            const svg = document.getElementById('container').innerHTML;
                            const blob = new Blob([svg.toString()]);
                            const element = document.createElement("a");
                            element.download = "w3c.svg";
                            element.href = window.URL.createObjectURL(blob);
                            element.click();
                            element.remove();
                        }
                    </script>




                </div>
            </div>
        </div>
    </div>

    <!-- sign up page ends-->
</div>
</div>
<!-- page-wrapper Ends-->
@endsection
