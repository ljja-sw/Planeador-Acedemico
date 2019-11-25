<div class="modal fade" id="modal-salon" tabindex="-1" role="dialog" aria-hidden="true">
  <form role="document" action="{{ route('salon.store') }}" class="modal-dialog" method="POST" autocomplete="off">
    @csrf
    <div class="modal-content">
      <div class="modal-headery text-center">
        <i class="fa fa-bookmark fa-3x py-2"></i>
        <p class="m-0">Registrar</p>
        <h4 class="font-weight-bold h4-responsive">
          Salon
        </h4>
      </div>

      <div class="modal-body row mx-3 mx-auto">
        <div class="col">

          <div class="md-form md-outline">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
          </div>

          <div class="md-form md-outline">
            <label for="capacidad">Capacidad</label>
            <input type="number" class="form-control" name="capacidad" id="capacidad" min="10" max="30" required>
          </div>

          <button class="btn btn-elegant" type="submit">
            <i class="fa fa-save"></i> Registrar
          </button>

          <a class="btn btn-outline-elegant" data-dismiss="modal">
            <i class="fa fa-times"></i> Cancelar
          </a>
          
        </div>
      </div>
    </div>      
  </form>
</div>
