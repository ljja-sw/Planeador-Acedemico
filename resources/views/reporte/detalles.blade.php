@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">  
        <div class="row">
          <div class="col-md-6 col-lg-8"> 
            <h1 class="h1-responsive">
              Reporte del dia:  {{$reporte->created_at->format('d-m-y')}} 
            </h1>               
          </div>

          <div class="col-md-6 col-lg-4 d-flex flex-column my-auto">
            <ul class="nav mx-auto font-weight-bold text-center justify-content-center">
              <li class="nav-item">
                <a href="{{route('reporte.editar',[$reporte,$asignatura])}}"
                class="nav-link btn btn-outline-primary">
                <i class="fa fa-pen"></i> Editar</a>
              </li>
            </ul>          
          </div>
            
          </div>
			</div>


      <div class="card">
        <div class="card-header">
          <h2 class="h2-responsive font-weight-bold">Descripción del Reporte</h2><br/>
        </div>
        <div class="card card-body">
             
            <div class="row col-lg-8">
              <div class="col-md-12 mx-auto">
                <h4>Semana de clase: {{$reporte->semana_tema}}</h4><br/> 
              </div>

              <div class="col-md-12 mx-auto">
               <h4>Tema de clase: {{$reporte->tema->tema}}</h4><br/>              
              </div> 

              <div class="col-md-12 mx-auto">
                <h4>Tipo de clase: {{$reporte->tipo_clase}}</h4><br/>
                
              </div>

              @if(count($reporte->justificacion) == null)
                <div class="col-md-6 col-lg-5 mx-auto">
                  
                </div>
              @else
                <div class="col-md-6 col-lg-5 mx-auto">
                  <h4>Justificación</h4><br/>
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
	</div>
	<!-- Fin Datos del Usuario -->
</div>
@endsection