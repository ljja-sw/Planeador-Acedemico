@extends('layouts.app')

@section('content')
@include('admin.asignatura.modals.editar-asignaturas')
@include('admin.asignatura.modals.eliminar-asignaturas')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">
				<div class="row">
					<div class="col-md-6 col-lg-8">
						<h1 class="h1-responsive text-muted">
							{{$asigna->nombre}}
						</h1>
						<small class="text-muted">Codigo</small>
						<p class="font-weight-bold">{{$asigna->codigo}}</p>
					</div>

					<div class="col-md-6 col-lg-4 d-flex flex-column my-auto">
						<ul class="nav mx-auto font-weight-bold text-center justify-content-center">
							<li class="nav-item">
								<a href="#" data-toggle="modal" data-target="#modal-editar-asignaturas" class="nav-link btn btn-primary
								"> <i class="fa fa-pen"></i> Editar </a>
							</li>
							<li class="nav-item">
								<a href="#" data-toggle="modal" data-target="#modal-eliminar-asignaturas" class="nav-link btn btn-outline-primary"> <i class="fa fa-trash"></i> Eliminar</a>
							</li>
						</ul>
						</div>
					</div>
				</div>
			<div class="card card-body">
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <tr>
                    <th style="width: 15px">#</th>
                    <th>Apartedos</th>
                    <th>Descripción </th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Cantidad de creditos</td>
                    <td>
						<p class="font-weight-bold">{{$asigna->creditos}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Habilitable</td>
                    <td>
                      <p class="font-weight-bold">{{Request::is($asigna->habilitable == 1) ? 'Si' : 'No'}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Grupo asignado</td>
                    <td>
                      @foreach($asigna->grupo as $asig)
                      <p class="font-weight-bold">{{$asig->numero}}</p>                      
                      @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Validable</td>
                    <td>
                      <p class="font-weight-bold">{{ Request::is($asigna->validable == 1) ? 'Si' : 'No'}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>Intencidad de horarios</td>
                    <td>
                      <p class="font-weight-bold text-align-right">{{$asigna->intensidad_horaria}}</p>
                    </td>
                  </tr>
                </table>
              </div>
			</div>
		</div>
	</div>
	<!-- Fin Datos del Usuario -->
</div>
@endsection
