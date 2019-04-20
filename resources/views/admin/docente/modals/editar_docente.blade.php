<div class="modal fade" id="modal_editar_secretario" tabindex="-1" role="dialog" aria-hidden="true">
  <form class="modal-dialog" role="document" action="{{route('docentes.update',$docente)}}" autocomplete="off" method="POST">
    @csrf
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><small class="text-muted">Editando a</small> <br> {{$docente->nombre_completo()}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form md-outline">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$docente->nombre}}" required>
          <label for="nombre">Nombre</label>
        </div>
        
        <div class="md-form md-outline">
          <input type="text" name="apellido" id="apellido" class="form-control" value="{{$docente->apellido}}" required>
          <label for="apellido">Apellido</label>
        </div>
        
        <div class="md-form md-outline">
          <input type="email" name="correo" id="correo" class="form-control" value="{{$docente->email}}" required>
          <label for="correo">Correo</label>
        </div>
        
        <div class="md-form md-outline">
          <input type="text" name="documento_identidad" maxlength="10" id="documento_identidad"
          class="form-control" length="10" value="{{$docente->documento_identidad}}" required>
          <label for="documento_identidad">Documento Identidad</label>
        </div>
               
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-elegant">
          <i class="fa fa-save"></i>
          Guardar
        </button>
      </div>
    </div>
  </form>
</div>