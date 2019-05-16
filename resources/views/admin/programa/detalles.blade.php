@extends('layouts.app')

@section('content')

@include('admin.programa.modals.editar-programa')
@include('admin.programa.modals.eliminar-programa')
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body align-items-center">
					<div class="col-md-12 col-lg-8 d-flex card card-body  py-3 flex-column">
						<small class="text-muted">Programa</small>
						<h4 class="h4-responsive font-weight-bold">
							{{$programa->nombre}}
						</h4>
						<small class="text-muted">Codigo</small>
						<h4 class="h4-responsive text-muted">
							{{$programa->codigo}}
						</h4>
						<hr>
						<ul class="nav mx-auto font-weight-bold text-center justify-content-center">
							<li class="nav-item">
								<a href="#" data-toggle="modal" data-target="#modal_editar_programas" class="nav-link btn btn-primary"> 
									<i class="fa fa-pen"></i> Editar</a>
							</li>
							<li class="nav-item">
								<a href="#" data-toggle="modal" data-target="#modal_eliminar_programas" class="nav-link btn btn-outline-primary">
									<i class="fa fa-trash"> </i> Eliminar Programa</a>
							</li>
						</ul>
						</div>
				</div>

		</div>
	</div>
<

</div>
@endsection