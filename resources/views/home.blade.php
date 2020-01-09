@extends('layouts.app')

@section('content')
@include('admin.secretario.modals.delegar_asignatura_docente')
@include('libs.select2')

<div class="container">
	<div class="card card-body z-depth-1">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<img class="img-fluid rounded-circle z-depth-2 img-avatar-full" src="{{ Auth::user()->getAvatar() }}" alt="Foto de {{ auth()->user()->nombre }}">
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
						<a href="{{route('secretarios.create')}}" class="btn btn-elegant  text-center ">
							<i class="fa fa-users"></i>
							Registrar Secretario Academico
						</a>
					</li>
					@break
					@case('Secretario')
					<li class="nav-item">
						<a href="#" class="btn btn-elegant text-center" data-toggle="modal" data-target="#modal_delegar_asignatura_docente">
							<i class="fa fa-chalkboard-teacher"></i>
							<i class="fa fa-arrow-right"></i>
							<i class="fa fa-user"></i>
							Delegar Asignatura a Docente
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('reporteclase.show')}}" class="btn btn-elegant text-center">
							<i class="fa fa-chalkboard-teacher"></i>
							<i class="fa fa-arrow-right"></i>
							<i class="fa fa-user"></i>
							Lista de Reportes Docentes
						</a>
					</li>
					@break
					@case('Docente')
					<li class="nav-item">
						<a href="#!" data-target="#modal_planeador_asignatura" data-toggle="modal" class="btn btn-elegant  text-center ">
							<i class="fa fa-list"></i>
							Crear Planeador Académico
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('reportes')}}" class="btn btn-elegant  text-center ">
							<i class="fa fa-question"></i>
							Realizar Reporte
						</a>
					</li>
					@break
					@endswitch
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection
