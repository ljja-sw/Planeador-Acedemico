@extends('layouts.app')

@section('content')
@include('reporte.modals.editar-reporte')
@include('reporte.modals.eliminar-reporte')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">  
        <div class="row">
          <div class="col-md-6 col-lg-8"> 
            <h1 class="h1-responsive text-muted">
              Reporte del dia  {{$reporte->created_at->format('d-m-y')}} 
            </h1>               
          </div>

          <div class="col-md-6 col-lg-4 d-flex flex-column my-auto">
            <ul class="nav mx-auto font-weight-bold text-center justify-content-center">
              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#modal-editar-reportes" 
                class="nav-link btn btn-outline-primary">
                <i class="fa fa-pen"></i> Editar</a>
              </li>

              <li class="nav-item">
                <a href="#" data-toggle="modal" data-target="#" 
                class="nav-link btn btn-outline-primary">
                <i class="fa fa-trash"></i> Eliminar</a>
              </li>
            </ul>          
          </div>
            
          </div>
			</div>

        <div class="card card-body">
            <h2 class="h2-responsive font-weight-bold">Descripción del Reporte</h2>

            <div class="row">
              <div class="col-md-6 col-lg-5 mx-auto">
                <h4>Semana de clase</h4><br/>
                <h5>{{$reporte->semana_tema}}</h5>
              </div>

              <div class="col-md-6 col-lg-5 mx-auto">
               <h4>Tema de clase</h4><br/>
               <h6>{{$reporte->tema_planeador}}</h6>                
              </div>            
            </div></br>

            <div class="row">
              <div class="col-md-6 col-lg-5 mx-auto">
                <h4>Tipo de clase</h4><br/>
                <h6>{{$reporte->tipo_clase}}</h6>
              </div>

              @if(count($reporte->justificacion) == null)
                <div class="col-md-6 col-lg-5 mx-auto">
                  
                </div>
              @else
                <div class="col-md-6 col-lg-5 mx-auto">
                  <h4>Tema de clase</h4><br/>
                  <h6>{{$reporte->justificacion}}</h6>                
                </div>            
              @endif
            </div></br>

            <div class="row">
              <div class="col-md-12 ">
                <h4 class="font-weight-bold">Descripion de clase</h4><br/>
                <p>
                  lkmlkfmvñlemklvmtekgmteg{{$reporte->descripcion}}
                </p>
              </div>
            </div>
        </div>

      </div>
		</div>
	</div>
	<!-- Fin Datos del Usuario -->
</div>
@endsection