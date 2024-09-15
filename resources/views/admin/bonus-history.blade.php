@extends('layouts.admin')

@section('title', "Manage History")

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bonus History</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Points</th>
                            <th>Code</th>
                            <th>Redeemed at</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($bonus_histories as $history)
                            <tr class="text-truncate">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                            <img
                                                src="{{ $history->user->avatar() }}"
                                                alt="Avatar" height="30" width="30">
                                        </div>
                                        <div>
                                            <div class="font-weight-bolder">{{ $history->user->username }}</div>
                                            <div class="font-small-2 text-muted">
                                                {{ $history->user->email}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $history->bonus->points }}</td>
                                <td>{{ $history->bonus->code }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate($history->created_at)->diffForHumans() }}</td>
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
