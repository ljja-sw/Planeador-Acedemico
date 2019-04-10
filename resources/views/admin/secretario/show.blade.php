@extends('layouts.app')

@section('title',$user->nombre_completo())

@section('content')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="row">
				<div class="col-md-4 d-flex align-items-stretch">
					<div class="card card-body">
						<div class="text-center">
							<img src="{{ asset('/images/default_user.png')}}" alt="Foto de {{$user->nombre_completo()}}" class="img-perfil">
						</div>
					</div>
				</div>
				<div class="col-md-8 d-flex align-items-stretch">
					<div class="card card-body my-auto">
						<small>{{ $user->getRoleNames()[0]}}</small>
						<h2 class="h2-responsive font-weight-bold">
							{{$user->nombre}}
						</h2>
						<h5 class="h5-responsive text-muted">
							{{$user->apellido}}
						</h5>
						<hr>
						<p>Último inicio de sesión {{ now() }}</p>
						<ul class="nav mx-auto font-weight-bold text-center">
							<li class="nav-item">
						<a href="{{ route('secretarios.edit',$user) }}" class="nav-link btn btn-info"> <i class="fa fa-pen"></i> Editar</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link btn btn-danger"> <i class="fa fa-trash"></i> Desactivar Usuario</a>
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