<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>
    <!-- Icono -->
    <link rel="icon" type="image/png" href="img/logo.png" />
    <!-- Styles --> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animations.css') }}">   
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top yellow">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <img src="{{ asset('img/logo.png') }}" class="pull-left" height="50" width="50">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <b style="color: black !important"> {{ config('app.name', 'Laravel') }} </b>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('/login') }}">
                            Iniciar Sesión
                        </a>
                    </li>          
                </ul>
            </div>
        </nav>

            @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/css3-animate-it.js') }}"></script>
</body>
</html>
