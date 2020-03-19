<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        
    

        <!-- Styles -->
        <style>
            html, body {
                background-color: #EA2027;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .wrapper{
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 60px;
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body id="particles-js">
        <div  class="wrapper">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('admin.login') }}">Admin Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                 <img src="{{asset('public/image/logo.png')}}" alt="">
                <div class="title m-b-md">
                    EU BUS MANAGEMENT

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
