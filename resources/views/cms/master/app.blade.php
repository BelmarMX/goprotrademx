<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dispersión CMS</title>
        <link rel="shortcut icon" href="{{ asset('images/cms/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap">

        <!-- Styles -->
        <link href="{{ asset('v1/css/cms.css') }}" rel="stylesheet">
    </head>
    <body @isset( $is_login ) class="login" @endif>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img width="236" height="34" src="{{ asset('v1/images/cms/cms.svg') }}" alt="Content Management System">
                    </a>

                    <div class="collapse navbar-collapse">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       data-bs-toggle="dropdown"
                                       href="#"
                                    >
                                        <i class="bi bi-person-fill"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"
                                        >
                                            <i class="bi bi-door-closed"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="{{ asset('v1/js/cms.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('v1/css/swal2-admin.css') }}">
    </body>
</html>
