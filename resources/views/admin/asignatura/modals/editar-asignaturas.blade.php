<div class="modal fade" id="modal-editar-asignaturas" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{route('asignaturas.update',$asigna)}}" class="modal-dialog" method="POST" autocomplete="off">
    @csrf
      <div class="modal-content">
        <div class="modal-headery text-center">
          <i class="fa fa-book fa-3x py-2"></i>
            <h4 class="font-weight-bold h4-responsive">
              Editar Asignaturas
            </h4>
        </div>
          <div class="modal-body mx-3">
    		   <div class="md-form md-outline">
    	        <input type="text" name="nombre" class="form-control" value="{{$asigna->nombre}}" required>
    	        <label for="nombre">Nombre</label>
            </div>

          <div class="md-form md-outline" maxlength="9">
            <input type="text" name="codigo" class="form-control" value="{{$asigna->codigo}}" required>
            <label for="apellido">codigo</label>
          </div>

          <div class="md-form md-outline" >
            <input type="text" name="grupo" class="form-control" id="inputGrupo" value="{{$asigna->grupo}}" required>
            <label for="grupo">grupo</label>
          </div>
          <!--check-->
      <div class="row"> 
	            <div class="form-group col-md-6">
	              <label for="inputValidable">Habilitable</label>
	              <select class="custom-select my-1 mr-sm-2" name="habilitable" id="inlineFormCustomSelectPref">
	                <option value="{{ ($asigna->habilitable == 1) ? 1 : 0 }}">{{ ($asigna->habilitable == 1) ? 'Si' : 'No' }}</option>
	                <option value="{{ ($asigna->habilitable == 1) ? 0 : 1 }}">{{ ($asigna->habilitable == 1) ? 'No' : 'Si' }}</option>
                </select>                  
            	</div>  

            	<div class="form-group col-md-6">
	              <label for="inputValidable">Validable</label>
	              <select class="custom-select my-1 mr-sm-2" name="validable" id="inlineFormCustomSelectPref">
                  <option value="{{ ($asigna->validable == 1) ? 1 : 0 }}">{{ ($asigna->validable == 1) ? 'Si' : 'No' }}</option>
                  <option value="{{ ($asigna->validable == 1) ? 0 : 1 }}">{{ ($asigna->validable == 1) ? 'No' : 'Si' }}</option>
	              </select>
	            </div> 
      </div>
        <!--check-->
      <div class="row">
          <div class="col-md-6">  
              <div class="md-form md-outline">
                <input type="text" name="intensidad_horaria" id="nombre" class="form-control" value="{{$asigna->intensidad_horaria}}" required>
                <label for="nombre">Intensidad Horaria</label>
              </div>
          </div>      
          <div class="col-md-6">  
            <div class="md-form md-outline">
              <input type="text" name="creditos" class="form-control" id="creditos" maxlength="10" value="{{$asigna->creditos}}"  required>
              <label for="creditos">Credito</label>
             </div>
          </div>
      </div>
          <button class="btn btn-elegant">Guardar</button>
			    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true">Cancelar</button>
        </div>
      </div>      
  </form>
</div>