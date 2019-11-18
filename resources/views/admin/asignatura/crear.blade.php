@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body text-center">
				<i class="fa fa-chalkboard fa-3x py-2"></i>
        <h4 class="font-weight-bold h4-responsive">
          Registrar Asignatura
        </h4>
      </div>
      <div class="card card-body">
        <form action="{{route("asignatura.store")}}" method="POST">
          @csrf

          <div class="md-form md-outline">
            <input type="text" name="nombre" class="form-control" required>
            <label for="nombre">Nombre</label>
          </div>

          <div class="md-form md-outline" maxlength="9">
            <input type="text" name="codigo" class="form-control" required>
            <label for="codigo">Codigo</label>
          </div>

          <div class="md-form md-outline" >
            <input type="text" name="grupo" class="form-control" id="inputGrupo" required>
            <label for="grupo">Grupo</label>
          </div>

          <!--check-->
          <div class="row"> 
            <div class="form-group col-md-6">
              <label for="inputValidable">Habilitable</label>
              <select class="custom-select my-1 mr-sm-2" name="habilitable" id="inlineFormCustomSelectPref">
                <option value="">-- Seleccione una opción --</option>
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div>  

            <div class="form-group col-md-6">
              <label for="inputValidable">Validable</label>
              <select class="custom-select my-1 mr-sm-2" name="validable" id="inlineFormCustomSelectPref">
                <option value="">-- Seleccione una opción --</option>
                <option value="1">Si</option>
                <option value="0">No</option>
              </select>
            </div> 
          </div>
          <!--check-->

          <div class="row">

            <div class="col-md-6">  
              <div class="md-form md-outline">
                <input type="text" name="intensidad_horaria" id="nombre" class="form-control" maxlength="6" required>
                <label for="nombre">Intensidad Horaria</label>
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