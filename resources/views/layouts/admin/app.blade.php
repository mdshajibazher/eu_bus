<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}- @yield('title')</title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="{{asset('public/css/material_icons.css')}}" rel="stylesheet" type="text/css">

    
    <!-- Waves Effect Css -->
    <link href="{{asset('public/asset/plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <!-- Tostr Css -->
    <link href="{{asset('public/asset/css/toastr.min.css')}}" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{asset('public/asset/plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <!-- Bootstrap Core Css -->
    <link href="{{asset('public/asset/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <!-- Morris Chart Css-->
    <link href="{{asset('public/asset/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
     <!-- Tostr Css-->
     <link href="{{asset('public/asset/css/toastr.min.css')}}" rel="stylesheet" />

    @stack('css')

    <!-- Custom Css -->
    <link href="{{asset('public/asset/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('public/asset/css/themes/all-themes.css')}}" rel="stylesheet" />

    <link href="{{asset('public/style.css')}}" rel="stylesheet">
</head>
<body class="theme-blue">


     <!-- Page Loader -->
     <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    @include('partial.topbar')

    @include('partial.sidebar')

    <section class="content">
    @yield('content')
    </section>
     <!-- Jquery Core Js -->
     <script src="{{asset('public/asset/plugins/jquery/jquery.min.js')}}"></script>
      <!-- Bootstrap Js  -->
      <script src="{{asset('public/asset/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
     <!-- Tostr Js -->
     <script src="{{asset('public/asset/js/toastr.min.js')}}"></script>
     <script type="text/javascript">toastr.options = {"closeButton":true,"debug":false,"newestOnTop":true,"progressBar":true,"positionClass":"toast-bottom-right","preventDuplicates":false,"onclick":null,"showDuration":"300","hideDuration":"1000","timeOut":"5000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"};
     </script>
     {!! Toastr::message() !!}

     <!-- Select Plugin Js -->
     <script src="{{asset('public/asset/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
 
     <!-- Slimscroll Plugin Js -->
     <script src="{{asset('public/asset/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
 
     <!-- Waves Effect Plugin Js -->
     <script src="{{asset('public/asset/plugins/node-waves/waves.js')}}"></script>
 
 
 
    
     @stack('js')
 
     <!-- Custom Js -->
     <script src="{{asset('public/asset/js/admin.js')}}"></script>
 
 
     <!-- Demo Js -->
     <script src="{{asset('public/asset/js/demo.js')}}"></script>


</body>
</html>
