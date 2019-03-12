<title><?= "{$datos['docente']["nombre"]} {$datos['docente']["apellido"]}" ?></title>
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card card-body justify-content-center">
                <div class="text-center">
                        <img class="img-perfil border-radius m-3" src="/imgs/default_user.png"
                            alt="Foto de <?= "{$datos['docente']["nombre"]} {$datos['docente']["apellido"]}" ?>">
                        <h3 class="h3-responsive font-weight-bold">
                            <?= "{$datos['docente']["nombre"]} {$datos['docente']["apellido"]}" ?>
                        </h3>
                        <p class="text-muted"><?= $datos['docente']["documento_identidad"] ?></p>
                        <p><?= $datos['docente']["correo"] ?></p>
                </div>
                <hr>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-body"></div>
        </div>
        <div class="col-md-6">
            <div class="card card-body"></div>
        </div>
    </div>
</div>