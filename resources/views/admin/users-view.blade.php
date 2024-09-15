@extends('layouts.admin')

@section('title', "View user")

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $user->username }}</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-truncate">
                            <th>User</th>
                            <th>Points</th>
                            <th>registered IP</th>
                            <th>Last IP</th>
                            <th>User Agent</th>
                            <th>Last Active</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-truncate">
                                <div class="d-flex align-items-center">
                                    <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                        <img src="{{ $user->avatar() }}" alt="{{ $user->name() }}" height="30"
                                             width="30">
                                    </div>
                                    <div>
                                        <div class="font-weight-bolder">{{ $user->username }}</div>
                                        <div class="font-small-2 text-muted">{{ $user->name() }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-truncate">{{ $user->current_points }}</td>
                            <td class="text-truncate">{{ $user->registered_ip }}</td>
                            <td class="text-truncate">{{ $user->last_login_ip }}</td>
                            <td>{{ $user->user_agent }}</td>
                            <td class="text-truncate">{{ \Carbon\Carbon::parse($user->last_seen_at)->diffForHumans() }}</td>
                            <td class="text-truncate">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Leads</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr class="text-truncate">
                            <th>User</th>
                            <th>Company</th>
                            <th>User IP</th>
                            <th>Offer ID</th>
                            <th>Offer name</th>
                            <th>Points</th>
                            <th>Payout</th>
                            <th>FINISHED ON</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->leads as $lead)
                            <tr>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                            <img
                                                src="{{ $user->avatar() }}"
                                                alt="Avatar" height="30" width="30">
                                        </div>
                                        <div>
                                            <div class="font-weight-bolder">{{ $user->username }}</div>
                                            <div class="font-small-2 text-muted">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">{{ $lead->company }}</td>
                                <td class="text-truncate">{{ $lead->user_ip }}</td>
                                <td class="text-truncate">{{ $lead->offer_id }}</td>
                                <td>{{ $lead->offer_name }}</td>
                                <td class="text-truncate">{{ $lead->offer_points }}</td>
                                <td class="text-truncate">{{ $lead->offer_payout }}</td>
                                <td class="text-truncate">{{ \Carbon\Carbon::createFromDate($lead->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transactions</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Method</th>
                            <th>Points</th>
                            <th>Payment Way</th>
                            <th>Status</th>
                            <th>Requested on</th>
                            <th>Responded on</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($user->withdrawals as $withdrawal)
                            <tr class="text-truncate">
                                <td>{{ $withdrawal->method }}</td>
                                <td><strong>{{ $withdrawal->points }}</strong></td>
                                <td>{{ $withdrawal->payment_way }}</td>
                                <td>
                                    @if($withdrawal->status == 0)
                                        <span class="badge badge-light-warning">Pending</span>
                                    @elseif($withdrawal->status == 1)
                                        <span class="badge badge-light-success">Approved</span>
                                    @elseif($withdrawal->status == 2)
                                        <span class="badge badge-light-danger">Rejected</span>
                                    @elseif($withdrawal->status == 3)
                                        <span class="badge badge-light-danger">Refunded</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::createFromDate($withdrawal->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate($withdrawal->updated_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit User</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <div class="alert-body">
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.update', ['id' => $user->id]) }}">
                        @csrf

                        <div class="col">
                            <label for="points">Current Points</label>
                            <input class="form-control" type="number" name="points"
                                   value="{{ $user->current_points }}" id="points">
                        </div>

                        <div class="col mt-2">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>

                        <div class="col">
                            <button class="btn btn-sm-block btn-success mt-1" name="action" value="save">Save</button>

                            @if($user->is_banned)
                                <button class="btn btn-sm-block btn-warning mt-1" name="action" value="ban">Unban
                                </button>
                            @else
                                <button class="btn btn-sm-block btn-danger mt-1" name="action" value="ban">Ban</button>
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
