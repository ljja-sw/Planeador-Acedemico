<form class="form-signin" action="/iniciar-sesion/iniciar_administracion" method="POST">

    <div class="text-center mb-4">
        <img class="mb-1 logo-login" src="/imgs/logo_color.png" alt="">
        <h1 class="h3 mb-0  text-elegant font-weight-normal">Inicio de Sesión</h1>
        <p class="text-muted">Administracion</p>
    </div>

    <div class=" md-outline md-form">
        <input class="form-control" name="username" type="text" id="input_username"  required autofocus>
        <label for="input_codigo">Correo Electrónico</label>
    </div>

    <div class="md-outline md-form">
        <input class="form-control" name="password" type="password" id="input_password" required>
        <label for="input_password"> Contraseña</label>
    </div>
    <button class="btn btn-lg bg-dark text-white btn-block" type="submit">Iniciar Sesión</button>

    <?php if(isset($_SESSION["msg"])): ?>
    <div class="alert alert-elegant my-3 text-center">
        <?= $_SESSION["msg"] ?>
    </div>
    <?php endif;?>

    <div class="pt-3 text-center">
        <a href="#">Olvidé mis Credenciales</a>
        <!-- <p class="mt-5 mb-3 text-muted">ver 0.1</p> -->
    </div>

</form>
<?php unset($_SESSION['msg']); ?>
