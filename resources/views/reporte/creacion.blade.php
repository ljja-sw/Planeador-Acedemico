@extends('layouts.app')


@section('content')
@include('libs.ckeditor')

<div class="container">
  <div class="col-md-8 mx-auto">
    <div class="card card-body text-center">
        <i class="fa fa-newspaper fa-3x py-2"></i>
        <h4 class="font-weight-bold h4-responsive">
            Realizar Reporte
        </h4>
    </div>    
  </div>  
    <form action="{{url('guardar-repote')}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card card-danger">
            <div class="card-header with-border"></div>
            <div class="card-body">
              <div class="form-group">
                <label>Programa</label>
                  <h3 class="form-control">{{$programa->nombre}}</h3>
              </div>

              <div class="form-group card-body">
                <div class="mb-3">
                  <label>Descripcion del reporte</label>
                    <textarea rows="10" name="descripcion" id="editor" class="form-control editor" placeholder="Ingrese el contenido completo del reporte"></textarea>
                 </div>
              </div>

              <div class="form-group">
                <label>Tipo de Clase</label>
                  <select class=" form-control" name="tipo_clase">
                    <option value="">Seleciones una opción</option>
                    @foreach($metodologia as $metodologiasP)
                      <option value="{{$metodologiasP->nombre}}">{{$metodologiasP->nombre}}</option>
                    @endforeach    
                  </select>            
              </div>


              <div id="pruden">
                <div class="form-group card-body" id='acta' style=" display:none";>
                  <div class="mb-3">
                    <label>Motivo</label>
                    <textarea rows="5"  name="justificacion" id="justrepor" class="form-control medium-textarea editor" placeholder="Ingrese el contenido completo del reporte"></textarea>
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
                <input type="text" name="docente_id" value="{{ auth()->user()->id }}" hidden>
                <input type="text" name="asignatura_id" value="{{ $asignatura->id }}" hidden>
                <input type="text" name="programas_id" value="{{ $programa->id }}" hidden>
              <div class="form-group">
                <label>Asignatura</label>
                <h3 class="form-control">{{$asignatura->nombre}}</h3>
              </div>

              <div class="form-group">
                <label>Temas</label>
                <select name="tema_planeador_id" class=" form-control" id="temas_planeador_select"  required>
                  <option value="">Seleciones una opcion</option>
                  @foreach($tema_planeador as $temasP)
                      <option value="{{ $temasP->id }}">{{ $temasP->tema }}</option>
                  @endforeach     
                </select>  
              </div>

              <div class="form-group">
                  <label>Semana</label>
                  <select name="semana_tema" class=" form-control" id="semana_select">
                    <option value="">Seleciones una opcion</option>
                  @foreach($tema_planeador as $semanasP)
                      <option value="{{ $semanasP->semana }}">{{ $semanasP->semana }}</option>
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
@push('styles-picker')
  <link rel="stylesheet" href="{{asset('vendor/datepicker/datepicker3.css')}}">
  <link rel="stylesheet" href="{{asset('vendor/select2/dist/css/select2.min.css')}}">
@endpush


@push("scripts")
<script src="{{asset('vendor/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('vendor/select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    ClassicEditor
      .create(document.querySelector('.editor'))
      .then(function (editor) {
      })
      .catch(function (error) {
        console.error(error)
      })

    ClassicEditor
    .create(document.querySelector('#justrepor'))
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
@endpush 
@endsection