<div class="modal fade" id="modal_editar_secretario" tabindex="-1" role="dialog" aria-hidden="true">
  <form class="modal-dialog" role="document" action="{{route('secretarios.update',$user)}}" autocomplete="off" method="POST">
    @csrf
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Editar Secretario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form md-outline">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$user->nombre}}" required>
          <label for="nombre">Nombre</label>
        </div>
        
        <div class="md-form md-outline">
          <input type="text" name="apellido" id="apellido" class="form-control" value="{{$user->apellido}}" required>
          <label for="apellido">Apellido</label>
        </div>
        
        <div class="md-form md-outline">
          <input type="email" name="correo" id="correo" class="form-control" value="{{$user->email}}" required>
          <label for="correo">Correo</label>
        </div>
        
        <div class="md-form md-outline">
          <input type="text" name="documento_identidad" maxlength="10" id="documento_identidad"
          class="form-control" length="10" value="{{$user->documento_identidad}}" required>
          <label for="documento_identidad">Documento Identidad</label>
        </div>
               
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-outline-primary" type="button" data-dismiss="modal" aria-label="Cancelar">
          <i class="fa fa-times"></i>
          Cancelar
        </button>
        <button class="btn btn-elegant">
          <i class="fa fa-save"></i>
          Guardar
        </button>
      </div>
    </div>
  </form>
</div>