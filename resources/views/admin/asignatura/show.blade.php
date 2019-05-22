@extends('layouts.app')

@section('content')
@include('libs.datatables')

<div class="container">
	<div class="row">
		<div class="col-md-12 mx-auto card-deck">
			<div class="card card-body table-responsive">
				<h3 class="font-weight-bold card-title m-4">
		          <i class="fa fa-book-reader text-muted"></i>
		          Asignaturas
		        </h3>
		        <div class="text-right">
		          <a href="{{route('asignatura.crear')}}" class="btn btn-elegant">
		            <i class="fa fa-plus"></i>
		            Registrar asignaruras
		          </a>
		        </div>
						<table id="tabla_asignaturas" class="text-center table datatable table-striped table-bordered">
							<thead>
			                <tr>
			                  <th style="min-width:200px">Nombre</th>
			                  <th>Codigo</th>
			                  <th>Grupo</th>
			                  <th>Credito</th>
			                  <th>Habilitable</th>
			                  <th>Validable</th>
			                  <th>Intensidad Horaria</th>
			                  <th></th>
			                </tr>
			                </thead>
			                <tbody>
			              @foreach($asignaturas as $asignatura)
			              <tr>
			              <td>{{ $asignatura->nombre }}</td>
			              <td>{{ $asignatura->codigo }}</td>
			              <td>{{ $asignatura->grupo }}</td>
			              <td>{{ $asignatura->creditos }}</td>
			              <td>{{ ($asignatura->habilitable) ? 'Si' : 'No' }}</td>
			              <td>{{ ($asignatura->validable) ? 'Si' : 'No' }}</td>
			              <td>{{ $asignatura->intensidad_horaria }}</td>
			              <td>
			                <a title="Detalles" href="{{ route('asignatura.detalles', $asignatura) }}" class="nav-item btn-table--edit">
			                	<i class="fa fa-plus"></i>
	Detalles
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
