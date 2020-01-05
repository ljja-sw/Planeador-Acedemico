@extends('layouts.app')
@section('title','Mi Perfil')

@section('content')
@include('modals.cambiar_contraseña')
@include('modals.cambiar_imagen')

<div class="container">
	<div class="card card-body row">
		<div class="row">
			<div class="col-md-4 text-center">
				<div class="text-center img-avatar">
					<img class="img-perfil rounded-circle z-depth-1" src="{{ auth()->user()->getAvatar() }}" alt="Foto de {{auth()->user()->nombre_completo()}}">
				</div>
			</div>
			<div class="col-lg-8 my-auto">
				<small>{{ auth()->user()->getRoleNames()[0]}}</small>
				<h2 class="h2-responsive font-weight-bold">
					{{auth()->user()->nombre}}
				</h2>
				<h5 class="h5-responsive text-muted">
					{{auth()->user()->apellido}}
				</h5>
				<hr>
                @hasanyrole('Docente|Secretario')
                <ul class="nav mx-auto font-weight-bold justify-content-center">
					<li class="nav-item">
						<a href="#" data-toggle="modal" class="nav-link" data-toggle="modal" data-target="#modal_cambiar_avatar">
							<i class="fa fa-user-circle"></i> Cambiar Imagen</a>
						</li>
						<li class="nav-item">
							<a href="#" data-toggle="modal" data-target="#modal_cambiar_contraseña" class="nav-link"> <i class="fa fa-key"></i> Cambiar Contraseña</a>
						</li>
					</ul>
                @endhasanyrole
				</div>
			</div>
		</div>
		<div class="row card card-body">
			<small class="text-muted">Correo electrónico</small>
			<p class="font-weight-bold">{{auth()->user()->email}}</p>
			<small class="text-muted">Documento de identidad</small>
			<p class="font-weight-bold">{{auth()->user()->documento_identidad}}</p>
		</div>
	</div>
	@endsection
