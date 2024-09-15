@extends('layouts.admin')

@section('title', "Withdrawals manage")

@push('css')
    @livewireStyles
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @livewire('withdrawals')
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    @livewireScripts
@endpush
