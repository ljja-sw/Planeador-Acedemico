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
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	@stack('styles')

</head>
<body>

	<header>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand mr-3" href="/">
                <img src="/images/logo_alt.png" alt="Planeador Académico">
                Planeador <span class="font-weight-bold">Académico</span> <small class="">BETA</small>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar"
            aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-ellipsis-v"></i></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="mainNavbar">
            <ul class="navbar-nav mr-auto">
                <!-- Aqui van los enlaces para cada rol -->
                @include('layouts.nav')
            </ul>
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                @guest
                <li class="nav-item">
                    <a href="{{route('login')}}" class="btn btn-light"> <i class="fa fa-sign-in-alt"></i> Iniciar Sesion</a>
                </li>
                @else
                <li class="nav-item pt-1">
                    <a href="{{ route('perfil') }}" class="nav-link">
                        <img src="{{ auth()->user()->getAvatar() }}" class="rounded-circle z-depth-0 m-1" alt="{{Auth::user()->nombre}}"
                        height="35" width="35">
                        <span>{{ Auth::user()->nombre_completo() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i>
                    Cerrar Sesión
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </div>
    @endguest
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
@include('sweetalert::alert')
@stack('scripts-libs')
@stack('scripts')
</body>
</html>
