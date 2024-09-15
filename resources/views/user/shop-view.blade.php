@extends('layouts.dashboard')

@section('title', "Payment Checkout")

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $payment->name }} Checkout</h4>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            <div class="alert-body">
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            <div class="alert-body">
                                <p>{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.shop.checkout', ['id'=> $payment->id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Amount<span class="text-danger">*</span></label>
                            <input @class(['form-control mt-1', 'is-invalid' => $errors->has('amount')])
                                   type="number" id="amount" name="amount"
                                   placeholder="Enter the amount you want to checkout">
                            @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="payment">Address<span class="text-danger">*</span></label>
                            <input @class(['form-control', 'mt-1', 'is-invalid' => $errors->has('address')])
                                   type="text" id="payment" name="address"
                                   placeholder="Enter your payment account or number">

                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <button class="btn btn-sm-block btn-success" type="submit">Checkout</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')

@endpush
