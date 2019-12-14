@extends('layouts.app')
@section('title',"Registrar Asignatura | Planeador Académico")
@include('libs.select2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
      <div class="card card-body">
        <div class="text-center">
          <i class="fa fa-chalkboard fa-3x py-2"></i>
          <h4 class="font-weight-bold h4-responsive">
            Registrar Asignatura
          </h4>
        </div>
        <form action="{{route("asignatura.store")}}" method="POST">
          @csrf
          <div class="md-form md-outline">
            <input type="text" name="nombre" id="nombre" class="form-control" required>
            <label for="nombre">Nombre</label>
          </div>
          <div class="form-row">
            <div class="md-form md-outline col-md-8" maxlength="9">
              <input type="text" name="codigo" id="codigo" class="form-control" required>
              <label for="codigo">Codigo</label>
            </div>
            <div class="md-form md-outline col-md-4" >
              <input type="text" name="grupo" id="grupo" class="form-control" id="inputGrupo" required>
              <label for="grupo">Grupo</label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputValidable">Programa Académico</label>
            <select class="custom-select my-1 mr-sm-2" name="programa" id="programa_academico">
              <option value="">-- Seleccione una opción --</option>
              @foreach ($programas as $programa)
              <option value="{{$programa->id}}">{{$programa->codigo}}-{{$programa->nombre}}</option>
              @endforeach
            </select>
          </div> 
          <div class="form-row"> 
            <div class="form-group col-md-6">
              <label for="inputValidable">Habilitable</label>
              <select class="custom-select my-1 mr-sm-2" name="habilitable" id="habilitable">
                <option value="">-- Seleccione una opción --</option>
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputValidable">Validable</label>
              <select class="custom-select my-1 mr-sm-2" name="validable" id="validable">
                <option value="">-- Seleccione una opción --</option>
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div> 
          </div>
          <!--check-->
          <div class="form-row">
            <div class="col-md-6">  
              <div class="md-form md-outline">
                <input type="text" name="intensidad_horaria" id="intensidad_horaria" class="form-control" maxlength="6" required>
                <label for="intensidad_horaria">Intensidad Horaria</label>
              </div>
            </div>
            <div class="col-md-6">  
              <div class="md-form md-outline">
                <input type="text" name="creditos" class="form-control" id="creditos" maxlength="6" required>
                <label for="creditos">Creditos</label>
              </div>
            </div>
            <div class="mx-auto">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-cloud-upload-alt"></i>
                Registrar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop

@push('scripts')
  <script>
        $('#programa_academico').select2({
      theme: 'bootstrap4',
      width: '100%',
      tokenSeparators: [','],
    });
  </script>
@endpush