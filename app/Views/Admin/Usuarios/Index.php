<?php include "modal-registrar-usuario.php"; ?>
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
                  Usuarios
                </h2>
                <p class="text-muted"><b> <?= count($datos['usuarios']) ?> </b> usuarios registrados.</p>
              </div>
              <hr>
                <div class="text-right">
                  <button type="button"
                          class="btn btn-elegant waves-effect waves-light"
                          data-toggle="modal"
                          data-target="#modal-registrar-docentes">

                  <i class="fa fa-plus"></i>
                  Registrar Usuario
                  </button>
                </div>
                <hr>
                <div class="table-responsive px-4">
                  <table class="table text-center" id="tabla-usuarios">
                    <thead class="black white-text">
                      <tr>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Cedula de Ciudadania</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($datos['usuarios'] as $usuario): ?>
                        <tr>
                          <td>
                            <a href="/docentes/usuario?c=<?= $usuario['codigo'] ?>">
                              <?= "{$usuario['nombre']} {$usuario['apellido']}" ?></td>
                            </a>
                          <td><?= $usuario['correo'] ?></td>
                          <td><?= $usuario['documento_identidad'] ?></td>
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
$('#tabla-usuarios').DataTable();
});
</script>
