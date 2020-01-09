@extends('layouts.app')

@section('title',$programa->nombre)
@section('content')

@include('admin.programa.modals.editar-programa')
@include('admin.programa.modals.eliminar-programa')
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card card-body">
				<div class="px-3 pt-3">
					<div class="row">
						<div class="col-md-8">
							<h4 class="font-weight-bold">
								{{$programa->nombre}} <small class="text-muted">{{$programa->codigo}}</small>
							</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 ml-auto">
							<a href="#modal_editar_programas" data-toggle="modal" class="btn btn-primary"><i class="fa fa-pen"></i> Editar</a>
							<a href="#modal_eliminar_programas" data-toggle="modal" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Eliminar</a>
						</div>
					</div>
					<hr class="py-2">
					<div class="px-3 table-responsive text-muted">
						<h4 class="font-weight-bold mb-3">Asignaturas</h4>
						<table id="tabla_asignaturas" class="table datatable table-striped">
							<thead class="text-center">
								<tr>
									<th>
										<b>Nombre</b>
									</th>
									<th>
										<b>Código</b>
									</th>
									<th>
										<b>Grupo</b>
									</th>
									<th style="width:230px;">
										<b>Acciones</b>
									</th>
								</tr>
							</thead>
							<tbody class="text-center">
									@foreach ($programa->asignaturas as $asignatura_grupo)
                                    <tr>

											<td>{{$asignatura_grupo->asignatura->nombre}}</td>
											<td>{{$asignatura_grupo->asignatura->codigo}}</td>
											<td>{{$asignatura_grupo->grupo->numero}}</td>
											<td><a href="#!">Detalles</a></td>
										</tr>
									@endforeach
							</tbody>
						</table>
						<div class="float-right mt-3">
							<a href="#modal_agregar_horario" data-toggle="modal" class="btn btn-elegant"><i class="fa fa-plus"></i> Registrar Asignatura en: {{$programa->nombre}} </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@push("scripts")
	<script>
		$('#tabla_asignaturas').DataTable({
			"paging": false,
			"ordering": true,
			"info": false,
			"searching": false,
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
			}
		});
		$('.dataTables_length').addClass('bs-select');


	</script>
	@endpush
