@extends('layouts.dashboard')

@section('title', 'Leaderboard')

@section('content')
    <div class="row match-height">
        <!-- Greetings Card starts -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations"
                 style="background: linear-gradient(118deg, #00c753, rgb(115 103 240));">

                <div class="card-body text-center">
                    <img src="{{ asset('app-assets/images/elements/decore-left.png') }}"
                         class="congratulations-img-left" alt="card-img-left"/>
                    <img src="{{ asset('app-assets/images/elements/decore-right.png') }}"
                         class="congratulations-img-right" alt="card-img-right"/>
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <img src="{{ $winners->first()?->avatar() }}" alt="{{ $winners->first()?->name() }}"
                                 height="30" width="30">
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">Congratulations {{ $winners->first()?->username }},</h1>
                        <p class="card-text m-auto w-75">
                            You have done <strong>{{ $winners->first()?->total_points }} point</strong>, more points this
                            year.
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Greetings Card ends -->
    </div>

    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Top Leaders</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>User</th>
                                <th>Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($winners as $winner)
                                <tr class="text-truncate">
                                    <td width="20">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                                <img
                                                    src="{{ $winner->avatar() }}" alt="{{ $winner->name()  }}"
                                                    height="30" width="30">
                                            </div>
                                            <div>
                                                <div class="font-weight-bolder">{{ $winner->username }}</div>
                                                <div class="font-small-2 text-muted">
                                                    {{ $winner->firstname . ' ' . $winner->lastname }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $winner->total_points }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
