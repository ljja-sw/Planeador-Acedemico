@extends('layouts.app')
@section('title','Mi Perfil')

@section('content')

@include('modals.cambiar_contraseña')
@include('modals.cambiar_imagen')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">
				<div class="row">
					<div class="col-md-12 col-lg-4 flex-center">
						<div class="text-center img-avatar" id="cambiar_avatar">
							<img class="img-perfil rounded-circle z-depth-1" src="{{ auth()->user()->getAvatar() }}" alt="Foto de {{auth()->user()->nombre_completo()}}">
						</div>
					</div>
					<div class="col-md-12 col-lg-8 d-flex  py-3 flex-column my-auto">
						<small>{{ auth()->user()->getRoleNames()[0]}}</small>
						<h2 class="h2-responsive font-weight-bold">
							{{auth()->user()->nombre}}
						</h2>
						<h5 class="h5-responsive text-muted">
							{{auth()->user()->apellido}}
						</h5>
						<hr>
						<ul class="nav mx-auto font-weight-bold">
							<li class="nav-item">
								<a href="#" data-toggle="modal" class="nav-link" data-toggle="modal" data-target="#modal_cambiar_avatar">
									<i class="fa fa-user-circle"></i> Cambiar Imagen</a>
								</li>
								<li class="nav-item">
									<a href="#" data-toggle="modal" data-target="#modal_cambiar_contraseña" class="nav-link"> <i class="fa fa-key"></i> Cambiar Contraseña</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="card card-body">
					<small class="text-muted">Correo electrónico</small>
					<p class="font-weight-bold">{{auth()->user()->email}}</p>
					<small class="text-muted">Documento de identidad</small>
					<p class="font-weight-bold">{{auth()->user()->documento_identidad}}</p>
				</div>
			</div>
		</div>
		<!-- Fin Datos del Usuario -->
		@hasrole('Docente')
		<div class="row">
			<div class="col-md-12 col-lg-10 mx-auto">
				<!-- Clases para Hoy -->
				<div class="my-auto py-2">
					<div class="card card-body">
						<small class="text-muted pb-2">Clases para hoy</small>
						<div class="pl-2">
							<p class="m-0 text-muted">Dia</p>
							<h4 class="m-0 h4-responsive font-weight-bold">Nombre Asignatura</h4>
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
				<div class="my-auto py-2">
					<div class="card card-body">
						<small class="text-muted pb-2">Tus asignaturas</small>
						<div class="pl-2">
							<ul class="list-group list-group-flush">
								<?php for($i=1;$i<=5;$i++): ?>
								<li class="list-group-item"><a href="#">4-12314M-50 INTRODUCCIÓN A LOS
									PÁJAROS-<?= $i  ?></a></li>
									<?php endfor; ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- Fin Asignaturas del Docente -->
				</div>
			</div>
			@endhasrole
		</div>
		@endsection
		