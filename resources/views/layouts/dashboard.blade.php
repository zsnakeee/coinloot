<!doctype html>
<html class="loading dark-layout" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="dark-layout"
      data-textdirection="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
        />

        <link rel="icon" href="{{ asset('app-assets/images/ico/favicon.png') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/favicon.png') }}" type="image/x-icon">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
              href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
              href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <!-- END: Custom CSS-->

        <link href="https://fonts.googleapis.com/css?family=Laravolt" rel="stylesheet">

        <style>
            .alert {
                opacity: 1;
            }
        </style>
        @stack('css')
    </head>

    <body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover"
          data-menu="horizontal-menu" data-col="">

        {{-- CoinHub Banner Sponser --}}
        <div class="container-fluid position-fixed d-block text-center"
             style="background-color: #01c853 !important; z-index: 99999; padding-bottom: 5px">
            <a
                style="color: #ffffff; font-size: 16px; font-weight: 700; margin-left: 10px; text-decoration: none;"
                href="https://coinhub.ziadt.dev"
                target="_blank">
                🚀 Discover the Future of Finance at CoinHub! <span style="margin-left: 5px;">Learn More <i class="fa fa-arrow-right"></i></span>
            </a>
        </div>

        <!-- BEGIN: Header-->
        <nav
            class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" style="top: 25px"
            data-nav="brand-center">
            <div class="navbar-header d-xl-block d-none">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" width="170px">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container d-flex content">
                <div class="bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav d-xl-none">
                        <li class="nav-item">
                            <a class="nav-link menu-toggle" href="#">
                                <i class="ficon" data-feather="menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav align-items-center ms-auto">
                    <li class="nav-item d-block d-lg-block">
                        <a class="nav-link nav-link-style">
                            <i class="ficon" data-feather="sun"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown dropdown-notification me-25">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown" id="notidrop">
                            <i class="ficon" data-feather="bell"></i>

                            @if(auth()->user()->notifications()->where('is_read', 0)->count() > 0)
                                <span class="badge rounded-pill bg-danger badge-up" id="new_noti">
                                {{ auth()->user()->notifications()->where('is_read', 0)->count() }}
                            </span>
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header d-flex">
                                    <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                                    <div
                                        class="badge rounded-pill badge-light-primary" id="new_noti2">
                                        {{ auth()->user()->notifications()->where('is_read', 0)->count() }} New
                                    </div>
                                </div>
                            </li>

                            <li class="scrollable-container media-list">
                                @forelse(auth()->user()->notifications()->get() as $notification)
                                    <a class="d-flex" href="#">
                                        <div class="list-item d-flex align-items-start">
                                            <div class="list-item-body flex-grow-1">
                                                <p class="media-heading">{{ $notification->title }}</p>
                                                <small class="notification-text"> {{ $notification->message }}</small>

                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <a class="d-flex" href="#">
                                        <div class="list-item d-flex align-items-start">
                                            <div class="list-item-body flex-grow-1">
                                                <p class="media-heading">No notifications</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforelse
                            </li>

                            <li class="dropdown-menu-footer">
                                <a class="btn btn-primary w-100" href="#">Mark all as read</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none">
                        <span
                            class="user-name fw-bolder">{{ auth()->user()->name() }}</span>
                                <span class="user-status">@if(auth()->user()->is_admin)
                                        Admin
                                    @else
                                        User
                                    @endif</span>
                            </div>
                            <span class="avatar">
                        <img class="round"
                             src="{{ auth()->user()->avatar() }}"
                             alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                            @if(auth()->user()->is_admin)
                                <a class="dropdown-item" href="{{ route('admin.home') }}">
                                    <i class="me-50" data-feather="shield"></i>
                                    Admin panel
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('user.transactions') }}">
                                    <i class="me-50" data-feather="repeat"></i>
                                    Transactions
                                </a>
                            @endif

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('user.settings') }}">
                                <i class="me-50" data-feather="settings"></i>
                                Settings
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="me-50" data-feather="power"></i>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
                </ul>
            </div>
        </nav>
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        <div class="horizontal-menu-wrapper">
            <div
                class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-dark navbar-shadow menu-border container-xxl" style="top: 77px"
                role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
                <div class="navbar-header">
                    <ul class="nav navbar-nav flex-row">
                        <li class="nav-item me-auto">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" width="170px">
                            </a>
                        </li>

                        <li class="nav-item nav-toggle">
                            <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                                   data-feather="x"></i>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="shadow-bottom"></div>
                <!-- Horizontal menu content-->
                <div class="navbar-container main-menu-content" data-menu="menu-container">
                    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

                        <li class=" navigation-header d-xl-none">
                            <span data-i18n="Home">Home</span>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "dashboard" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.home') }}">
                                <i data-feather="home"></i>
                                <span data-i18n="Home">Home</span>
                            </a>
                        </li>

                        <li class=" navigation-header d-xl-none">
                            <span data-i18n="Earn">Earn & Withdraw</span>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "earn" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.earn') }}">
                                <i data-feather="dollar-sign"></i>
                                <span data-i18n="Earn">Earn</span>
                            </a>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "shop" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.shop') }}">
                                <i data-feather="shopping-cart"></i>
                                <span data-i18n="Shop">Shop</span>
                            </a>
                        </li>

                        <li class=" navigation-header d-xl-none">
                            <span data-i18n="Others">Others</span>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "leaderboard" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.leaderboard') }}">
                                <i data-feather="award"></i>
                                <span data-i18n="Leaderboard">Leaderboard</span>
                            </a>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "transactions" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.transactions') }}">
                                <i data-feather="repeat"></i>
                                <span data-i18n="Transactions">Transactions</span>
                            </a>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "live-leads" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.live-leads') }}">
                                <i data-feather="activity"></i>
                                <span data-i18n="Live Leads">Live Leads</span>
                            </a>
                        </li>

                        <li class="nav-item {{ basename(Request::route()->uri) === "history" ? 'active' : '' }}">
                            <a class="nav-link d-flex align-items-center" href="{{ route('user.history') }}">
                                <i data-feather="pocket"></i>
                                <span data-i18n="History">History</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row"></div>
                <div class="content-body">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light footer-shadow" style="padding: 0">
            <p class="clearfix mb-0 text-center">
                    <span class=" d-block d-md-inline-block mt-25">
                        <i data-feather="chevrons-left"></i>
                        Developed by <a href="https://wa.me/+201127070346" target="_blank">Ziad Talaat</a><i
                            data-feather="chevrons-right"></i>
                    </span>
            </p>
        </footer>

        <button class="btn btn-primary btn-icon scroll-top" type="button">
            <i data-feather="arrow-up"></i>
        </button>
        <!-- END: Footer-->

        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
        <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        @stack('scripts')
        <!-- END: Page JS-->

        <script>
            $(window).on('load', function () {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#notidrop').click(function () {
                notificationsMarkAsRead();
            });

            function notificationsMarkAsRead() {
                $.ajax({
                    url: "{{ route('notifications.read') }}",
            type: "POST",
            data: {},
            success: function (data) {
                if (data === "success") {
                    $('#new_noti').remove();
                    $('#new_noti2').remove();
                }
            }
        });
    }
</script>
</body>
</html>
