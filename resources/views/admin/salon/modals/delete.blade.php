<div class="modal fade" id="modal_delete_salon" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="modal-dialog  modal-dialog-centered" role="document" action="{{route('salon.destroy',$salon)}}"
        autocomplete="off" method="POST">
        @csrf
        <div class="modal-content text-center">
            <div class="modal-body mx-3">
                <h4>¿Desea eliminar <span class="font-weight-bold">{{$salon->nombre}}</span>?</h4>
                <p class="m-0">y todos sus horarios</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-elegant">
                    <i class="fa fa-trash"></i>
                    Si
                </button>
                <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar"
                    aria-hidden="true"> <i class="fa fa-times"></i> Cancelar</button>
            </div>
        </div>
    </form>
</div>