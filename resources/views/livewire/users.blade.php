<div>
    <div class="card-header">
        <h4 class="card-title">Users Filter</h4>
    </div>

    <div class="card-body">
        <input wire:model="search" id="search" type="search"
               class="form-control" placeholder="email or username">
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Points</th>
                    <th>Last Seen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="text-truncate">
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar" style="margin-right: 1.5rem; font-size: calc(12.8px);">
                                    <img src="{{ $user->avatar() }}" alt="{{ $user->name() }}" height="30" width="30">
                                </div>
                                <div>
                                    <div class="font-weight-bolder">{{ $user->username }}</div>
                                    <div class="font-small-2 text-muted">{{ $user->email  }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->current_points }}</td>
                        <td>{{ \Carbon\Carbon::parse($user->last_seen_at)->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-block btn-primary"
                               href="{{ route('admin.users.view', ['id' => $user->id] ) }}">View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="h-100 d-flex align-items-center justify-content-center">

        <div class="row mt-1" style="margin: auto;">
            <div class="col align-self-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>


