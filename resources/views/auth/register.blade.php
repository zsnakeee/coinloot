@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-body">

                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Register basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" width="300px">
                                </a>

                                <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
                                <p class="card-text mb-2">Earn money easy!</p>

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <div class="alert-body">
                                            <p>{{ session('error') }}</p>
                                        </div>
                                    </div>
                                @endif

                                <form action="{{ route('register') }}" method="POST" class="auth-register-form mt-2">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                                               id="username" name="username" placeholder="johndoe123"
                                               aria-describedby="username" tabindex="3"/>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" placeholder="john@example.com"
                                               aria-describedby="email" tabindex="4"/>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <label for="password" class="form-label">Password</label>

                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror form-control-merge"
                                                   id="password" name="password"
                                                   placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                   aria-describedby="password" tabindex="5"/>


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


                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input @error('terms') is-invalid @enderror"
                                                   type="checkbox" id="register-privacy-policy"
                                                   tabindex="7"/>
                                            <label class="form-check-label" for="register-privacy-policy">
                                                I agree to <a href="{{ route('term-condition') }}">privacy policy &
                                                    terms</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-success w-100" tabindex="8">Register</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Already have an account?</span>
                                    <a href="{{ route('login') }}">
                                        <span>Sign in instead</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /Register basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
