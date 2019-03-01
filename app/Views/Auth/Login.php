<form class="form-signin" action="/login/enviar" method="POST">

    <div class="text-center mb-4">
        <img class="mb-1 logo-login" src="imgs/logo_color.png" alt="">

        <h1 class="h3 mb-0 font-weight-normal">Inicio de Sesión</h1>
        <small class="text-muted">Estudiantes y Docentes</small>
    </div>

    <div class="form-label-group">
        <input class="form-control" name="codigo" type="text" id="input_codigo" placeholder="Nombre de Usuario" required autofocus>
        <label for="input_codigo">Código</label>
    </div>

    <div class="form-label-group">
        <input class="form-control" name="password" type="password" id="input_password" placeholder="Password" required>
        <label for="input_password"> Contraseña</label>
    </div>

    <button class="btn btn-lg bg-primary text-white btn-block" type="submit">Iniciar Sesión</button>
    <div class="pt-3 text-center">
        <a href="#">Olvidé mis Credenciales</a>
        <!-- <p class="mt-5 mb-3 text-muted">ver 0.1</p> -->
    </div>
</form> 