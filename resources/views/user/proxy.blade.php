@extends('layouts.dashboard')

@section('title', 'Proxy Detected')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Proxy detection</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                    <p>You are using a proxy. Please disable your proxy and try again.</p>
                                </div>
                            </div>

                            <a href="{{ route('user.earn') }}" class="btn btn-success">Try again</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
