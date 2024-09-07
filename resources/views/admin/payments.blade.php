@extends('layouts.admin')

@section('title', "Payments manage")

@push('css')
    @livewireStyles
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('payments')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
    @livewireScripts
@endpush
