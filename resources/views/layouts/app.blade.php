<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Icono-->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top yellow">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <img src="{{ asset('img/logo.png') }}" class="pull-left" height="50" width="50">
                    @guest
                        <a class="navbar-brand" href="{{ url('/login') }}">
                            <b style="color: black !important"> {{ config('app.name', 'Laravel') }} </b>
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/admin') }}">
                            <b style="color: black !important"> {{ config('app.name', 'Laravel') }} </b>
                        </a>
                    @endguest
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse"> 
                    @guest
                    @else
                    <ul class="nav navbar-nav navbar-right">

                            <li><a href="{{ url('/configuracion') }}">
                            <i class="fa fa-cogs fa-3" aria-hidden="true"></i>
                            </a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>                              
                            </li>           
                        </ul>
                        @endguest
                </div>
            </div>
        </nav>
            @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>   
    <script src="{{ asset('js/css3-animate-it.js') }}"></script>
    @yield('scripts')
</body>
</html>
