@extends('layouts.app')

@section('content')
@include('libs.datatables')

<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-10 mx-auto">
			<div class="card card-body">  
        <div class="row">
          @foreach($reporteD as $reporteD2)
          <div class="col-md-6 col-lg-8"> 
            <h1 class="h1-responsive text-muted">
              Docente: {{$reporteD2->nombre}} {{$reporteD2->apellido}} 
            </h1> 
          </div>
          @endforeach
          </div></br>

          <div class="row">
            <div class="col-md-6 col-lg-5">
              @foreach($reporteA as $reporteA2)
              <h3 class="h3-responsive">
                Asignatura: {{$reporteA2->nombre}}
              </h3>
            </div> 
            <div class="col-md-6 col-lg-5">
              <h3 class="h3-responsive">
                Codigo: {{$reporteA2->codigo}}
              </h3>
            </div>
              @endforeach 
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

              <div class="col-md-6 col-lg-5 mx-auto"> 
                <h5 class="h5-responsive">
                  Fecha Reporte: {{$reporte->created_at->format('d-m-y')}} 
                </h5>               
              </div>
            </div></br>

            <div class="row">
              <div class="col-md-12 ">
                @if(count($reporte->justificacion) == null)
                  <div class="col-md-6 col-lg-5 mx-auto">
                    
                  </div>
                @else
                  <div class="col-md-6 col-lg-5 mx-auto">
                    <h4>Tema de clase</h4><br/>
                    <h6>{{$reporte->justificacion}}</h6>                
                  </div>            
                @endif
              </div>
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