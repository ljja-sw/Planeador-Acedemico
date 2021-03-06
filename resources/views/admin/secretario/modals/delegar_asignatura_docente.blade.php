<div class="modal fade" id="modal_delegar_asignatura_docente" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">
        <i class="fa fa-chalkboard-teacher"></i>
        <i class="fa fa-arrow-right"></i>
        <i class="fa fa-user"></i>
      Delegar Asignatura a Docente</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{route('form.designar.asignatura')}}" method="get" autocomplete="off">
        @csrf
          <div class="form-group col">
            <label for="docentes_select">Docente</label>
            <select name="docente" class="form-control" id="docentes_select" required></select>
          </div>
        <hr>
          <div class="form-group col">
            <label for="programas_select">Programa Académico</label>
            <select name="programa" class="form-control" id="programas_select" required></select>
          </div>
        <div>
          <div class="form-group col">
            <label for="asignaturas_select">Asignatura</label>
            <select class="form-control" id="asignaturas_select" required></select>
          </div>
          <div class="form-group col">
            <select name="asignatura_grupo" class="form-control" id="asignaturas_grupo_select" required></select>
          </div>
        </div>
        <hr>
        <div class="my-2 text-center">
          <button class="btn btn-elegant">
            <i class="fa fa-arrow-right"></i>
            Continuar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

@push('scripts')
<script>
  $(document).ready(function () {
    $('#docentes_select').select2({
      theme: 'bootstrap4',
      width: '100%',
      tokenSeparators: [','],
      ajax: {
        dataType: 'json',
        url: '{{ url("api/docentes") }}',
        delay: 250,
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

    $('#programas_select').select2({
      theme: 'bootstrap4',
      width: '100%',
      tokenSeparators: [','],
      ajax: {
        dataType: 'json',
        url: '{{ url("api/programas") }}',

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
    $('#asignaturas_select,#asignaturas_grupo_select').select2({
      theme: 'bootstrap4',
      width: '100%',
    });

    $("#programas_select").change(function(){
      var id_programa = $(this).val()
      $('#asignaturas_select').select2({
        theme: 'bootstrap4',
        width: '100%',
        tokenSeparators: [','],
        ajax: {
          dataType: 'json',
          url: '{{ url("api/programas")}}'+"/"+id_programa+"/asignaturas",
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
    })

        $("#asignaturas_select").change(function(){
          var id_asignatura = $(this).val()
      $('#asignaturas_grupo_select').select2({
        theme: 'bootstrap4',
        width: '100%',
        tokenSeparators: [','],
        ajax: {
          dataType: 'json',
          url: '{{ url("api/asignaturas/")}}'+"/"+id_asignatura+"/grupo",
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
    })
  });
</script>
@endpush
