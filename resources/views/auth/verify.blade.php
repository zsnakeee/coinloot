@extends('layouts.app')

@section('title', 'Verify Email Address')





@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-wrapper">
            <div class="content-body">

                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2" style="max-width: 600px;">
                        <!-- Register basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="brand-logo">
                                    <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" width="300px">
                                </a>

                                <h4 class="card-title mb-1">Verify Your Email Address 📧</h4>
                                <p class="card-text mb-2">Before proceeding, please check your email for a verification
                                    link.</p>

                                @if (session('resent'))
                                    <div class="alert alert-success">
                                        <div class="alert-body">
                                            <p>A fresh verification link has been sent to your email address.</p>
                                        </div>
                                    </div>
                                @endif

                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                                </form>
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
