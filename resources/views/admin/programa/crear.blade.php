<div class="modal fade" id="modal-programas" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{route('programa.crear')}}" class="modal-dialog" method="POST" autocomplete="off">
    @csrf
    <div class="modal-content">
      <div class="modal-headery text-center">
        <i class="fa fa-graduation-cap fa-3x py-2"></i>
        <p class="m-0">Registrar</p>
        <h4 class="font-weight-bold h4-responsive">
          Programa Académico
        </h4>
      </div>
      <div class="modal-body mx-auto">
        <div class="md-form md-outline">
         <input type="text" name="nombre" class="form-control" required>
         <label for="nombre">Nombre</label>
       </div>

       <div class="md-form md-outline">
        <input type="text" name="codigo"  maxlength="4" class="form-control" required>
        <label for="codigo">Código</label>
      </div>

      <button class="btn btn-elegant"><i class="fa fa-cloud-upload-alt"></i> Registrar</button>
      <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
    </div>
  </div>      
</form>
</div>
