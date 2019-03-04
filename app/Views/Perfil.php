<title>Perfil</title>
<div class="container mt-4 ">

</div>
<div class="container">
    <div class="row row-perfil pb-4" style="background-image: url(/imgs/login_bg.png)">
    </div>
    <div class="row">
        <div class="col-md-8">
            <!-- Datos del Docente -->
            <div class="my-auto py-2">
                <div class="card card-body">
                <img class="img-perfil border-radius" src="imgs/default_user.png"
                        alt="Foto de <?= "{$_SESSION["nombre"]} {$_SESSION["apellido"]}" ?>">

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
            <!-- Fin Datos del Docente -->
            <!-- Asignaturas del Docente -->
            <div class="my-auto py-2">
                <div class="card card-body">
                </div>
            </div>
            <!-- Fin Asignaturas del Docente -->
            <!-- Planeadores del Docente -->
            <div class="my-auto py-2">
                <div class="card card-body">
                </div>
            </div>
            <!-- Fin Planeadores del Docente -->
        </div>
        <div class="col">
            <!-- Clases para Hoy -->
            <div class="my-auto py-2">
                <div class="card card-body">
                    <small class="text-muted">Clases para hoy</small>
                    <p class="m-0 text-muted">Dia</p>
                    <h5 class="m-0 font-weight-bold">Nombre Asignatura</h5>
                    <p class="m-0">Hora</p>
                </div>
            </div>
            <!-- Fin Clases para hoy -->
        </div>
    </div>
</div>