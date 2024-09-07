@extends('layouts.app')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" width="300px">
                                </a>

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        <div class="alert-body">
                                            <p>{{ session('status') }}</p>
                                        </div>
                                    </div>
                                @endif

                                <h4 class="card-title mb-1">Reset your password!</h4>
                                <p class="card-text mb-2">We will send to you a reset mail!</p>

                                <form method="POST" action="{{ route('password.email') }}" class="auth-login-form mt-2">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" placeholder="john123"
                                               aria-describedby="email" tabindex="1" autofocus/>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>


                                    <button class="btn btn-success w-100" tabindex="2">Send Password Reset Link</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
