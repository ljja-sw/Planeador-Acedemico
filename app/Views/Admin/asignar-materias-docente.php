<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/vendor/select2/bootstrap-theme.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<title>Asignar</title>
<div class="container" if="app">
    <div class="row py-3">
        <div class="col-md-12">
            <div class="card card-body">
                <h4 class="h2-responsive card-title">
                    <i class="fa fa-user"></i>
                    Asignacion de Materias <small>a Docentes</small></h4>
            </div>
        </div>
    </div>
    <?php if (isset($datos['docente'])): ?>
      <form action="/asignaruas-docentes/guardar" method="POST" id="form-asignaturas-docentes">
          <div class="asignatura card card-body">
            <div class="card-title">
                <h5 class="h5-responsive font-weight-bold">
                    <i class="fa fa-list-ul fa-2x"></i>
                    Materia
                </h5>
            </div>
            <input type="text" name="asignatura" value="" hidden>
            <div class="asignatura--datos">
                <h5 class="h5-responsive font-weight-bold">
                    Nombre de Materia
                </h5>
                <hr>
                <small class="text-muted">
                    Código
                </small>
                <p class="m-0 ml-1">123123M</p>
                <small class="text-muted">
                    Grupo
                </small>
                <p class="m-0 ml-1">50</p>
            </div>
          </div>

          <div class="docentes card card-body">
            <div class="card-title">
                <h4 class="h4-responsive font-weight-bold">
                    <i class="fa fa-chalkboard-teacher fa-2x"></i>
                    Docente
                </h4>
            </div>

            <?php foreach ($datos['docente'] as $docente): ?>
              <input type="text" name="docente" value="<?= $docente['id'] ?>" hidden>

              <div class="docente--datos mx-2">
                  <div class="float-left">
                      <h5 id="nombre" class="h5-responsive font-weight-bold m-0"><?=  "{$docente['nombre']} {$docente['apellido']}"  ?></h5>
                      <p class="m-0"><?= $docente['correo'] ?></p>
                      <hr>
                      <small class="text-muted">Cedula Ciudadania</small>
                      <p class="m-0 ml-1"><?= $docente['documento_identidad'] ?></p>
                      <small class="text-muted">Codigo</small>
                      <p class="m-0 ml-1"><?= $docente['codigo'] ?></p>
                  </div>
                  <div class="float-right">
                      <img class="" src="/imgs/default_user.png" alt="" style="height:128px;">
                  </div>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="row py-2">
            <div class="col-12">
              <div class="card card-body">
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="salon_asignatura">Salon/Sala</label>
                        <div class="input-group px-3">
                            <select class="form-control custom-select" id="salon_asignatura" name="salon">
                                <?php foreach ($datos['salones'] as $sala) : ?>
                                <option value="<?= $sala['id'] ?>"><?= $sala['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <label for="horarios">Horarios Disponibles</label>
                      <div class="input-group px-3">
                        <select class="form-control custom-select" id="horarios" name="horario">
                        </select>
                        </div>
                    </div>
                </div>
                <div class="p-2 text-right">
                  <button type="submit" class="btn btn-elegant"> <i class="fa fa-save"></i> Guardar</button>
                </div>
              </div>
            </div>
          </div>
      </form>
    <?php else: ?>
      <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
              <div class="card-title text-center">
                <i class="fa fa-search fa-4x"></i>
                <hr>
              </div>
              <form class="" action="/asignaturas-docentes" method="post">
                <div class="form-row py-3">
                  <label for="docentes_select font-weight-bold">Selecciona el Docente</label>
                    <div class="input-group">
                      <select class="form-control custom-select" name="docente" id="docentes_select" required>
                        <?php foreach ($datos['docentes'] as $docente): ?>
                            <option value="<?= $docente['id'] ?>"><?= "{$docente['nombre']} {$docente['apellido']} - {$docente['documento_identidad']}" ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                </div>

                  <div class="form-row py-3">
                    <label for="asignaturas_select font-weight-bold">Selecciona la Asignatura</label>
                      <div class="input-group">
                        <select class="form-control custom-select" name="docente" id="asignaturas_select" required>
                        </select>
                    </div>
                  </div>
                  <div class="py-3 text-center">
                    <button class="btn btn-elegant" type="submit" name="button">
                      <i class="fa fa-arrow-alt-circle-right"></i>
                      Continuar</button>
                  </div>
              </form>
            </div>

        </div>
      </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
getHorarios(1)

$("#salon_asignatura,#horarios,#docentes_select,#asignaturas_select").select2({
    theme: 'bootstrap4',
});
$("#salon_asignatura").on("change", function(e) {
    $("#horarios").html("")
    getHorarios(this.value)
})

function getHorarios(id) {
    $.ajax({
        url: '/api/horarios',
        type: 'POST',
        data: 'salon=' + id,
        dataType: 'json',
        success: function(json) {
            $.each(json.data, function(i, value) {
                $("#horarios").append('<option value="' + value.id + '">' + value.dia + ',' + value
                    .hora_inicio + '-' + value.hora_fin + '</option>')
            });
        }
    });
}
</script>
