<div class="modal fade" id="modal_planeador_asignatura" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form class="modal-dialog" role="document" action="{{url('/generar-planeador')}}" autocomplete="off" method="POST">
  @csrf
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Crear Planeador Académico</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body mx-3 text-center">
      <p>Selecciona una asignatura de la lista para crear un <b>Planeador Académico</b></p>
     <select name="asignatura" id="asignatura_select" required></select>
    <p class="small">Apareceran solo las asignaturas que no tengan un <b>Planeador Académico</b> previamente creado</p>
</div>
    <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-primary">
        <i class="fa fa-arrow-right"></i>
        Siguiente
      </button>
    </div>
  </div>
</form>
</div>
@push("scripts")
<script>
	$('#asignatura_select').select2({
        theme: 'bootstrap4',
        width: '100%',
        tokenSeparators: [','],
        ajax: {
          dataType: 'json',
          url: '{{ url("api/asignaturas-docente",auth()->user()) }}',
          data: function(params) {
            return {
              term: params.term
            }
          },
          processResults: function (data, page) {
            return {
              results: data
            };
          },
        }
    });
</script>
@endpush
