@extends('layouts.app')


@section('content')
@include('libs.ckeditor')

<div class="container">
  <div class="col-md-12 mx-auto">
    <div class="card card-body text-center">
        <i class="fa fa-newspaper fa-3x py-2"></i>
        <h4 class="font-weight-bold h4-responsive">
            Editar Reporte
        </h4>
    </div>    
  </div>
  <form action="{{url('/reportesUpdate',$report)}}" method="POST">
    @csrf
 	<div class="row">
 	   <div class="col-md-8 mx-auto">
        <div class="card card-danger">
          <div class="card-header with-border"></div>
          <div class="card-body">
            <div class="form-group">
                <label>Programa</label>
                <h3 class="form-control">En proceso</h3>
              </div>

              <div class="form-group card-body">
                  <div class="mb-3">
                    <label>Descripcion del reporte</label>
                    <textarea rows="10" name="descripcion" id="1editar" class="form-control" placeholder="Ingrese el contenido completo del reporte">{!!$report->descripcion!!}</textarea>
                  </div>
              </div>

              <div class="form-group">
                <label>Tipo de Clase</label>
                <select class=" form-control" name="tipo_clase">
                    <option value="{{$report->tipo_clase}}">{{$report->tipo_clase}}</option>
	                @foreach($metodologia as $metodologiasP)
	                    <option value="{{ $report->tipo_clase = $metodologiasP->nombre}}">{{$metodologiasP->nombre}}</option>
	                @endforeach  
                </select>            
              </div>


	        <div id="pruden">
	          <div class="form-group card-body" id='acta' style=" display:none";>
	            <div class="mb-3">
	              <label>Motivo</label>
	              <textarea rows="5"  name="justificacion" id="#" class="form-control medium-textarea" placeholder="Ingrese el contenido completo del reporte"></textarea>
	            </div>
	          </div>
	        </div>
          </div>
        </div>
      </div>



      <div class="col-md-4">
        <div class="card card-danger">
          <div class="card-header with-border"></div>
          <div class="card-body">
              <input type="text" name="reportes_docente" value="{{ $report->reportes_docente = auth()->user()->id }}" hidden>
              <input type="text" name="reporte_asignatura" value="{{ $report->reporte_asignatura = $asignatura->id }}" hidden>
              <input type="text" name="programas_id" value="{{ $report->programas_id = $asignatura->id }}" hidden>            
            <div class="form-group">
                <label>Asignatura</label>
                <h3 class="form-control">{{$asignatura->nombre}}</h3>
            </div>
            <div class="form-group">
              <label>Temas</label>
              <select name="tema_planeador" class=" form-control" id="temas_planeador_select"  required>
                <option value="{{$report->tema_planeador}}">{{$report->tema_planeador}}</option>
                @foreach($tema_planeador as $temasP)
                    <option value="{{ $report->tema_planeador = $temasP->tema }}">{{ $temasP->tema }}</option>
                @endforeach     
              </select>  
            </div>

              <div class="form-group">
                  <label>Semana</label>
                  <select name="semana_tema" class=" form-control" id="semana_select">
                    <option value="{{$report->semana_tema}}">{{$report->semana_tema}}</option>
                  @foreach($tema_planeador as $semanasP)
                      <option value="{{ $report->semana_tema = $semanasP->semana }}">{{ $semanasP->semana }}</option>
                  @endforeach  
                  </select>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-save"></i> Guardar Reporte
                    </button>
                  <a href="#pruden" class="btn btn-elegant btn-block" onclick = "javascript: var ch=document.getElementById('acta');ch.style.display='inline' ; ">
                     <i class="fa fa-question"></i>
                     Reposición de semana
                  </a>
                </div>            
          </div>          
        </div>      
      </div>       


 		
 	</div>
  </form> 
</div>
<script type="text/javascript">
  $(function () {
    ClassicEditor
      .create(document.querySelector('#1editar'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })

    //DatemPicker    
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });


    $('#semana_select').select2({
    });

  })


$('#temas_planeador_select').select2({
 });


</script>
@endsection
