@extends('layouts.landing')
@section('title', 'Privacy Policy')

@push('css')
    <style>
        .terms_condition-text {
            margin-bottom: 45px;
        }

        .page_title h3,
        .page_title .h3 {
            font-size: 48px;
            line-height: 60px;
            font-weight: 500;
        }

        li {
            display: flex;
        }

        .terms_condition-text li i {
            line-height: 30px;
            margin-right: 15px;
            font-size: 13px;
            color: #AEAED5;
        }

        .terms_condition-text li p {
            font-size: 15px;
        }

        .terms_condition-text h3 {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 30px;
            color: #f5f6f8;
        }
    </style>
@endpush

@section('content')
    <div class="" style="background-color: #161d31; padding-top: 50px">
        <div style="">
            <div class="page_title-content">
                <div class="col-xl-12">
                    <p class="text-center" style="font-size:24px">Last updated: February 6, 2022</p>
                    <h3 class="text-center text-white">Faq</h3>
                </div>
            </div>
        </div>

        <div class="container" style="margin-bottom: 0">
            <div class="col-xl-12">
                <div class="terms_condition-content">

                    <div class="terms_condition-text">
                        <h3>How do paid survey sites work? </h3>
                        <p>It's really easy. Simply take online surveys to answer questions about your opinion on a
                            variety of topics. Youth-Rewards rewards you when you complete surveys. Earn free gift cards
                            for your time or use your rewards towards sweepstakes for even bigger prizes. Cash out with
                            your PayPal account or Visa gift card.</p>
                    </div>


                    <div class="terms_condition-text">
                        <h3>Are survey websites a scam? </h3>
                        <p>Companies, brands, and organizations worldwide are always seeking the opinions of people just
                            like you to help shape new products they develop and how they market them. They count on
                            survey companies for market research to tap a global test market and provide them with
                            reliable information. If you spend time online and enjoy giving your opinion, paid surveys
                            are a great side hustle to earn a little extra cash while helping these companies.</p>
                        <p>There's no need to share your credit card information to start taking surveys.</p>
                    </div>

                    <div class="terms_condition-text mb-0 pb-4">
                        <h3>Do online survey sites really pay you? </h3>
                        <p>Legitimate online survey sites, like Youth-Rewards, InboxDollars, and MyPoints, really do
                            pay. Online survey companies need survey takers, consumers like you, to complete
                            questionnaires and give their honest feedback to market research companies. Your opinions
                            help companies and brands create better, new products and services.</p>
                        <p>In exchange for completing paid surveys, you can earn rewards. The best survey sites will
                            offer a variety of ways to cash out your rewards. Standard payout options include free gift
                            cards for Google Play, Amazon, Walmart, or Starbucks, a prepaid Visa credit card, or a
                            PayPal deposit to your PayPal account.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

