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

                                <h4 class="card-title mb-1">Reset password</h4>

                                <form method="POST" action="{{ route('password.update') }}"
                                      class="auth-register-form mt-2">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="row mt-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       id="email" name="email" value="{{ $email ?? old('email') }}"
                                                       required
                                                       autocomplete="email" autofocus/>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>

                                                <input type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       id="password" name="password" required
                                                       autocomplete="new-password"/>

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-1 mb-1">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password-confirm" class="form-label">
                                                    Confirm Password
                                                </label>

                                                <input type="password"
                                                       class="form-control"
                                                       id="password-confirm" name="password_confirmation" required
                                                       autocomplete="new-password"/>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success w-100">Reset Password</button>
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
