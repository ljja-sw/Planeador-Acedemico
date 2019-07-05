<div class="modal fade" id="modal_eliminar_horario" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="modal-dialog  modal-dialog-centered" role="document" action="{{route('salon.horario.destroy')}}"
        autocomplete="off" method="POST">
        @csrf
        <div class="modal-content text-center">
            <input type="text" name="id" id="horario" hidden>
            <div class="modal-body mx-3">
            <h4>
                <span class="font-weight-bold">
                    ¿Desea eliminar este horario?
                </span>
            </h4>
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
@push('scripts')
    <script>
    $('#modal_eliminar_horario').on('show.bs.modal', function (e) {
        var idHorario = $(e.relatedTarget).data('id');
        $('#horario').val(idHorario)
    });
</script>
@endpush