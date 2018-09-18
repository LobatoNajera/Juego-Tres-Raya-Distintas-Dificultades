<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Juego Tres en Raya') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">

    <!-- Alertify -->
    <link rel="stylesheet" href="{{ asset('css/alertify.core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/alertify.default.css') }}">

    <!-- Juego Tres Raya -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_juego.css') }}">
    <link rel="shortcut icon" href="{{ asset('imagen/logo.png') }}">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-primary navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Barra de Navegacion</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i style="margin-right: 5px;" class="glyphicon glyphicon-home"></i>
                        <strong>Inicio Juego Tres en Raya</strong>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ route('login') }}">
                                <i style="margin-right: 2px;" class="glyphicon glyphicon-log-in"></i>
                                Iniciar Sesión</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}">
                                <i style="margin-right: 2px;" class="glyphicon glyphicon-registration-mark"></i>
                                Registrarse</a>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i style="margin-right: 2px;" class="glyphicon glyphicon-log-out"></i>
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    
    <script type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/ripples.min.js"></script>
    
    <script>
        $.material.init();
    </script>

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Alertify -->
    <script type="text/javascript" src="{{ asset('js/alertify.min.js') }}"></script>
    
    <!-- Juego Tres Raya -->
    <?php if (isset($juego_tres_raya)) { ?>
        {!! Html::script('js/autoplay.js') !!}
        {!! Html::script('js/check_manager.js') !!}
        {!! Html::script('js/message_manager.js') !!}
        {!! Html::script('js/smart.js') !!}
        {!! Html::script('js/musica.js') !!}
        {!! Html::script('js/dificultad_legendaria.js') !!}
    <?php } ?>

</body>
</html>
