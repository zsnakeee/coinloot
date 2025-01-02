<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <title>@yield('title') | {{ config('app.name') }}</title>
        <script type='application/ld+json'>
            {
                "@context": "http://www.schema.org",
                "@type": "WebSite",
                "name": "{{ config('app.name') }}",
            "alternateName": "coupons, cash back, cash app, Paid Online Surveys, Free Gift Cards, promo codes, offers, discounts, deals, coupon codes, timebucks, swagbucks, earn by click, paid by click, referral earn money online, earn money watching videos, click to pay earn money, make money signing up, easy earn, withdraw paypal, withdraw bitcoin, fast pay, easy offers, free game card, freefire gift, pubg gift, free gift card, fast earn, minimun withdraw, payperclick, surveys, make money online, CPA, CPL, CPV, ways to earn money, earn cash online,take surveys and make money,free online survey jobs,money surveys,earn survey,best online survey sites,best surveys to earn money,take surveys for money,get paid surveys,paid surveys scams,get paid for surveys,take surveys for cash,take surveys,survey sites to make money,cash for surveys,online survey for money,paid survey online,get paid for online surveys,paid to take surveys,best online surveys to make money,online survey rewards,best surveys for money,pay me for surveys,the best online surveys for money,which online surveys pay the most,top survey sites to earn money",
            "url": "{{ config('app.url') }}"
        }
        </script>

        <link rel="alternate" hreflang="en" href="{{ config('app.url') }}">
        <link rel="canonical" href="{{ config('app.url') }}">
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="keywords"
              content="coupons, cash back, cash app, Paid Online Surveys, Free Gift Cards, promo codes, offers, discounts, deals, coupon codes, timebucks, swagbucks, earn by click, paid by click, referral earn money online, earn money watching videos, click to pay earn money, make money signing up, easy earn, withdraw paypal, withdraw bitcoin, fast pay, easy offers, free game card, freefire gift, pubg gift, free gift card, fast earn, minimun withdraw, payperclick, surveys, make money online, CPA, CPL, CPV, ways to earn money, earn cash online,take surveys and make money,free online survey jobs,money surveys,earn survey,best online survey sites,best surveys to earn money,take surveys for money,get paid surveys,paid surveys scams,get paid for surveys,take surveys for cash,take surveys,survey sites to make money,cash for surveys,online survey for money,paid survey online,get paid for online surveys,paid to take surveys,best online surveys to make money,online survey rewards,best surveys for money,pay me for surveys,the best online surveys for money,which online surveys pay the most,top survey sites to earn money">
        <meta name="description"
              content="Earn FREE Gift Rewards 2021 And Free Stuff Cards by Searching Make Surveys, Answering Surveys, and more at {{ config('app.name') }}. Paid Online Surveys.">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ config('app.name') }}: Paid Online Surveys &amp; Free Gift Cards">
        <meta property="og:description"
              content="Earn rewards and free stuff by searching and shopping online, answering surveys, and more at {{ config('app.name') }}, a customer loyalty rewards program. Be rewarded today.">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:site_name" content="{{ config('app.name') }}: Paid Online Surveys &amp; Free Gift Cards">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:creator" content="{{ '@' . config('app.name') }}">
        <meta name="twitter:site" content="{{'@' . config('app.name') }}">
        <meta property="og:image" content="{{ asset('app-assets/images/thumbnail.jpg') }}">
        <meta property="og:image:width" content="1575">
        <meta property="og:image:height" content="756">

        <link rel="icon" href="{{ asset('app-assets/images/ico/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/favicon.png') }}" type="image/x-icon">


        <link rel="preconnect" href="https://fonts.gstatic.com/"/>
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&amp;display=swap"
            rel="stylesheet"/>

        <link href="{{ asset('landing-assets/css/vendor.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('landing-assets/css/style.css') }}" rel="stylesheet"/>

        {{--        <script async src="https://www.googletagmanager.com/gtag/js?id=G-"></script>--}}
        {{--        <script>--}}
        {{--            window.dataLayer = window.dataLayer || [];--}}

        {{--            function gtag() {--}}
        {{--                dataLayer.push(arguments);--}}
        {{--            }--}}

        {{--            gtag('js', new Date());--}}

        {{--            gtag('config', 'G-');--}}
        {{--        </script>--}}

        <style>
            .header .navbar .navbar-nav > li.active > a,
            .header .navbar .navbar-nav > li > a:focus,
            .header .navbar .navbar-nav > li > a:hover {
                color: #01c853;
            }

            .header .navbar .navbar-nav > li > a {
                color: #ffffff;
            }

            .header .navbar .navbar-nav > li.active > a:before,
            .header .navbar .navbar-nav > li > a:focus:before,
            .header .navbar .navbar-nav > li > a:hover:before {
                background-color: #01c853;
            }

            section {
                background-color: #161d31;
            }

            .hero {
                background-color: #161d31;
            }

            .skew-divider {
                background: linear-gradient(to right bottom, #161d31 49%, #161d31 50%), linear-gradient(-50deg, #161d31 16px, #000 0);
            }

            .bg-pink {
                background-color: #161d31;
            }

            .heading .heading-title {
                color: #01c853;
            }

            .navbar .navbar-collapse {
                background-color: #161d31;
            }

            @media screen and (max-width: 991px) {

                .header .navbar .navbar-nav > li.active,
                .header .navbar .navbar-nav > li:hover,
                .header .navbar .navbar-nav > li:focus,
                .header .navbar .navbar-nav > li:active {
                    background-color: #01c853;
                }

                .header .navbar .navbar-nav > li.active > a,
                .header .navbar .navbar-nav > li > a:focus,
                .header .navbar .navbar-nav > li > a:hover {
                    color: white;
                }
            }
        </style>

        @stack('css')
    </head>

    <body class="body-scroll">

        <div class="wrapper clearfix" id="wrapperParallax">
            <header class="header header-light header-sticky">
                <nav class="navbar navbar-sticky navbar-expand-lg flex-column" id="primary-menu"
                     style="background-color: #161d31">

                    {{-- CoinHub Banner Sponser --}}
                    <div class="container-fluid position-static d-block mb-2"
                         style="background-color: #01c853 !important; z-index: 99999">
                        <div class="container p-2">
                            <a
                                class=""
                                style="color: #ffffff; font-size: 16px; font-weight: 700; margin-left: 10px; text-decoration: none;"
                                href="https://coinhub.ziadt.dev"
                                target="_blank">
                                🚀 Discover the Future of Finance at CoinHub! <span style="margin-left: 5px;">Learn More <i class="fa fa-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>

                    <div class="container">
                        <a class="logo navbar-brand" href="{{ route('home') }}">
                            <img class="logo logo-dark" src="{{ asset('app-assets/images/logo/logo.png') }}"
                                 width="200px"
                                 alt="{{ config('app.name') }}"/>
                            <img class="logo logo-light" src="{{ asset('app-assets/images/logo/logo.png') }}"
                                 width="200px"
                                 alt="{{ config('app.name') }}"/>
                        </a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarContent" aria-expanded="false">
                            <span class="navbar-toggler-icon" style="color: #01c853"></span>
                        </button>

                        @php
                            function href($route) {
                                return Route::is('home') ? '#'.$route : route('home').'#'.$route;
                            }
                        @endphp

                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav ml-auto">
                                <li @class(['nav-item', 'active' => Route::is('home')])>
                                    <a class="nav-link" data-scroll="scrollTo" href="{{ href('hero') }}">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-scroll="scrollTo"
                                       href="{{ href('features') }}">Features</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-scroll="scrollTo" href="{{ href('about') }}">About</a>
                                </li>

                                <li @class(['nav-item', 'active' => Route::is('faq')])>
                                    <a class="nav-link" href="{{ route('faq') }}">Faq</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-scroll="scrollTo" href="{{ href('footer') }}">Contact</a>
                                </li>
                            </ul>

                            <div class="module-container">
                                <div class="module module-cta">
                                    @if(Auth::check())
                                        <a class="btn" data-scroll="scrollTo"
                                           href="@if(Auth::user()->role == 2){{ route('admin.home') }}@else{{ route('user.home') }}@endif"
                                           style="background-color: #01c853; border: 0px;">
                                            <span>Dashboard</span>
                                        </a>
                                    @else
                                        <a class="btn" data-scroll="scrollTo" href="{{ route('login') }}"
                                           style="background-color: #01c853; border: 0px;">
                                            <span>Login</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            @yield('content')

            <footer class="footer" id="footer" style="padding-top: 100px; background-color: #161d31;">

                <div class="skew-divider-top"
                     style="background: linear-gradient(to right bottom,#161d31 49%,#161d31 50%),linear-gradient(-50deg,#161d31 16px,#000 0);">
                </div>

                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="footer-logo" style="margin-bottom: 10px;">
                                    <a class="logo" href="{{ route('home') }}">
                                        <img class="logo logo-light"
                                             src="{{ asset('app-assets/images/logo/logo.png') }}" width="200px"
                                             alt="{{ config('app.name') }}"/>
                                    </a>
                                </div>
                                <p>Best platform for earning money online and get gift cards by completing offers,
                                    surveys, play
                                    games and watching videos..</p>
                            </div>

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="footer-widget">
                                    <h6 class="widget-title">important links</h6>
                                    <ul class="list-unstyled">
                                        <li><a href="#about">About Us</a></li>
                                        <li><a href="term-condition">Terms & Condition</a></li>
                                        <li><a href="privacy-policy">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="footer-widget">
                                    <h6 class="widget-title">Contact Us</h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="mailto:support@coin-loot.com" style="text-transform: none;">
                                                support@coin-loot.com
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-3">
                                <div class="footer-widget">
                                    <h6 class="widget-title">Our Social Media</h6>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="https://www.facebook.com/Free-loot-106538708675440/">
                                                <i class="fab fa-facebook-f"></i> Facebook
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom" style="background-color: #161d31;">
                    <div class="container">
                        <hr/>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12 text--center">
                                <div class="footer-copyright">
                            <span>
                                {{ date('Y') }} &copy;
                                <a href="https://www.facebook.com/snake2019">Ziad Talaat</a>
                                . All rights reserved.
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>
        </div>

        <script src="{{ asset('landing-assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('landing-assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('landing-assets/js/functions.js') }}"></script>

        @stack('js')
    </body>

</html>
