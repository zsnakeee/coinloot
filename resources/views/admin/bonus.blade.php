@extends('layouts.admin')

@section('title', "Manage Bonus")

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Bonus</h4>
                </div>

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

                    <form method="POST" action="{{ route('admin.bonus.add') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 mt-1">
                                <input type="text" name="code" class="form-control" placeholder="Code" aria-label="Name"
                                       aria-describedby="basic-addon-name" required="">
                            </div>

                            <div class="col-md-3 mt-1">
                                <input type="number" name="points" class="form-control" placeholder="Points"
                                       aria-label="Name"
                                       aria-describedby="basic-addon-name" required="">
                            </div>


                            <div class="col-md-3 mt-1">
                                <input type="number" name="max" class="form-control" placeholder="Max users"
                                       aria-label="Name"
                                       aria-describedby="basic-addon-name" required="">
                            </div>

                            <div class="col-md-3 mt-1">
                                <button class="btn btn-success btn-sm-block">Add</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Points</th>
                            <th>Limit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <form method="post" action="{{ route('admin.bonus.update') }}">
                            @csrf

                            {{ method_field('PUT') }}
                            @foreach($bonuses as $bonus)
                                <tr class="text-truncate">
                                    <td>{{ $bonus->code }}</td>
                                    <td>{{ $bonus->points }}</td>
                                    <td>{{ $bonus->history->count() . '/'. $bonus->max_uses }}</td>
                                    <td>
                                        @if($bonus->is_active)
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">Expired</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($bonus->is_active)
                                            <button class="btn btn-danger btn-sm btn-sm-block" name="change"
                                                    value="{{ $bonus->id }}">Expire
                                            </button>
                                        @else
                                            <button class="btn btn-success btn-sm btn-sm-block" name="change"
                                                    value="{{ $bonus->id }}">Activate
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
