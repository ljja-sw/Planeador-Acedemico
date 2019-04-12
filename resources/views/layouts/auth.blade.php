<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#A81B2B">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Iniciar Sesion')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    
    <!-- Icon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-@yield('theme','primary') z-depth-0" >
            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarAdmin"
            aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

                <div class="collapse navbar-collapse text-center" id="navbarAdmin">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                <a href="{{route('login')}}" class="nav-link"> <i class="fa fa-sign-in-alt"></i> Inicio de sesion para Docentes</a>
            </li>
            <li class="nav-item {{ Request::is('login-secretario') ? 'active' : '' }}">
                <a href="{{route('login.secretario')}}" class="nav-link"> <i class="fa fa-sign-in-alt"></i> Inicio de sesion para Secretarios</a>
            </li>
               </ul>
        </div>
    </div>
</ul>
</div>   
</nav>

    <main id="content">
        @yield('content')
    </main>
</body>
</html>
