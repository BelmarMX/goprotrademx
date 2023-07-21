<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Seo Tags  --}}
        <title>@yield('title') - GoProTradeMX</title>
        <meta name="description" content="@yield('description')">
        <meta name="author" content="GoProTradeMX">
        {{-- Open Graphs  --}}
        <meta property="og:url" content="{{ url() -> current() }}">
        <meta property="type" content="website">
        <meta property="og:site_name" content="GoProTradeMX">
        <meta property="og:title" content="@yield('title')">
        <meta property="og:description" content="@yield('description')">
        <meta property="og:image" content="@yield('image')">
        {{-- Favicons  --}}
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('v1/images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('v1/images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('v1/images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('v1/images/ico/apple-touch-icon-57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ asset('v1/img/fav.png') }}" title="Favicon">
        {{-- Polyfill --}}
        <script src="{{ asset('v1/js/observer.js') }}"></script>
        <script>IntersectionObserver.prototype.POLL_INTERVAL = 100;</script>
        {{-- Css Libraries --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
        {{-- Global Style --}}
        <link rel="stylesheet" href="{{ asset('v1/css/app.css') }}">
        @stack('css')
    </head>
    <body>
    @include('site.v2.master.header')

    @yield('content')

    @include('site.v2.master.footer')

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/be9a032394.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" defer></script>
    <script src="{{ asset('v1/js/app.js') }}"></script>
    @stack('js')
    @if( env('MIX_USE_SWAL') )
        <link rel="stylesheet" href="{{ asset('v1/css/swal2.css') }}">
    @endif
    </body>
</html>
