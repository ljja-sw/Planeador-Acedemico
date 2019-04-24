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
    <main id="content" style="height:100vh">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">                        
                @yield('content')
                <hr>
                <div class="mx-auto text-center">
                    <h6 class="h6-responsive font-weight-bold">Iniciar Sesion como</h6>
                    @if (Request::is('*login'))
                        <a href="{{url('login-secretario')}}" class="btn btn-outline-elegant"><b><i class="fa fa-users"></i> Secretario Academico</b></a>
                    @elseif(Request::is('*login-secretario'))
                        <a href="{{url('login')}}" class="btn btn-outline-elegant"><b><i class="fa fa-chalkboard-teacher"></i> Docente</b></a>
                    @else
                        <a href="{{url('login-secretario')}}" class="btn btn-outline-elegant"><b><i class="fa fa-users"></i> Secretario Academico</b></a>
                        <a href="{{url('login')}}" class="btn btn-outline-elegant"><b><i class="fa fa-chalkboard-teacher"></i> Docente</b></a>
                    @endif
                </div>
        </div>
    </div>
    </div>
    </div>
    </main>
</body>
</html>
