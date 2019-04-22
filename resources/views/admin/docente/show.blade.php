@extends('layouts.app')

@section('title',$docente->nombre_completo())

@section('content')
@include('admin.docente.modals.editar_docente')
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
						<div class="card card-body">
				<div class="row">
					<div class="col-md-12 col-lg-4 flex-center">
						<div class="text-center img-avatar" id="cambiar_avatar">
							<img class="img-perfil rounded-circle z-depth-1" src="{{ $docente->getAvatar() }}" alt="Foto de {{$docente->nombre_completo()}}">
						</div>
					</div>
					<div class="col-md-12 col-lg-8 d-flex  py-3 flex-column my-auto">
						<small>{{ $docente->getRoleNames()[0]}}</small>
						<h2 class="h2-responsive font-weight-bold">
							{{$docente->nombre}}
						</h2>
						<h5 class="h5-responsive text-muted">
							{{$docente->apellido}}
						</h5>
						<hr>
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
						<div class="pl-2">
							<h5 class="m-0 text-muted">Nombre Asignatura</h5>
							<h4 class="m-0 h4-responsive font-weight-bold">Tema</h4>
							<p class="m-0">Hora</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Fin Clases para hoy -->
		<div class="row">
			<div class="col-md-12 col-lg-10 mx-auto">
				<!-- Asignaturas del Docente -->
				<div class="my-auto">
					<div class="card card-body">
						<small class="text-muted pb-2">Asignaturas</small>
						<div class="pl-2">
							<ul class="list-group list-group-flush">
								@forelse($docente->asignaturas() as $asignatura)
									<li class="list-group-item">
										<a href="#">
											{{$asignatura->nombre}}
										</a>	
									</li>
								@empty
									Sin asignaturas delegadas
								@endforelse
								</ul>
							</div>
						</div>
					</div>
					<!-- Fin Asignaturas del Docente -->
				</div>
			</div>
</div>
@endsection
