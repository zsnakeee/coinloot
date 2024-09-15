@extends('layouts.admin')

@section('title', "Payments manage")

@push('css')
    @livewireStyles
@endpush


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payments</h4>
                </div>

                @livewire('prices')

            </div>
        </div>
    </div>

@endsection

@push('scripts')

    @livewireScripts
@endpush
