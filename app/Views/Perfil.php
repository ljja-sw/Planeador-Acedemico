<title>Perfil</title>
<div class="container mt-3 ">

</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <!-- Datos del Docente -->
            <div class="my-auto">
                <div class="card card-body flex-center text-center py-2">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-perfil border-radius m-3" src="imgs/default_user.png"
                                alt="Foto de <?= "{$_SESSION["nombre"]} {$_SESSION["apellido"]}" ?>">
                        </div>
                        <div class="col-md-6 my-auto ">
                            <small class="text-muted"><?= $_SESSION["rol"] ?></small>
                            <h3 class="h3-responsive font-weight-bold">
                                <?= "{$_SESSION["nombre"]} {$_SESSION["apellido"]}" ?>
                            </h3>
                            <p><?= $_SESSION["correo"] ?></p>
                            <div class="py-2">
                                <a href="#">Cambiar Contraseña</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Datos del Docente -->
            <!-- Clases para Hoy -->
            <div class="my-auto py-2">
                <div class="card card-body">
                    <small class="text-muted pb-2">Clases para hoy</small>
                    <div class="pl-2">
                        <p class="m-0 text-muted">Dia</p>
                        <h4 class="m-0 h4-responsive font-weight-bold">Nombre Asignatura</h4>
                        <p class="m-0">Hora</p>
                    </div>
                </div>
            </div>
            <!-- Fin Clases para hoy -->
            <!-- Asignaturas del Docente -->
            <div class="my-auto py-2">
                <div class="card card-body">
                    <small class="text-muted pb-2">Tus asignaturas</small>
                    <div class="pl-2">
                        <ul class="list-group list-group-flush">
                            <?php for($i=1;$i<=5;$i++): ?>
                            <li class="list-group-item"><a href="#">4-12314M-50 INTRODUCCIÓN A LOS
                                    PÁJAROS-<?= $i  ?></a></li>
                            <?php endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Fin Asignaturas del Docente -->
        </div>
    </div>
</div>