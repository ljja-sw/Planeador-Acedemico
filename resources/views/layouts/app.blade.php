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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
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
                    <div class="dropdown-menu " aria-labelledby="perfilDropdown" style="min-width: 270px">
                        @hasrole('Secretario')
                        <a class="dropdown-item" href="{{route('admin.configuraciones')}}">
                            <i class="fa fa-cog"></i>
                            Configuraciones</a>
                            <div class="dropdown-divider"></div>
                            @endhasrole
                            <a class="dropdown-item" href="{{ route('perfil') }}"><i class="fa fa-user"></i>
                                {{ Auth::user()->nombre_completo() }}                             <small>{{Auth::user()->getRoleNames()->first()}}</small>
                            </a>
                                <a href="#" class="dropdown-item" href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out-alt"></i>
                                Cerrar Sesión
                        </a>
                    </li>
                </div>

                <div class="d-none d-lg-inline">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="perfilDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ auth()->user()->getAvatar() }}" class="rounded-circle z-depth-0 mx-1"
                        alt="{{Auth::user()->nombre}}" height="35" width="35">
                            <span class="d-none d-md-inline">{{ Auth::user()->nombre_completo() }}
                            </span>
                    </a>
                    <div class="dropdown-menu mx-auto dropdown-menu-right" aria-labelledby="perfilDropdown" style="min-width: 280px">
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
        <div style="min-height:70vh">
            @yield('content')
        </div>
    </main>
    <!-- Footer -->

    <!-- Footer -->
<footer class="page-footer font-small bg-primary pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">
  
      <!-- Grid row -->
      <div class="row align-items-center">
  
        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">
  
          <!-- Content -->
          <img class="img-footer img-fluid " src="{{asset("images/logo_blanco.png")}}" alt="Planeador Academico">
          <p class="ml-3">Planeador Académico Univalle 2020</p>
  
        </div>
        <!-- Grid column -->
  
        <hr class="clearfix w-100 d-md-none pb-3">
  
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
  
          <!-- Links -->
          <small>Desarrollado por</small>
          <h5><a href="#!ebanodigital.co"><img style="height: 35px" src="{{asset("images/ebanodigital.svg")}}"  alt=""><span class="pl-2">ébano digital</span></a></h5>
  
          <ul class="list-unstyled">
            <li>
            </li>
          </ul>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://pacifico.univalle.edu.co"> Universidad del Valle Sede Pacífico</a>
    </div>
    <!-- Copyright -->
  
  </footer>
  <!-- Footer -->
</div>
{{-- Scripts --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
@include('sweetalert::alert')
@stack('scripts-libs')
@stack('scripts')
</body>

</html>
