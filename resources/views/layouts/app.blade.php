<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#A81B2B">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Planeador Académico')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.css') }}">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @stack('styles')

</head>

<body>

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">

                <a class="navbar-brand" href="/">
                    <span class="d-none d-md-inline">
                        <img src="/images/logo_alt.png" alt="Planeador Académico" title="Planeador Académico">
                    </span>
                    <span class="font-weight-bold">Planeador</span> Académico <small class="">BETA</small>
                </a>

                <div class="collapse navbar-collapse text-center" id="navbarOptions">
                    <ul class="navbar-nav mr-auto">
                        @include('layouts.nav')
                    </ul>
                </div>

                <ul class="navbar-nav ml-auto d-flex flex-row align-items-center">
                    <li class="nav-item">
                        <button class="navbar-toggler m-0" type="button" data-toggle="collapse"
                            data-target="#navbarOptions" aria-controls="navbarPrincipal" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span><i class="fas fa-bars"></i></span>
                        </button>
                    </li>

                    <div class="dropleft d-lg-none d-inline">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ auth()->user()->getAvatar() }}" class="rounded-circle z-depth-0 mx-1"
                                    alt="{{Auth::user()->nombre}}" height="35" width="35">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="perfilDropdown" style="width: 270px">
                                @hasrole('Secretario')
                                <a class="dropdown-item" href="{{route('admin.configuraciones')}}">
                                    <i class="fa fa-cog"></i>
                                    Configuraciones</a>
                                <div class="dropdown-divider"></div>
                                @endhasrole
                                <a class="dropdown-item" href="{{ route('perfil') }}"><i class="fa fa-user"></i>
                                    {{ Auth::user()->nombre_completo() }}</a>
                                <a href="#" class="dropdown-item" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i>
                                    Cerrar Sesión
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                        </li>
                    </div>

                    <div class="d-none d-lg-inline">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ auth()->user()->getAvatar() }}" class="rounded-circle z-depth-0 mx-1"
                                    alt="{{Auth::user()->nombre}}" height="35" width="35">
                                <span class="d-none d-md-inline">{{ Auth::user()->nombre_completo() }}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="perfilDropdown" style="width: 270px">
                                @hasrole('Secretario')
                                <a class="dropdown-item" href="{{route('admin.configuraciones')}}">
                                    <i class="fa fa-cog"></i>
                                    Configuraciones</a>
                                <div class="dropdown-divider"></div>
                                @endhasrole
                                <a class="dropdown-item" href="{{ route('perfil') }}"><i class="fa fa-user"></i> Mi
                                    Perfil</a>
                                <a href="#" class="dropdown-item" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i>
                                    Cerrar Sesión
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                        </li>
                    </div>

                </ul>
            </div>
            </div>
        </nav>
    </header>

    <div id="app">
        <main class="content my-3">
            @if(session()->has('msj'))
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="alert alert-success" role="alert" data-dimiss="alert">{{session('msj')}}</div>
                    </div>
                </div>
            </div>
            @elseif(count($errors) > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="alert alert-danger" role="alert" data-dimiss="alert">
                            <h6 class="font-weight-bold">Por favor corrija los siguientes errores:</h6>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div style="min-height:65vh">
                @yield('content')
            </div>
        </main>
        <!-- Footer -->
        <footer class="page-footer font-small bg-dark pt-4">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-10 mx-auto text-center">
                        <img class="img-footer img-fluid " src="/images/logo_blanco.png" alt="">
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-12">
                        <p class="text-center">
                            <a href="http://pacifico.univalle.edu.co" target="_blank">
                                <strong> Universidad del Valle Sede Pacifico,</strong>
                            </a> 2019
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    @include('sweetalert::alert')
    @stack('scripts-libs')
    @stack('scripts')
</body>

</html>
