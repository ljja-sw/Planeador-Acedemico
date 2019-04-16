<div class="modal fade" id="modal_cambiar_contraseña" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form class="modal-dialog" role="document" action="{{ url('/cambiar-contraseña') }}" autocomplete="off" method="POST">
  @csrf
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Cambiar Contraseña</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3">
      <div class="md-outline md-form mb-5">
        <input required type="password" name="contraseña" id="contraseña_actual" class="form-control" required>
        <label for="contraseña_actual">
          <i class="fas fa-lock grey-text"></i>
          Contraseña Actual
        </label>
      </div>

      <div class="md-outline md-form mb-4">
        <input required type="password" name="nueva" id="password_new" class="form-control" required>
        <label for="password">
          <i class="fas fa-lock grey-text"></i>
        Nueva Contraseña</label>
      </div>

      <div class="md-outline md-form mb-4">
        <input required type="password" name="confirmacion_nueva" id="password_confimation" class="form-control" required>
        <label for="password_confimation">
          <i class="fas fa-lock grey-text"></i>
          Confirma la contraseña
        </label>
      </div>

    </div>
    <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-default">
        <i class="fa fa-save"></i>
        Guardar
      </button>
    </div>
  </div>
</form>
</div>