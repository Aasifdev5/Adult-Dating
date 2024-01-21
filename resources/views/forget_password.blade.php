@extends('master')
@section('title')
Forget Password
@endsection
@section('content')
<main>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h1 class="main-title home">Forgot your password?</h1> Don't worry, it happens to everyone <i aria-hidden="true" class="fa fa-smile-o"></i>
            <p class="text-muted mt-2">Please enter your email address and we'll send you a link to reset your password.</p>
        </div>
    </div>
    <div class="container mt-5 mb-5 loginpanel">
        <form action="{{url('sendResetPasswordLink')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label class="">Email</label>
                    <input name="email" type="email" placeholder="Email" class="form-control">
                    <!---->
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
    </div>
</main>
@endsection
