<div class="modal fade" id="modal_editar_programas" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{route('programa.update',$programa)}}" class="modal-dialog" method="POST" autocomplete="off">
    @csrf
      <div class="modal-content">
        <div class="modal-headery text-center">
          <i class="fa fa-book fa-3x py-2"></i>
            <h4 class="font-weight-bold h4-responsive">
              Editar Programa
            </h4>
        </div>
          <div class="modal-body mx-3">
    		   <div class="md-form md-outline">
    	        <input type="text" name="nombre" class="form-control" value="{{$programa->nombre}}" required>
    	        <label for="nombre">Nombre</label>
            </div>

          <div class="md-form md-outline" maxlength="9">
            <input type="text" name="codigo" class="form-control" value="{{$programa->codigo}}" required>
            <label for="apellido">codigo</label>
          </div>

          <button class="btn btn-elegant">Guardar</button>
			    <button class="btn btn-danger" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true">Cancelar</button>
        </div>
      </div>      
  </form>
</div>