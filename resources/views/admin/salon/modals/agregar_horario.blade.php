<div class="modal fade" id="modal_agregar_horario" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="modal-dialog  modal-dialog-centered" role="document" action="{{route('salon.horario.agregar',$salon)}}"
    autocomplete="off" method="POST">
    @csrf
    <div class="modal-content">
        <div class="modal-header d-flex flex-column">
            <h4 class="font-weight-bold" id="modal_agregar_horarioTitle">
                Registrar horario
            </h4>
        </div>
        <input type="text" name="id" id="idHorario" hidden>
        <div class="modal-body mx-3">
            <div class="md-form md-outline">
                <input type="time" class="form-control" id="hora_inicio" data-toggle="tooltip" data-placement="top" title="Hora de Inicio" name="hora_inicio" required min="7:00"
                max="22:00">
            </div>
            <div class="md-form md-outline">
                <input type="time" class="form-control" id="hora_fin"  data-toggle="tooltip" data-placement="top" title="Hora Fin"  name="hora_fin" irequired min="7:00"
                max="22:00">
            </div>
            <div class="md-form md-outline">
                <select class="custom-select" name="jornada" style="height:50px" required>
                    <option value="0">Selecciona una Jornada</option>
                    @foreach ($jornadas as $jornada)
                    <option value="{{$jornada->id}}">{{$jornada->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="md-form md-outline">
                <select class="custom-select" name="dia" id="dia" style="height:50px" required>
                    <option value="0">Selecciona una dia</option>
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
                Registrar
            </button>
            <button class="btn btn-outline-elegant" type="button" data-dismiss="modal" aria-label="Cancelar"
            aria-hidden="true"> <i class="fa fa-times"></i> Cancelar</button>

        </div>
    </div>
</form>
</div>
@push('scripts')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endpush
