<div class="modal fade" id="modal_editar_horario" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="modal-dialog  modal-dialog-centered" role="document" action="{{route('salon.horario.update')}}"
        autocomplete="off" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header d-flex flex-column">
                <h6 class="text-muted m-0">Editando Horario</h6>
                <h4 class="font-weight-bold" id="modal_editar_horarioTitle"></h4>
                <p class="m-0" id="modal_editar_horarioDia"></p>
            </div>
            <input type="text" name="id" id="idHorario" hidden>
            <div class="modal-body mx-3">
                <div class="md-form md-outline">
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required min="7:00"
                        max="22:00">
                </div>
                <div class="md-form md-outline">
                    <input type="time" class="form-control" id="hora_fin" name="hora_fin" irequired min="7:00"
                        max="22:00">
                </div>
                <div class="md-form md-outline">
                    <select class="custom-select" name="dia" id="dia" style="height:50px" required>
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miercoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                        <option value="6">Sabado</option>
                    </select>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-elegant">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
                <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar"
                    aria-hidden="true"> <i class="fa fa-times"></i> Cancelar</button>

            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>
    $('#modal_editar_horario').on('show.bs.modal', function (e) {

        var idHorario = $(e.relatedTarget).data('id');
        $('#hora_inicio').val("00:00")
        $('#hora_fin').val("00:00")
        $('#modal_editar_horarioTitle').text("Cargando...")

        $.ajax({
            url: '/api/horarios/' + idHorario,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                $('#hora_inicio').val(data['hora_inicio'])
                $('#hora_fin').val(data['hora_fin'])
                $('#dia').val(data['dia'])
                $("#idHorario").val(idHorario)
                
                $('#modal_editar_horarioTitle').text(data['hora_inicio']+"-"+data['hora_fin'])
                $('#modal_editar_horarioDia').text($('#dia option:selected').text())

            },
            error: function (request, error) {

            }
        });

    });
</script>
@endpush