<div class="modal fade" id="modal_editar_programas" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{route('programa.update',$programa)}}" class="modal-dialog modal-dialog-centered" method="POST" autocomplete="off">
    @csrf
      <div class="modal-content">
        <div class="modal-headery text-center">
          <i class="fa fa-graduation-cap fa-3x py-2"></i>
          <p class=" text-muted m-0">Editando</p>
            <h4 class="font-weight-bold h4-responsive">
              {{$programa->nombre}}
            </h4>
        </div>
          <div class="modal-body mx-auto">
    		   <div class="md-form md-outline">
    	        <input type="text" name="nombre" class="form-control" value="{{$programa->nombre}}" required>
    	        <label for="nombre">Nombre</label>
            </div>

          <div class="md-form md-outline" maxlength="9">
            <input type="text" name="codigo" class="form-control" value="{{$programa->codigo}}" required>
            <label for="apellido">codigo</label>
          </div>

          <button class="btn btn-elegant"><i class="fa fa-save"></i> Guardar</button>
			    <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
        </div>
      </div>      
  </form>
</div>