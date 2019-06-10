<!-- Modal -->
<div class="modal fade" id="modalEditarTema" tabindex="-1" role="dialog" aria-labelledby="modalEditarTemaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex flex-column">
        <h6 class="text-muted m-0" id="modalEditarTemaTitle">Editando Tema - Actividad</h6>
        <h5 class="modal-title m-0 font-weight-bold">
            <span id="temaPlaneador"></span>
        </h5>
        <p class="m-0">Semana <span id="semana"></span></p>

    </div>
    <div class="modal-body">
        <form action="/editar/tema" method="post" id="formTema" autocomplete="off">
            @csrf
            <input type="text" id="idTema" name="id" hidden>
            <div class="md-form md-outline">
                <input type="text" name="tema" class="form-control" id="temaInput">
            </div>

            <select class="custom-select" name="metodologia" id="metodologia" style="height:50px">
                @foreach($metodologías as $metodologia)
                <option value="{{$metodologia->id}}">{{$metodologia->nombre}}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
            <i class="fa fa-times"></i>
        Cancelar</button>

        <button type="submit" class="btn btn-primary" form="formTema">
            <i class="fa fa-save"></i>
            Guardar
        </button>
    </div>
</div>
</div>
</div>