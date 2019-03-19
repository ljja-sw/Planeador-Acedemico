<?php include "modal-registrar-docente.php"; ?>
<link rel="stylesheet" href="/vendor/datatables/datatables.min.css">
<script src="/vendor/datatables/datatables.min.js" charset="utf-8"></script>
<title>Docentes</title>

<div class="container">
    <div class="row py-3">
        <div class="col-md-12 mx-auto">
            <div class="card card-body">
              <div class="pl-2">
                <h2 class="h2-responsive card-title">
                  <i class="fa fa-user"></i>
                  Docentes
                </h2>
                <p class="text-muted"><b> <?= count($datos['docentes']) ?> </b> docentes registrados.</p>
              </div>
              <hr>
                <div class="text-right">
                  <button type="button"
                          class="btn btn-elegant waves-effect waves-light"
                          data-toggle="modal"
                          data-target="#modal-registrar-docentes">

                  <i class="fa fa-plus"></i>
                  Registrar Docente
                  </button>
                </div>
                <hr>
                <div class="table-responsive px-4">
                  <table class="table text-center" id="tabla-docentes">
                    <thead class="black white-text">
                      <tr>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Documento de Indentidad</th>
                        <th>Dependencia</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($datos['docentes'] as $docente): ?>
                        <tr>
                          <td>
                            <a href="/docentes/detalles?c=<?= $docente['codigo'] ?>">
                              <?= "{$docente['nombre']} {$docente['apellido']}" ?></td>
                            </a>
                          <td><?= $docente['correo'] ?></td>
                          <td><?= $docente['documento_identidad'] ?></td>
                          <td><?= $datos['programas'][$docente['programa_dependencia']-2]['nombre'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
$('#tabla-docentes').DataTable();
});
</script>
