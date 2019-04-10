@extends('layouts.app')

@section('title',$user->nombre_completo())

@section('content')
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body align-items-center">
				<div class="imagen-perfil">
					<img src="{{ asset('/images/default_user.png')}}" alt="Foto de {{$user->nombre_completo()}}" class="imagen-peril--img">
				</div>
			</div>
			<div class="card card-body">
				<small>{{ $user->getRoleNames()[0]}}</small>
				<h2 class="h2-responsive font-weight-bold">
					{{$user->nombre}}
				</h2>
				<h5 class="h5-responsive text-muted">
					{{$user->apellido}}
				</h5>
				<hr>
				<p>Último inicio de sesión {{ now() }}</p>
				<ul class="nav mx-auto font-weight-bold">
					<li class="nav-item">
						<a href="{{ route('secretarios.edit',$user) }}" class="nav-link btn btn-info"> <i class="fa fa-pen"></i> Editar</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link btn btn-danger"> <i class="fa fa-trash"></i> Desactivar Usuario</a>
					</li>
				</ul>
			</div>
			<div class="card card-body">
				<small class="text-muted">Correo electrónico</small>
				<p class="font-weight-bold">{{$user->email}}</p>
				<small class="text-muted">Documento de identidad</small>
				<p class="font-weight-bold">{{$user->documento_identidad}}</p>
			</div>
		</div>
	</div>
	<div>	
		@endsection