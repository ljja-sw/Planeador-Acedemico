@extends('layouts.app')

@section('content')
@include('libs.datatables')

<div class="container">
	<div class="row">
		<div class="col-md-12 mx-auto card-deck">
			<div class="card card-body table-responsive">
				<h3 class="font-weight-bold card-title m-4">
		          <i class="fa fa-book-reader text-muted"></i>
		          Reportes
		        </h3>
					<table id="tabla_asignaturas" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
		                <tr>
		                  <th>Tema</th>
		                  <th>semana</th>
		                  <th>semana de remplazo</th>
		                  <th>fecha de temas </th>
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
		              <td>{{ Request::is($asignatura->habilitable == 1) ? 'Si' : 'No' }}</td>
		              <td>{{ Request::is($asignatura->validable == 1) ? 'Si' : 'No' }}</td>
		              <td>{{ $asignatura->intensidad_horaria }}</td>
		              <td>
		                <a title="Detalles" href="{{ route('asignatura.detalles', $asignatura) }}" class="nav-item btn-table--edit">
		                	<i class="fa fa-plus">Detalles</i>			
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
  $('#tabla_asignaturas').DataTable();
</script>
@endpush 
@stop