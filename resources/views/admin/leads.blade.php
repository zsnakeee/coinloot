@extends('layouts.admin')

@section('title', "Leads manage")

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Leads</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>COMPANY</th>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>POINTS</th>
                            <th>Payout</th>
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
                                            <div class="font-weight-bolder">{{ $lead->user->name() }}</div>
                                            <div class="font-small-2 text-muted">
                                                {{ $lead->user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $lead->company }}</td>
                                <td width="40%">{{ $lead->offer_id }}</td>
                                <td>{{ $lead->offer_name }}</td>
                                <td>{{ $lead->offer_points }}</td>
                                <td>{{ $lead->offer_payout }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate($lead->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="h-100 d-flex align-items-center justify-content-center">

            <div class="row mt-1" style="margin: auto;">
                <div class="col align-self-center">
                    {{ $leads->onEachSide(0)->links() }}
                </div>
            </div>
        </div>

        @endsection

        @push('scripts')

@endpush
