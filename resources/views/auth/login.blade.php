@extends('layouts.auth_layout')
@section('title')
    {{ __('messages.login') }}
@endsection
@section('meta_content')
    - {{ __('messages.login') }} {{ __('messages.to') }} {{getAppName()}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="p-4 account-container w-100">
                <div class="card-group login-group overflow-hidden">
                    <div class="card p-sm-2 mb-0 login-group__card">
                        <div class="card-body login-group__login-body">
                            @if($errors->any())
                                <div class="alert alert-danger text-center mt-2">{{$errors->first()}}</div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif
                            @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            <form method="post" action="{{ url('/login') }}" id="loginForm" class="login-group__form">
                                {{ csrf_field() }}
                                <h1 class="login-group__title mb-2 text-center">{{ __('messages.login') }}</h1>

                                <p class="text-muted login-group__sub-title mb-4 text-center">{{ __('messages.sign_in_to_your_account') }}</p>
                                <div class="form-group mb-4 login-group__sub-title">
                                    {!! Form::label('email', __('messages.email').':' )!!}<span class="red">*</span>
                                    <input type="email"
                                           class="form-control login-group__input"
                                           name="email"
                                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}"
                                           placeholder="{{ __('messages.email') }}"
                                           id="email" required>
                                </div>
                                <div class="form-group mb-4 login-group__sub-title">
                                    {!! Form::label('password', __('messages.password').':' ) !!}<span
                                            class="red">*</span>
                                    <input type="password"
                                           class="form-control login-group__input"
                                           placeholder="{{ __('messages.password') }}" name="password" id="password"
                                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                           onkeypress="return avoidSpace(event)" required>
                                </div>

                                <div class="row flex-sm-row flex-column">
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 login-group__btn" type="button"
                                                id="loginBtn">{{ __('messages.login') }}</button>
                                    </div>

                                </div>
                            </form>
                                
                        </div>
                    </div>

                    <div class="card text-white bg-primary py-5 d-md-down-none text-center d-none">
                        <div class="row card-body text-center h-100">
                            <div class="col-12 sign-up-div">
                                <h1 class="login-group__signup-text">{{ __('messages.sign_up') }}</h1>
                                <p class="login-group__signup-subtext mt-4">{{ __('messages.sign_up_msg') }}</p>
                                <a class="btn btn-primary active mt-3 py-2 mt-4 d-flex justify-content-center"
                                   href="{{ url('/register') }}">{{ __('messages.register_now!') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
