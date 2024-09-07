@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" width="300px">
                                </a>

                                <h4 class="card-title mb-1">Welcome to Coin Loot! 👋</h4>
                                <p class="card-text mb-2">Please sign-in to your account and start earning money 💰</p>

                                <form method="POST" action="{{ route('login') }}" class="auth-login-form mt-2"
                                      id="auth-form">
                                    @csrf

                                    <div class="mb-1">
                                        <label for="login-username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               id="login-username" name="username" placeholder="john123"
                                               aria-describedby="login-username" tabindex="1" autofocus/>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    <small>Forgot Password?</small>
                                                </a>
                                            @endif
                                        </div>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror form-control-merge"
                                                   id="login-password" name="password" tabindex="2"
                                                   placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                   aria-describedby="login-password"/>

                                            <span class="input-group-text cursor-pointer">
                                                <i data-feather="eye"></i>
                                            </span>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button class="btn btn-success w-100" tabindex="4" type="submit">
                                        Sign in
                                    </button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>New on our platform?</span>
                                    <a href="{{ route('register') }}">
                                        <span>Create an account</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
