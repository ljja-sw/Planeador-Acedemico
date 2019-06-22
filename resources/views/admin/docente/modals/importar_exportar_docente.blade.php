<div class="modal fade" id="importar_exportar_docentes" tabindex="-1" role="dialog" aria-hidden="true">
  <form class="modal-dialog modal-dialog-centered"  enctype="multipart/form-data" role="document" action="{{route('docentes.importar')}}" autocomplete="off" method="POST" id="formImportar">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 font-weight-bold">
          Importar/Exportar listado de Docentes
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 mx-auto text-center">
        <div>
          <h6>Imporar listado de docentes de archivo <b>.xslx</b></h6>
          <input type="file" name="listado" required   accept=".xlsx">
          <button class="btn btn-elegant" type="submit"><i class="fa fa-file-import"></i>
            <span id="TextImportando">Importar</span></button><br>
                    <small class="red-text"><i class="fa fa-exclamation-circle"></i> Esto <span class="font-weight-bold">reiniciará</span> la contraseña de todos los docentes</small>
        </div>
        <hr class="hr-dark">
        <div>
          <h6>Exportar listado de docentes como archivo <b>.xslx</b></h6>
          <a class="btn btn-elegant" id="btnExportar" onclick="exportar()" href="#!">
            <span class="spinner-grow spinner-grow-sm" id="exportando" hidden role="status" aria-hidden="false"></span>
            <span id="textoBoton"><i class="fa fa-file-export"></i> Exportar listado</span>
          </a>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  function exportar() {

    $("#exportando").removeAttr('hidden')
    $("#textoBoton").text("Exportando...")

    $.ajax({
      url: "{{route('docentes.exportar')}}",
      type: 'get',
      cache: false,
      data: null,

      success: function (data) {
        $("#exportando").attr("hidden", true);
        $("#btnExportar").html("<i class='fa fa-save'></i> Descargar listado");
        $("#btnExportar").attr('href', data)
      }

    });
  }
</script>