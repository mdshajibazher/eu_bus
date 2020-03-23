<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <link rel="stylesheet" href="{{asset('public/css/welcome.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    </head>
    <body >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Student Login</a>
                        <a href="{{ route('admin.login') }}">Admin Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Student Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <div id="particles-js">
            <div class="wrapper">
        <div class="flex-center full-height">
            <div class="content welcome-content">
                 <img src="{{asset('public/image/logo.png')}}" alt="">
                <div class="title m-b-md">
                    EU BUS MANAGEMENT

                </div>
            </div>
        </div>
    </div>
        </div>
        <script src="{{asset('public/js/jquery.js')}}"></script>
        <script src="{{asset('public/js/particle.js')}}"></script>
        <script>
            particlesJS.load('particles-js', 'public/js/particles.json',function(){
     console.log('particle.json loaded');
});

        </script>
    </body>
</html>
