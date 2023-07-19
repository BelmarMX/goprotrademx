<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Seo Tags  --}}
        <title>@yield('title') - Soluciones MOCA</title>
        <meta name="description" content="@yield('description')">
        <meta name="author" content="Soluciones MOCA">
        {{-- Open Graphs  --}}
        <meta property="og:url" content="{{ url() -> current() }}">
        <meta property="type" content="website">
        <meta property="og:site_name" content="Soluciones MOCA">
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:image" content="@yield('image')">
        {{-- Favicons  --}}
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('v1/images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('v1/images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('v1/images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('v1/images/ico/apple-touch-icon-57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ asset('v2/img//fav.png') }}" title="Favicon">
        {{-- Polyfill --}}
        <script src="{{ asset('v1/js/observer.js') }}"></script>
        <script>IntersectionObserver.prototype.POLL_INTERVAL = 100;</script>
        {{-- Css Libraries --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('v2/css/lib/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
        <link rel="stylesheet" href="{{ asset('v2/css/lib/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('v2/css/lib/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('v2/css/lib/jquery.fancybox.css') }}">
        <link rel="stylesheet" href="{{ asset('v2/css/lib/lity.css') }}">
        <link rel="stylesheet" href="{{ asset('v2/css/lib/swiper.min.css') }}">
        {{-- Global Style --}}
        <link rel="stylesheet" href="{{ asset('v2/css/style.css') }}">
        @stack('css')
    </head>
    <body class="home-onePage">
        @include('site.v2.master.header')

        @yield('content')

        @include('site.v2.master.footer')

        <!-- Scripts -->
        @if( env('APP_ENV') != 'local' )
            @include('site.v2.master.gtag')
        @endif

        <script src="{{ asset('v2/js/lib/jquery-3.0.0.min.js') }}"></script>
        <script src="{{ asset('v2/js/lib/jquery-migrate-3.0.0.min.js') }}"></script>
        <script src="{{ asset('v2/js/lib/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('v2/js/lib/wow.min.js') }}"></script>
        <script src="{{ asset('v2/js/lib/jquery.fancybox.js') }}"></script>
        <script src="{{ asset('v2/js/lib/lity.js') }}"></script>
        <script src="{{ asset('v2/js/lib/swiper.min.js') }}"></script>
        <script src="{{ asset('v2/js/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('v2/js/lib/jquery.counterup.js') }}"></script>
        <script src="{{ asset('v2/js/lib/pace.js') }}"></script>
        <script src="{{ asset('v2/js/lib/scrollIt.min.js') }}"></script>
        <script src="{{ asset('v2/js/main.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js" defer></script>
        @stack('js')
        @if( env('MIX_USE_SWAL') )
            <link rel="stylesheet" href="{{ asset('v1/css/swal2.css') }}">
        @endif
    </body>
</html>
