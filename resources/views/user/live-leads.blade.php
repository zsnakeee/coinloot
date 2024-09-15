@extends('layouts.dashboard')

@section('title', 'Live Leads')

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Live Leads</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>COMPANY</th>
                            <th>NAME</th>
                            <th>POINTS</th>
                            <th>FINISHED ON</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr class="text-truncate">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                            <img src="{{ $lead->user->avatar() }}"
                                                 alt="Avatar" height="30" width="30">
                                        </div>
                                        <div>
                                            <div class="font-weight-bolder">{{ $lead->user->username }}</div>
                                            <div class="font-small-2 text-muted">
                                                {{ $lead->user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $lead->company }}</td>
                                <td>{{ $lead->offer_name }}</td>
                                <td>{{ $lead->offer_points }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate($lead->created_at)->diffForHumans() }}</td>
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
