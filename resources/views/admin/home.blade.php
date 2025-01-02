@extends('layouts.admin')

@section('title', "Dashboard")

@section('content')
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
                    <h2 class="fw-bolder mt-1">${{ number_format($profit['today'], 2) }}</h2>
                    <p class="card-text">Today Profit</p>
                </div>
                <div class="card-body"></div>
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
                    <h2 class="fw-bolder mt-1">${{ number_format($profit['this_month'], 2) }}</h2>
                    <p class="card-text">This Month Profit</p>
                </div>
                <div class="card-body"></div>
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
                    <h2 class="fw-bolder mt-1">${{ number_format($profit['total'], 2) }}</h2>
                    <p class="card-text">Total Profit</p>
                </div>
                <div class="card-body"></div>
            </div>
        </div>
        <!-- Points Chart Card ends -->
    </div>


    <!-- Users Statistics -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header align-items-start pb-0">
                    <div>
                        <h2 class="fw-bolder">{{ $users['active'] }}</h2>
                        <p class="card-text">Active Users</p>
                    </div>
                    <div class="avatar bg-light-success p-50">
                        <div class="avatar-content">
                            <i data-feather="user-check" class="font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div id="line-area-chart-6"></div>
            </div>
        </div>

        <div class="col-lg-8 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">User Statistics</h4>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $users['count'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Total Users</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-info me-2">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $users['new'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">New Users Today</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-danger me-2">
                                    <div class="avatar-content">
                                        <i data-feather="slash" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $users['banned'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Banned Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users Statistics -->

    <!-- Withdraw Statistics -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card">
                <div class="card-header align-items-start pb-0">
                    <div>
                        <h2 class="fw-bolder">{{ $withdrawals['count'] }}</h2>
                        <p class="card-text">Total Withdrawals</p>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <div class="avatar-content">
                            <i data-feather="credit-card" class="font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <div id="line-area-chart-5"></div>
            </div>
        </div>

        <div class="col-lg-8 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">Withdrawals Statistics</h4>
                </div>
                <div class="card-body statistics-body">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="credit-card" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $withdrawals['paid'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Paid Withdrawals</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-md-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-warning me-2">
                                    <div class="avatar-content">
                                        <i data-feather="alert-circle" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $withdrawals['pending'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Pending Withdrawals</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 col-12 mb-2 mb-sm-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-danger me-2">
                                    <div class="avatar-content">
                                        <i data-feather="slash" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">{{ $withdrawals['rejected'] }}</h4>
                                    <p class="card-text font-small-3 mb-0">Rejected Withdrawals</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Withdraw Statistics -->

@endsection

@push('scripts')

    <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}"></script>

@endpush
