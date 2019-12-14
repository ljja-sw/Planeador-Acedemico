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
		                  <th>Docente</th>		                	
		                  <th>Asignatura</th>
		                  <th>Programa</th>
		                  <th>fecha</th>
		                  <th></th>           
		                </tr>
		                </thead>
		                <tbody>
		              		@forelse($reportes as $reporte)
							<tr>
								<td>{{ $reporte->docente->nombre_completo() }}</td>
		              			<td>{{ $reporte->asignatura->nombre }}</td>
		              			<td>{{ $reporte->programas_id}}</td>
		              			<td>{{ $reporte->created_at->format('d-m-y') }}</td>
		              			<td>
		                			<a title="Detalles" href="{{route('reporteclase.detalle',$reporte)}}" class="nav-item btn-table--edit">
		                				<i class="fa fa-plus">Detalles</i>			
		                			</a>               
		              			</td>
							</tr>
							@empty
			              	<tr>
				              <td COLSPAN=6>
					            <div class="text-center">
					                <h4 class="h4-responsive font-weight-bold"><i class="fa fa-times fa-2x"></i><br>
					                  !Lo sentimos por el momento no hay Reportes realizados¡</h4>
					            </div>
					           </td> 
				           </tr>
		              		@endforelse
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
