@extends('layouts.dashboard')

@section('title', "Transactions")

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Your transactions</h4>
                </div>


                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Payment Method</th>
                            <th>Points</th>
                            <th>Payment way</th>
                            <th>Status</th>
                            {{--                            <th>Note</th>--}}
                            <th>Requested on</th>
                            <th>Responded on</th>
                        </tr>

                        @forelse($withdrawals as $withdrawal)
                            <tr class="text-truncate">
                                <td>{{ $withdrawal->method }}</td>
                                <td><strong>{{ $withdrawal->amount }}</strong></td>
                                <td>{{ $withdrawal->account }}</td>
                                <td>
                                    @if($withdrawal->status == 'pending')
                                        <span class="badge badge-light-warning">Pending</span>
                                    @elseif($withdrawal->status == 'approved')
                                        <span class="badge badge-light-success">Approved</span>
                                    @elseif($withdrawal->status == 'rejected')
                                        <span class="badge badge-light-danger">Rejected</span>
                                    @endif
                                </td>
                                {{--                                <td>{{ $withdrawal->note }}</td>--}}
                                <td>{{ $withdrawal->created_at->diffForHumans() }}</td>
                                <td>{{$withdrawal->updated_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <p class="text-center mt-1">no transactions yet</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
