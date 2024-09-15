@extends('layouts.dashboard')

@section('title', 'History')

@section('content')
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">History</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>COMPANY</th>
                            <th>NAME</th>
                            <th>POINTS</th>
                            <th>FINISHED ON</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr class="text-truncate">
                                <td>{{ $lead->company }}</td>
                                <td>{{ $lead->offer_name }}</td>
                                <td>{{ $lead->offer_points }}</td>
                                <td>{{ \Carbon\Carbon::createFromDate($lead->created_at)->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
