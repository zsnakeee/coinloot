<div>
    <div class="card-header">
        <h4 class="card-title">Offerwalls</h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-success btn-sm-block" data-bs-toggle="modal"
                        data-bs-target="#inlineForm">Add New Wall
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr class="text-truncate">
                <th>Company</th>
                <th>Name</th>
                <th>Url</th>
                <th>Status</th>
                <th>Added at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offerwalls as $offerwall)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ Storage::url($offerwall->photo_path) }}"
                                 alt="{{ $offerwall->name }}" width="100">
                        </div>
                    <td class="text-truncate">{{ $offerwall->name }}</td>
                    <td>{{ $offerwall->iframe_url }}</td>
                    <td class="text-truncate">
                        @if($offerwall->is_active)
                            <span class="badge badge-light-success">Active</span>
                        @else
                            <span class="badge badge-light-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="">{{ \Carbon\Carbon::createFromDate($offerwall->created_at)->diffForHumans() }}</td>
                    <td class="text-truncate">
                        <a class="btn btn-sm btn-block btn-primary" data-bs-toggle="modal"
                           data-bs-target="#viewForm" wire:click="select({{ $offerwall->id }})">View</a>
                        <a class="btn btn-sm btn-block btn-danger"
                           onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                           wire:click="delete({{ $offerwall->id }})">Delete</a>
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
                        <h4 class="modal-title" id="myModalLabel33">Add New Offerwall</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form wire:submit.prevent="save" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-1">
                                <input type="text" wire:model.defer="name" placeholder="Name" class="form-control"/>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-1">
                                <input type="text" wire:model.defer="iframe" placeholder="Iframe" class="form-control"/>
                                <span class="text-muted small">replace user id with {user_id}</span>
                                @error('iframe')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-1">
                                <input class="form-control" type="file" wire:model="photo"
                                       id="customFile1" accept="image/*" required/>
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
    <div class="form-modal-ex">
        <!-- Modal -->
        <div wire:ignore.self class="modal fade text-start" id="viewForm" tabindex="-1"
             aria-labelledby="myModalLabel33"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Edit Wall</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form wire:submit.prevent="update">
                        <div class="modal-body">
                            <div class="mb-1">
                                <input type="text" wire:model="name" class="form-control" placeholder="Name" required/>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-1">
                                <input type="text" wire:model="iframe" class="form-control" placeholder="Iframe"
                                       required/>
                                <span class="text-muted small">replace user id with {user_id}</span>
                                @error('iframe')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-1">
                                <input class="form-control" type="file" wire:model="photo"
                                       id="customFile1" accept="image/*"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-12 text-centerpt-50">
                                <button type="submit" class="btn btn-success btn-block">Save</button>
                                <button wire:click="changeStatus" type="button" class="btn btn-warning btn-block">
                                    Change Status
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
        document.addEventListener('toasts', event => {
            toastr[event.detail.type](event.detail.message, event.detail.title);
            $('#inlineForm').modal('hide');
            $('#viewForm').modal('hide');
        });
    </script>
@endpush
