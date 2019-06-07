<!-- Modal -->
<div class="modal fade" id="modalEditarPlaneador" tabindex="-1" role="dialog" aria-labelledby="modalEditarPlaneadorTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex flex-column">
        <h6 class="text-muted m-0" id="modalEditarPlaneadorTitle">Editando Tema - Actividad</h6>
        <h5 class="modal-title m-0 font-weight-bold">
            <span id="temaPlaneador"></span>
        </h5>
        <p class="m-0">Semana <span id="semana"></span></p>

    </div>
    <div class="modal-body">
        <form action="/editar/planeador" method="post" id="formEvaluacion">
            @csrf
            <textarea name="" id="" cols="30" rows="10"><span id="evaluacionesForm">evaluaciones</span></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formEvaluacion">Guardar</button>
    </div>
</div>
</div>
</div>