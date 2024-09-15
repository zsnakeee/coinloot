@extends('layouts.dashboard')

@section('title', 'Shop')

@push('css')
    <link href='https://fonts.googleapis.com/css?family=Fira Code' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <style>
        .credit-card.is-paypal {
            background: linear-gradient(162deg, #0093c7 0, #213170 61%);
        }

        .credit-card.is-payeer {
            background: linear-gradient(162deg, #b7d4e9 0, #3598dc 61%);
        }

        .credit-card.is-vodafone-cash {
            background: linear-gradient(162deg, #ffafaf 0, #ee1c23 61%);
        }


        .credit-card.is-pubg-cash {
            background: linear-gradient(162deg, #ffb500 0, #fdca25 61%);
        }

        .credit-card.is-freefire-cash {
            background: linear-gradient(162deg, #7e00ff 0, #bd25fd 61%);
        }

        .credit-card {
            position: relative;
            display: flex;
            transition: transform .2s;
            margin-bottom: 20px;
            margin-right: 20px;
            flex-direction: column;
            justify-content: space-between;
            height: 120px;
            cursor: pointer;
            width: 400px;
            background: #ededed;
            border-radius: 10px;
            padding: 6px 10px 8px;
            overflow: hidden;
        }

        .quick-stats-inner {
            display: flex;
            flex-wrap: wrap;
            margin-left: -8px;
            margin-right: -8px;
        }

        .ltc {
            color: #f5f5f5;
            font-size: 50px;
        }

        .top .card-number span {
            font-family: fira code, monospace;
            font-size: 2.0rem;
            font-weight: 900;
            color: #fcfcfc;
            display: block
        }

        .top .card-number {
            display: flex;
            justify-content: space-between;
        }

        @media only screen and (max-width: 967px) {
            .credit-card {
                width: 300px;
            }
        }

        @media only screen and (max-width: 1267px) {
            .credit-card {
                width: 330px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Shop') }}</h4>
                </div>


                <div class="card-body">
                    <div class="quick-stats-inner">
                        @foreach($payments as $payment)
                            <a href="{{ route('user.shop.view', ['id' => $payment->id]) }}" class="link-footer">
                                <div class="credit-card shadow {{ $payment->class }}">
                                    <div class="shape"></div>
                                    <div class="top">
                                        <div class="card-number">
                                            <span>{{ $payment->name }}</span>
                                            <i class="{{ $payment->icon }} ltc"></i>
                                        </div>
                                    </div>
                                    <div class="bottom"><span></span></div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')

@endpush
