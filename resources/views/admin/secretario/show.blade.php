@extends('layouts.app')

@section('title',$user->nombre_completo())

@section('content')
<style>
	.card-perfil{
		height: 300px;
	}
	.imagen-perfil{
		height: 270px;
	}
	img.imagen-peril--img{
		height: 250px;
	}
</style>

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-4">
			<div class="card card-body card-perfil flex-center">
				<div class="imagen-perfil">
					<img src="{{ asset('/images/default_user.png')}}" alt="Foto de {{$user->nombre_completo()}}" class="imagen-peril--img">
				</div>
			</div>
		</div>
		<div class="col-md-8">
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
			</div>
		</div>
	</div>
	<div>	
		@endsection