@extends('layouts.landing')
@section('title', 'Earn Money Online & Gift Cards')

@section('content')
    <section class="hero hero-lead pb-50" id="hero">
        <div class="hero-cotainer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="hero-content">

                            <h1 class="hero-headline" style="color: #01c853">Earn Money Online & Claim Gift Cards</h1>
                            <p class="hero-bio">By Completing Offers, Surveys, Play Games And Watching Videos</p>

                            <div class="hero-action">
                                @if(Auth::check())
                                    <a class="btn btn--primary" data-scroll="scrollTo"
                                       href="@if(Auth::user()->role == 2){{ route('admin.home') }}@else{{ route('user.home') }}@endif"
                                       style="background-color: #01c853; border: 0px;">
                                        <span>Dashboard</span>
                                    </a>
                                @else
                                    <a class="btn btn--primary" data-scroll="scrollTo" href="{{ route('login') }}" style="background-color: #01c853; border: 0px;">
                                        <span>Get Started</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="hero-image">
                            <img class="img-fluid" src="{{ asset('app-assets/images/main/main.svg') }}" alt=""/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="skew-divider"></div>
    </section>

    <section class="features text-center" id="features">
        <div class="container">
            <div class="row clearfix">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <div class="heading text-center">
                        <h2 class="heading-title">our amazing features</h2>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12 col-lg-3 ">
                    <div class="feature-panel feature-panel-1">
                        <div class="feature-icon">
                            <div class="bg-img">
                                <img src="{{ asset('landing-assets/images/icons/bg-icon-1.svg') }}" alt="icon svg" />
                            </div>

                            <img src="{{ asset('app-assets/images/main/transfer.png') }}" alt="Icon" />
                        </div>

                        <div class="feature-content">
                            <h3>Daily Transfer</h3>
                            <p>We pay every day to withdraw requests. Fast transfer money to accounts.</p>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-3 ">
                    <div class="feature-panel feature-panel-2">
                        <div class="feature-icon">
                            <div class="bg-img">
                                <img src="{{ asset('landing-assets/images/icons/bg-icon-2.svg') }}" alt="icon svg" />
                            </div>
                            <img src="{{ asset('app-assets/images/main/money.png') }}" alt="Icon" />
                        </div>
                        <div class="feature-content">
                            <h3>Earn Money & Gift Cards</h3>
                            <p>You can earn money easily by watching videos and playing games</p>
                        </div>
                    </div>

                </div>


                <div class="col-12 col-lg-3 ">
                    <div class="feature-panel feature-panel-3">
                        <div class="feature-icon">
                            <div class="bg-img">
                                <img src="{{ asset('landing-assets/images/icons/bg-icon-3.svg') }}" alt="icon svg" />
                            </div>
                            <img src="{{ asset('app-assets/images/main/surveys.png') }}" alt="Icon" />
                        </div>
                        <div class="feature-content">
                            <h3>Survey Routers</h3>
                            <p>Brands want to understand their customers and improve their products with paid surveys.</p>
                        </div>
                    </div>

                </div>


                <div class="col-12 col-lg-3 ">
                    <div class="feature-panel feature-panel-4">
                        <div class="feature-icon">
                            <div class="bg-img">
                                <img src="{{ asset('landing-assets/images/icons/bg-icon-4.svg') }}" alt="icon svg" />
                            </div>
                            <img src="{{ asset('app-assets/images/main/bouns.png') }}" alt="Icon" />
                        </div>
                        <div class="feature-content">
                            <h3>Daily Bonuses</h3>
                            <p>Even if you live in a country with less surveys, you can earn free daily bonuses and giveaways.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="about bg-pink" id="about">
        <div class="container">
            <div class="row align-items-center text-center-xs">
                <div class="col-12 col-lg-6">
                    <img class="img-fluid" src="{{ asset('app-assets/images/main/main2.jpg') }}" alt="" />
                </div>

                <div class="col-12 col-lg-5">
                    <div class="heading mb-40">
                        <p class="heading-subtitle" style="color: white">about us</p>
                        <h2 class="heading-title">Best platform for earning money online</h2>
                        <p class="heading-desc">Best platform for earning money online and get gift cards by completing offers, surveys, play games and watching videos.</p>
                    </div>
                </div>

            </div>

    </section>
@endsection

