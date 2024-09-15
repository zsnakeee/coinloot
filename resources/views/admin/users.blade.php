@extends('layouts.admin')

@section('title', "Users Manage")

@push('css')
    @livewireStyles
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @livewire('users')
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    @livewireScripts
@endpush
