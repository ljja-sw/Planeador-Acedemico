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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('favicon.png') }}">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container" >
        <div class="row flex-center">
                <div class="card card-login p-3">
                    <div class="card-body flex-center mt-1">
                        @yield('content')
                    </div>
                    <div class="mx-auto text-center">
                        <img class="img-fluid logo-login" src="{{ asset('images/logo_color.png') }}" alt="">
                    </div>
                </div>
        </div>
    </div>
</body>
<script>
    // We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});
</script>
</html>
