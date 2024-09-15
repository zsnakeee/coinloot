@extends('layouts.dashboard')

@section('title', 'Dashboard')


@section('content')
    <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations"
                 style="background: linear-gradient(118deg, #00c753, rgb(115 103 240));">
                <div class="card-body text-center">
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <img src="{{ auth()->user()->avatar() }}" alt="{{ auth()->user()->name() }}"
                                 height="30" width="30">
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">Welcome {{ auth()->user()->name() }},</h1>
                        <p class="card-text m-auto w-75">
                            Make <strong>money</strong> online with us. Enjoy 😉
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Greetings Card ends -->
    </div>

    <div class="row match-height">
        <!-- Points Chart Card starts -->
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder mt-1">{{ auth()->user()->current_points ?? 0 }}</h2>
                    <p class="card-text">CURRENT POINTS</p>
                </div>
                <div id="gained-chart"></div>
            </div>
        </div>
        <!-- Points Chart Card ends -->

        <!-- Points Chart Card starts -->
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder mt-1">{{ auth()->user()->today_points ?? 0 }}</h2>
                    <p class="card-text">LEADS TODAY</p>
                </div>
                <div id="order-chart"></div>
            </div>
        </div>
        <!-- Points Chart Card ends -->

        <!-- Points Chart Card starts -->
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-success p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="fw-bolder mt-1">{{ auth()->user()->total_points ?? 0 }}</h2>
                    <p class="card-text">ALL TIME</p>
                </div>
                <div id="all-order-chart"></div>
            </div>
        </div>
        <!-- Points Chart Card ends -->
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-light-success" style="margin-bottom: 30px;">
                    <b class="card-title">Redeem Coupon</b>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <div class="alert-body">
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <div class="alert-body">
                                <p>{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('user.home.redeem') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="Coupon Code" name="code">
                        <button class="btn btn-success mt-2">Redeem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
