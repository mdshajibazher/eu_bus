<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EUBUS') }}</title>



    @stack('css')
    <!-- Select 2 css -->
    <link href="{{ asset('public/asset/css/select2.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/style.css') }}">
</head>
<body class="{{Auth::check() ? 'logged_in' : ''}}">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto main-menu">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Student Login') }}</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.login') }}">Admin Login</a>
                        </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Student Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('information.index')}}">Class Information</a> 
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Seat Reservation</a> 
                     </li>
                            <li class="nav-item">
                                   <a class="nav-link" href="">My Profile</a> 
                            </li>
                            <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Jquery -->
    <script src="{{asset('public/asset/plugins/jquery/jquery.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--Popper Js-->
    <script src="{{asset('public/js/popper.js')}}"></script>
    <!--Select 2 -->
    <script src="{{asset('public/asset/js/select2.min.js')}}"></script>
     @stack('customjs')
</body>
</html>