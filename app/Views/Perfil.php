<title>Perfil</title>
  <div class="container my-3">
  <div class="row">
    <!-- Datos Perfil -->
    <div class="col-md-4">
      <div class="card card-body flex-center">
          <div class="row flex-center pb-4">
              <img class="img-perfil border-radius" src="imgs/default_user.png" alt="Foto de <?= "{$_SESSION["nombre"]} {$_SESSION["apellido"]}" ?>">
          </div>

          <small class="text-muted"><?= $_SESSION["rol"] ?></small>
          <h3 class="h3-responsive font-weight-bold"><?= "{$_SESSION["nombre"]} {$_SESSION["apellido"]}" ?></h3>
          <p><?= $_SESSION["correo"] ?></p>
          <nav class="nav py-2">
            <div class="nav-item">
              <a href="#" class="nav-link">Editar Perfil</a>
            </div>
            <div class="nav-item">
              <a href="#" class="nav-link">Cambiar contraseña</a>
            </div>
          </nav>
      </div>
    </div>
    <!-- Datos Perfil -->
    <!-- Asignaturas del Docente -->
    <div class="col-md-8 my-auto py-2">
      <div class="card card-body">
        <div class="card-title">
          <h3>Tus Asignaturas</h3>
          <p>Cuentas con <b>X</b> Asignaturas.</p>
        </div>
        <div class="px-3">
          <ul class="list-group list-group-flush">
            <?php for ($i = 1;$i<=5;$i++): ?>
              <li class="list-group-item">
                <a href="#">04-12312M-50 <b>Asignatura <?= $i ?></b></a>
              </li>
            <?php endfor; ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- Asignaturas del Docente -->
  </div>
</div>
