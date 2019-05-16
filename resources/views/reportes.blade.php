@extends('layouts.app')


@section('content')

<div class="container">
@forelse(auth()->user()->asignaturas as $asignatura)	
	<div class="col-md-10 mx-auto">
		<div class="card card-body">
			<div class="row">
				<div class="col-md-4 text-center">
					<small class="text-muted">Asignatura</small>
					<h2 class="font-weight-bold card-title">{{$asignatura->nombre}}</h2> 
					<small class="text-muted">Codigo</small>
					<h3 class="font-weight-bold card-title">{{$asignatura->codigo}}</h3>
				</div>
				<div class="col-md-4">
					<a href="{{ route('reporte.creacion')}}" class="btn btn-elegant card-body btn-lg btn-block"><i class="fa fa-align-justify"></i>
					Crear
					</a>
					<a href="#" class="btn btn-elegant card-body btn-lg btn-block">
						<i class="fa fa-folder-open"></i>
						Visualizar
					</a>						
				</div>
			</div>
		</div>
	</div>
@empty
	<div class="card card-body col-md-12 mx-auto">
		<h1>!Lo sentimos por el momento no hay materias asignadas¡</h1>			
	</div>
@endforelse
</div>
@endsection
		