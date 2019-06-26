<div class="modal fade" id="modal_editar_salon" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="modal-dialog  modal-dialog-centered" role="document" action="{{route('salon.update',$salon)}}" autocomplete="off" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header d-flex flex-column">
                <h6 class="text-muted m-0" id="modalEditarTemaTitle">Editando Salon/Sala</h6>
                <h4 class="modal-title m-0 font-weight-bold">{{$salon->nombre}}</h4>
                <p class="m-0">Capacidad: <span class="font-weight-bold">{{$salon->capacidad}}</span> estudiantes</p>
            </div>

            <div class="modal-body mx-3">
                <div class="form-row">
                    <div class="md-form md-outline col-md-8">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{$salon->nombre}}"
                            required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="md-form md-outline col-md-4">
                        <label for="capacidad">Capacidad</label>
                        <input type="number" class="form-control" value="{{$salon->capacidad}}" name="capacidad"
                            id="capacidad" min="10" max="30" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-elegant">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
                			    <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar" aria-hidden="true"> <i class="fa fa-times"></i> Cancelar</button>

            </div>
        </div>
    </form>
</div>