<!doctype html>
<html lang="en" class="remember-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Dashboard - Trivia App</title>
    <meta name="description" content="hodcrm">
    <meta name="author" content="hodcrm">
    <meta name="robots" content="hodcrm">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="hodcrm">
    <meta property="og:site_name" content="hodcrm">
    <meta property="og:description" content="hodcrm">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
    <script src="{{ asset('assets/js/setTheme.js') }}"></script>

    @livewireStyles
</head>

<body>

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">

        <nav id="sidebar">
            <div class="sidebar-content">
                <div class="content-header justify-content-lg-center">
                    <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                        <span class="smini-hidden">
                            <i class="fa fa-fire text-primary"></i>
                            <span class="fs-4 text-dual">Trivia</span><span class="fs-4 text-primary">App</span>
                        </span>
                    </a>
                </div>

                <div class="js-sidebar-scroll">
                    <div class="content-side content-side-user px-0 py-0">
                        <div class="smini-visible-block animated fadeIn px-3">
                            <img class="img-avatar img-avatar32" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
                        </div>
                        <div class="smini-hidden text-center mx-auto">
                            <a class="img-link" href="javascript:void(0)">
                                <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="">
                            </a>
                            <ul class="list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a class="link-fx text-dual fs-sm fw-semibold text-uppercase" href="javascript:void(0)">{{ auth()->user()->name }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
                                        <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="link-fx text-dual" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out-alt"></i>
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>

                    @if (auth()->user()->hasRole('admin'))
                        @include('layouts.sidebars.admin')
                    @else
                        @include('layouts.sidebars.user')
                    @endif
                </div>
            </div>
        </nav>

        <header id="page-header">
            @include('layouts.headers.header')
        </header>

        <main id="main-container">
            {{ $slot }}
        </main>

        @include('layouts.footer')
    </div>

    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_pages_dashboard.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    @livewireScripts
</body>

</html>
