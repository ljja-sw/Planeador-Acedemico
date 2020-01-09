@extends('layouts.app')

@section('content')
@include('libs.datatables')
@include('reporte.modals.eliminar-reporte')			                		                



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
		                  <th>Tema Visto</th>		                	
		                  <th>Tipo Clase</th>
		                  <th>Semana de Clase</th>
		                  <th>Fecha acordada</th>
		                  <th></th>           
		                </tr>
		                </thead>
		                <tbody>
		              @forelse($report as $reporte)
		              <tr>
		              <td>{{ $reporte->tema->tema }}</td>
		              <td>{{ $reporte->tipo_clase }}</td>
		              <td>{{ $reporte->semana_tema }}</td>
		              <td>{{ Request::is($reporte->justificacion == null) ? 'Si' : 'No hay' }}</td>
		              <td>  
		                <a title="Editar" href="{{route('reporte.detalles',[$reporte,$asignatura])}}" class="nav-item btn-table--edit" style="margin: 10px">
		                	<i class="fa fa-folder">Ver mas</i>			
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