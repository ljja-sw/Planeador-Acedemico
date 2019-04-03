@extends('layouts.app')
@section('title','Mi Perfil')

@section('content')
@include('modals.cambiar_contraseña')
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<!-- Datos del Usuario -->
			<div class="my-auto">
				<div class="card card-body flex-center text-center py-2">
					<div class="row">
						<div class="col-md-6">
							<img class="img-perfil border-radius m-3" src="{{ asset('images/default_user.png') }}"
							alt="Foto de nombre_completo">
						</div>
						<div class="col-md-6 my-auto ">
							<small class="text-muted">{{ auth()->user()->getRoleNames()[0]}}</small>
							<h3 class="h3-responsive font-weight-bold">
								{{ auth()->user()->nombre_completo()}}
							</h3>
							<p>{{ auth()->user()->email}}</p>
							<div class="py-2">
								<a href="#" data-toggle="modal" data-target="#modal_cambiar_contraseña">Cambiar Contraseña</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Fin Datos del Usuario -->

			
			@hasrole('docente')
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
			<!-- Fin Clases para hoy -->
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
				@endhasrole
			</div>
		</div>
	</div>
	@endsection
