<div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                <div class="alert-body">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="alert-body">
                    @foreach ($errors->all() as $error)
                        <p> {{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.payments.update', ['id' => $payment->id]) }}">
            @csrf
            <div class="row">
                <div class="col-md-3 mt-1">
                    <input type="text" name="name" class="form-control" value="{{ $payment->name }}"
                           aria-label="Name" required="">
                </div>

                <div class="col-md-3 mt-1">
                    <input type="text" name="currency" class="form-control" value="{{ $payment->currency }}"
                           aria-label="Name" required="">
                </div>

                <div class="col-md-3 mt-1">
                    <button class="btn btn-success btn-sm-block me-1" type="submit" name="action" value="save">Save</button>
                    <button class="btn btn-warning btn-sm-block" type="submit" name="action" value="status">Change Status</button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr class="text-truncate">
                <th>Payment</th>
                <th>Name</th>
                <th>Price</th>
                <th>Points</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($prices as $price)
                <tr class="text-truncate">
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('app-assets/images/payments/' . $price->payment->image) }}"
                                 alt="Avatar" width="30">
                        </div>
                    </td>
                    <td>{{ $price->payment->name }}</td>
                    <td><strong>{{ $price->amount . ' '. $price->payment->currency }}</strong></td>
                    <td><strong>{{ $price->points }}</strong></td>
                    <td>{{ \Carbon\Carbon::createFromDate($price->created_at)->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-sm btn-block btn-primary" data-bs-toggle="modal"
                           data-bs-target="#inlineForm" wire:click="model({{ $price->id }})">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-modal-ex">
        <!-- Modal -->
        <div wire:ignore.self class="modal fade text-start" id="inlineForm" tabindex="-1"
             aria-labelledby="myModalLabel33"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Price</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form wire:submit.prevent="save">
                        <div class="modal-body">

                            <div class="mb-1">
                                <input type="text" wire:model="amount" placeholder="Name" value="{{ $amount }}" class="form-control"/>
                            </div>

                            <div class="mb-1">
                                <input type="text" wire:model="points" placeholder="points" value="{{ $points }}" class="form-control"/>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="col-12 text-centerpt-50">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
