@extends('layouts.app')

@section('title',$user->nombre_completo())

@section('content')
@include('admin.secretario.modals.editar_secretario')
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
						<div class="card card-body">
				<div class="row">
					<div class="col-md-12 col-lg-4 flex-center">
						<div class="text-center img-avatar" id="cambiar_avatar">
							<img class="img-perfil rounded-circle z-depth-1" src="{{ $user->getAvatar() }}" alt="Foto de {{$user->nombre_completo()}}">
						</div>
					</div>
					<div class="col-md-12 col-lg-8 d-flex  py-3 flex-column my-auto">
						<small>{{ $user->getRoleNames()[0]}}</small>
						<h2 class="h2-responsive font-weight-bold">
							{{$user->nombre}}
						</h2>
						<h5 class="h5-responsive text-muted">
							{{$user->apellido}}
						</h5>
						<hr>
						<ul class="nav mx-auto font-weight-bold text-center justify-content-center">
							<li class="nav-item">
								<a href="#" data-toggle="modal" data-target="#modal_editar_secretario" class="nav-link btn btn-primary
								"> <i class="fa fa-pen"></i> Editar</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link btn btn-outline-primary"> <i class="fa fa-trash"></i> Desactivar Usuario</a>
							</li>
						</ul>
						</div>
					</div>
				</div>
			<div class="card card-body">
				<small class="text-muted">Correo electrónico</small>
				<p class="font-weight-bold">{{$user->email}}</p>
				<small class="text-muted">Documento de identidad</small>
				<p class="font-weight-bold">{{$user->documento_identidad}}</p>
			</div>
		</div>
	</div>
	<!-- Fin Datos del Usuario -->
</div>
@endsection
