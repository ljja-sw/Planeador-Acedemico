@extends('layouts.app')

@section('title',$docente->nombre_completo())

@section('content')
@include('admin.docente.modals.editar_docente')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">
				<div class="row">
					<div class="col-lg-4">
						<div class="text-center img-avatar">
							<img class="img-perfil rounded-circle z-depth-1" src="{{ url($docente->getAvatar()) }}" alt="Foto de {{$docente->nombre_completo()}}">
						</div>
					</div>
					<div class="col-lg-8 d-flex flex-column my-auto">
						<small>{{ $docente->getRoleNames()[0]}}</small>
						<h2 class="h2-responsive font-weight-bold">
							{{$docente->nombre}}
						</h2>
						<h5 class="h5-responsive text-muted">
							{{$docente->apellido}}
						</h5>
						<p>
							Ultimo inicio de sesión: 
							<span class="font-weight-bold">
								{{($docente->last_login) ? $docente->last_login->diffForHumans() : "Nunca"}}
							</span>
						</p>
						<ul class="nav mx-auto font-weight-bold text-center justify-content-center">
							<li class="nav-item">
								<a href="#" data-toggle="modal" data-target="#modal_editar_secretario" class="nav-link btn btn-primary
								"> <i class="fa fa-pen"></i> Editar</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link btn btn-outline-primary"> <i class="fa fa-trash"></i> Eliminar Docente</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">
				<small class="text-muted">Correo electrónico</small>
				<p class="font-weight-bold">{{$docente->email}}</p>
				<small class="text-muted">Documento de identidad</small>
				<p class="font-weight-bold">{{$docente->documento_identidad}}</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-lg-10 mx-auto">
			<!-- Clases para Hoy -->
			<div class="my-auto">
				<div class="card card-body">
					<small class="text-muted pb-2">Clases para hoy</small>
					@forelse ($clases as $clase)
					<div class="pl-2 py-3">
						<p class="m-0 text-muted">{{$clase->planeador->asignatura_planeador->nombre}}</p>
						<h4 class="m-0 h4-responsive font-weight-bold">{{$clase->tema}}</h4>
						<p class="m-0">{{$clase->metodología_tema->nombre}}</p>
					</div>
					@empty
					<b>{{$docente->nombre}} no tiene clases programadas para hoy</b>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-10 mx-auto">
			<!-- Asignaturas del Docente -->
			<div class="my-auto">
				<div class="card card-body">
					<small class="text-muted pb-2">Asignaturas</small>
					<div class="pl-2">
						<ul class="list-group list-group-flush">
							@forelse($docente->asignaturas as $asignatura)
							<li class="list-group-item">
								<a href="#">
									{{$asignatura->nombre}} - {{$asignatura->grupo}}
								</a>	
							</li>
							@empty
					<b>{{$docente->nombre}} no tiene asignaturas delegadas</b>
							@endforelse
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
