@extends('layouts.app')

@section('content')
@include('libs.datatables')
@include('admin.programa.crear')

<div class="container">
	<div class="row">
		<div class="col-md-12 mx-auto card-deck">
			<div class="card card-body table-responsive">
				<h3 class="font-weight-bold card-title m-4">
					<i class="fa fa-graduation-cap text-muted"></i>
					Programas Academicos
				</h3>
				<div class="text-right">
					<a href="#" data-toggle="modal" data-target="#modal-programas" class="btn btn-elegant"><i class="fa fa-plus"></i> Registrar Programa</a>
				</div>
				<table id="tabla_asignaturas" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Codigo</th>
							<th></th>            
						</tr>
					</thead>
					<tbody>
						@foreach($programas as $programa)
						<tr>
							<td>{{ $programa->nombre }}</td>
							<td>{{ $programa->codigo }}</td>
							<td>
								<a title="Detalles" href="{{route('programa.detalles', $programa)}}" class="nav-item btn-table--edit"><i class="fa fa-plus"></i>Detalles			
								</a>               
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@push("scripts")
<script>
	$('#tabla_asignaturas').DataTable({
		'info': false,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		}
	});
</script>
@endpush 
@stop