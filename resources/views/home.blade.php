@extends('layouts.app')

@section('content')
@guest
<div class="container-fluid mb-3 z-depth-1">
	<section class="hero"></section>
</div>
<!-- Contenido -->
<div class="container my-3" id="contenidoPrincipal">
	<section class="row funciones text-center">
		<div class="col-md-4">
			<a class="card card-body flex-center hoverable">
				<i class="fa fa-list-ol fa-4x"></i>
				<hr>
				<h4>Generar Planeadores</h4>
				<p class="text-muted">Genera los planeadores academicos para tus clases</p>
			</a>
		</div>
		<div class="col-md-4">
			<a class="card card-body flex-center hoverable">
				<i class="fa fa-chalkboard-teacher fa-4x"></i>
				<hr>
				<h4>Gestion de Materas</h4>
				<p class="text-muted">Gestione sus materias asignadas por el Coodirnador de Carrera</p>
			</a>
		</div>
		<div class="col-md-4">
			<a class="card card-body flex-center hoverable">
				<i class="fa fa-plus-circle fa-4x"></i>
				<hr>
				<h4>y Más</h4>
				<p class="text-muted">Seguimiento de clases, reportes, entre otros.</p>
			</a>
		</div>
	</section>
</div>
@else
<div class="container">
	<div class="card card-body z-depth-1">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<img class="img-fluid img-avatar-full" src="{{ Auth::user()->getAvatar() }}" alt="Foto de {{ auth()->user()->nombre }}">
					<h6 class="text-muted">Bienvenido de vuelta</h6>
					<h4 class="font-weight-bold">{{ auth()->user()->nombre }}</h4>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12 text-center">
				<h5 class="h5-responsive font-weight-bold">¿Que deseas hacer hoy?</h5>
			</div>
			<div class="my-2 mx-auto">
				<ul class="nav font-weight-bold flex-center">
					@switch(auth()->user()->getRoleNames()[0])
					@case('Admin')
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-users fa-2x"></i>
							Registrar Secretario Academico
						</a>
					</li>
					@break
					@case('Secretario')
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-question fa-2x"></i>
							Link 1
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-question fa-2x"></i>
							Link 2
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-question fa-2x"></i>
							Link 3
						</a>
					</li>
					@break
					@case('Docente')
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-question fa-2x"></i>
							Link 1
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-question fa-2x"></i>
							Link 2
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link d-flex flex-column text-center">
							<i class="fa fa-question fa-2x"></i>
							Link 3
						</a>
					</li>
					@break
					@endswitch
				</ul>
			</div>
		</div>
	</div>
</div>
@endif
@endsection
