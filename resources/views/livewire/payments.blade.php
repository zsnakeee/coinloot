<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Payments</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-success btn-sm-block"
                            wire:click="onAddModal()"
                            data-bs-toggle="modal"
                            data-bs-target="#payment-modal">Add New Payment
                    </button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr class="text-truncate">
                    <th>Payment</th>
                    <th>Name</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr class="text-truncate">
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ Storage::url($payment->photo_path) }}"
                                     alt="{{ $payment->name }}" width="30">
                            </div>
                        </td>
                        <td>{{ $payment->name }}</td>
                        <td><strong>{{ $payment->currency }}</strong></td>
                        <td>
                            @if($payment->is_active)
                                <span class="badge badge-light-success">Active</span>
                            @else
                                <span class="badge badge-light-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($payment->created_at)->diffForHumans() }}</td>
                        <td>
                            <button class="btn btn-sm btn-block btn-primary"
                                    wire:click="view({{ $payment->id }})"
                                    data-bs-toggle="modal"
                                    data-bs-target="#payment-modal">
                                <i data-feather="edit-2"></i>
                            </button>
                            <button class="btn btn-sm btn-block btn-danger" wire:click="delete({{ $payment->id }})">
                                <i data-feather="trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-modal-ex">
            <div wire:ignore.self class="modal fade text-start" id="payment-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ $is_edit ? 'Update Payment' : 'Add Payment' }}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form wire:submit.prevent="submit">
                            <div class="modal-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                        <div class="alert-body">
                                            <p>{{ session('success') }}</p>
                                        </div>
                                    </div>
                                @endif

                                <div class="mb-1">
                                    <input @class(['form-control', 'is-invalid' => $errors->has('name')])
                                           type="text" wire:model="name" placeholder="Name" required/>
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-1">
                                    <input @class(['form-control', 'is-invalid' => $errors->has('currency')])
                                           type="text" wire:model="currency" placeholder="Currency" required/>
                                    @error('currency')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-1">
                                    <input @class(['form-control', 'is-invalid' => $errors->has('photo')])
                                           type="file" wire:model="photo" id="customFile1" accept="image/*"/>
                                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-12 text-centerpt-50">
                                    <button type="submit" class="btn btn-success btn-block">Save</button>
                                    @if($is_edit)
                                        <button wire:click="changeStatus" type="button"
                                                class="btn btn-warning btn-block">
                                            Change Status
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('element.updated', (el, component) => {
                feather.replace({
                    width: 14,
                    height: 14
                });
            })
        });
    </script>
@endpush
