<div>
    <div class="card-header">
        <h4 class="card-title">Withdrawals Filter</h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label" for="transaction_type">Type</label>
                <select wire:model="transaction_type" id="transaction_type"
                        class="form-select text-capitalize mb-md-0 mb-2">
                    <option value="0" class="text-capitalize">All</option>
                    <option value="pending" class="text-capitalize">Pending</option>
                    <option value="approved" class="text-capitalize">Paid</option>
                    <option value="rejected" class="text-capitalize">Rejected</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label" for="search">Search</label>
                <input wire:model="transaction_search" id="search" type="search" class="form-control">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr class="text-truncate">
                <th>User</th>
                <th>Method</th>
                <th>Points</th>
                <th>Payment Way</th>
                <th>Status</th>
                <th>Requested on</th>
                <th>Responded on</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($withdrawals as $withdrawal)
                <tr class="text-truncate">
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                <img src="{{ $withdrawal->user->avatar() }}"
                                     alt="Avatar" height="30" width="30">
                            </div>
                            <div>
                                <div class="font-weight-bolder">{{ $withdrawal->user->name() }}</div>
                                <div class="font-small-2 text-muted">
                                    {{ $withdrawal->user->email }}
                                </div>
                            </div>
                        </div>
                    </td>
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
                    <td>{{ $withdrawal->created_at->diffForHumans() }}</td>
                    <td>{{ $withdrawal->updated_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-sm btn-block btn-primary" data-bs-toggle="modal"
                           data-bs-target="#inlineForm" wire:click="model({{ $withdrawal->id }})">
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Withdrawal</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">
                    @if(session('success'))
                        <div class="alert alert-success" role="alert" style="opacity: 1;">
                            <div class="alert-body">
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                    {{--                    <div class="mb-1">--}}
                    {{--                        <input type="text" placeholder="Note" wire:model="note" class="form-control"/>--}}
                    {{--                    </div>--}}
                </div>

                <div class="modal-footer">
                    <div class="col-12 text-center mb-1 pt-50">
                        <button type="button" class="btn btn-sm btn-success me-1"
                                wire:click="approve()">Approve
                        </button>

                        <button type="button" class="btn btn-sm btn-danger me-1"
                                wire:click="reject()">Reject
                        </button>

                        {{--                        <button type="button" class="btn btn-sm btn-danger me-1"--}}
                        {{--                                data-bs-dismiss="modal" wire:click="refund()">Refund--}}
                        {{--                        </button>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="h-100 d-flex align-items-center justify-content-center">

        <div class="row mt-1" style="margin: auto;">
            <div class="col align-self-center">
                {{ $withdrawals->onEachSide(0)->links() }}
            </div>
        </div>
    </div>

</div>


