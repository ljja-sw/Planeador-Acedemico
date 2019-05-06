@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card card-body text-center">
				<i class="fa fa-book fa-3x py-2"></i>
          <h4 class="font-weight-bold h4-responsive">
            Registrar Asignaturas
          </h4>
			</div>
			<div class="card card-body">
          <form action="/asignaturas" method="POST">
            {{csrf_field()}}

            @if(session()->has('msj'))
            <div class="alert alert-success" role="alert">{{session('msj')}}</div>
            @elseif(count($errors) > 0)
            <div class="alert alert-danger">
              <h6>Por favor corrija los siguientes errores:</h6>
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
        
            <div class="md-form">
              <input type="text" name="nombre" class="form-control" required>
              <label for="nombre">Nombre</label>
            </div>

              <div class="md-form" maxlength="9">
                <input type="text" name="codigo" class="form-control" required>
                <label for="apellido">codigo</label>
              </div>

              <div class="md-form" >
                <input type="text" name="grupo" class="form-control" id="inputGrupo" required>
                <label for="grupo">grupo</label>
              </div>
           
            <!--check-->
        <div class="row"> 
            <div class="form-group col-md-6">
              <label for="inputValidable">Habilitable</label>
              <select class="custom-select my-1 mr-sm-2" name="validable" id="inlineFormCustomSelectPref">
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
                <input type="text" name="intensidad_horaria" id="nombre" class="form-control" required>
                <label for="nombre">Intensidad Horaria</label>
              </div>
          </div>
          
          <div class="col-md-6">  
            <div class="md-form md-outline">
              <input type="text" name="creditos" class="form-control" id="creditos" maxlength="10" required>
              <label for="creditos">Credito</label>
             </div>
          </div>

        </div>

            <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</button>


          </form>
			</div>
		</div>
	</div>
</div>

@stop