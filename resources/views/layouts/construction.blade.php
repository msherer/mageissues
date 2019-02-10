<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'mageIssues') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        #footer a {
            color: #ffa500;
        }



        .overlay {
            opacity: 0.8;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -10;
            transition: all .5s ease;
            width: 100%;
            height: 100%;
        }
        .opacity-80 {
            opacity: 0.8;
        }

        .gradient-1 {
            background: #fe7259; /* Old browsers */
            background: -moz-linear-gradient(left,  #fe7259 0%, #ffc456 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, right top, color-stop(0%,#fe7259), color-stop(100%,#ffc456)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(left,  #fe7259 0%,#ffc456 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(left,  #fe7259 0%,#ffc456 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(left,  #fe7259 0%,#ffc456 100%); /* IE10+ */
            background: linear-gradient(to right,  #fe7259 0%,#ffc456 100%); /* W3C */
        }

        .overlay-color {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .overlay-image {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .background-image {
            background-image: url('images/construction/milwaukee.jpg');
        }

        .cover-background {
            z-index: -1;
        }

        .navbar {
            z-index: -10;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <div>
                <a class="navbar-brand" style="margin-bottom: -50px;" href="{{ url('/') }}">
                    <span style="font-size: 2em;"><span style="color: #ffa500;">mage</span>Issues</span>
                </a><br/>
                <span class="text-muted font-italic" style="font-size: .7em;">Shits broke, we fix it</span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">BROWSE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tags') ? 'active' : '' }}" href="{{ url('/tags') }}">TAGS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('user/issue/create') ? 'active' : '' }}" href="{{ url('/user/issue/create') }}">LOG ISSUE</a>
                    </li>
                </ul>

                <!-- Search Form -->
                <form class="form-inline ml-auto" method="post" action="{{ url('search') }}">
                    {{ csrf_field() }}

                    <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-4">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                PROFILE <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('user/issue') }}">
                                    {{ __('My Issues') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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

    <main class="py-4">
        @yield('content')
    </main>
    <div class="overlay">
        <div class="overlay-color gradient-1 opacity-80"></div>
        <div class="overlay-image cover-background background-image"></div>
    </div>
</div>
<div id="footer" class="py-4 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 pt-1 pb-1">
                <div class="col-6 float-left">
                    <a href="{{ url('/') }}">We Fix it</a> | <a href="https://kopiluwakdirect.com/">Built with Caffiene</a> | <a href="{{ url('about') }}">About</a>
                </div>
                <div class="col-6 float-left">
                    <span class="float-right"><a href="https://twitter.com/sat_boodead">Twitter</a> | <a href="https://www.mediotype.com/">Mediotype</a> | <a href="https://magento.com/">Magento</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
