<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#A81B2B">
    <!-- <meta name="theme-color" content="#212121"> -->
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/mdb/css/mdb.lite.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <!-- Icon -->
    <link rel="icon" sizes="192x192" href="favicon.png">
    <link rel="icon" href="/favicon.png ">

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="/vendor/mdb/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="/vendor/mdb/js/popper.min.js"></script>
</head>

<body>
    <!-- Header -->
    <header>
        <?php if (isset($_SESSION["md5"]) && $_SESSION['rol'] == "Super Administrador"): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand mx-auto" href="/">
                <img src="/imgs/logo_blanco.png" alt="Planeador Académico">
            </a>

            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarAdmin"
                aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarAdmin">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin/usuarios">
                            <i class="fa fa-user"></i>
                            Usuarios</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                <div class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/imgs/default_user.png" class="rounded-circle z-depth-0 m-1" alt="avatar image"
                                height="35">
                            <span><?= "{$_SESSION['nombre']} {$_SESSION['apellido']}" ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-primary dropdown-menu-center  mx-auto">
                            <a class="dropdown-item" href="/cerrar-sesion">
                                <i class="fa fa-sign-out-alt"></i>
                                Cerrar Sesión</a>
                        </div>
                    </div>

            </div>
        </nav>
      <?php elseif (isset($_SESSION["md5"]) && $_SESSION['rol'] == "Secretario Académico"):  ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
              <a class="navbar-brand mx-auto" href="/">
                  <img src="/imgs/logo_blanco.png" alt="Planeador Académico">
              </a>

              <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarAdmin"
                  aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse text-center" id="navbarAdmin">
                  <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="/docentes">
                              <i class="fa fa-chalkboard-teacher"></i>
                              Docentes</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/asignaturas">
                              <i class="fa fa-list-ol"></i>
                              Materias</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/asignaturas-docentes">
                              <i class="fa fa-list-ol"></i>
                              Asignar Materias <small>(a Docentes)</small></a>
                      </li>
                  </ul>
                  <ul class="navbar-nav ml-auto">
                  <div class="nav-item avatar dropdown">
                          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <img src="/imgs/default_user.png" class="rounded-circle z-depth-0 m-1" alt="avatar image"
                                  height="35">
                              <span><?= "{$_SESSION['nombre']} {$_SESSION['apellido']}" ?></span>
                          </a>
                          <div class="dropdown-menu dropdown-primary dropdown-menu-center  mx-auto">
                              <a class="dropdown-item" href="/cerrar-sesion">
                                  <i class="fa fa-sign-out-alt"></i>
                                  Cerrar Sesión</a>
                          </div>
                      </div>

              </div>
          </nav>
          <?php else: ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand mx-auto" href="/">
                <img src="/imgs/logo_blanco.png" alt="Planeador Académico">
            </a>

            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarPrincipal"
                aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarPrincipal">
                  <?php if(isset($_SESSION['md5'])): ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-chalkboard-teacher"></i>
                                Mis Asignaturas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-list-ol"></i>
                                Mis Planeadores</a>
                        </li>
                    </ul>

                  <ul class="navbar-nav ml-auto">
                    <div class="nav-item avatar dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/imgs/default_user.png" class="rounded-circle z-depth-0 m-1" alt="avatar image"
                                height="35">
                            <span><?= "{$_SESSION['nombre']} {$_SESSION['apellido']}" ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-primary dropdown-menu-center  mx-auto">
                            <a class="dropdown-item" href="/perfil">
                                <i class="fa fa-user"></i>
                                Mi Perfil</a>
                            <a class="dropdown-item" href="/cerrar-sesion">
                                <i class="fa fa-sign-out-alt"></i>
                                Cerrar Sesión</a>
                        </div>
                    </div>
                    <?php else:?>

                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                          <a href="iniciar-sesion" class="btn btn-light"> <i class="fa fa-sign-in-alt"></i> Iniciar
                              Sesion</a>
                      </li>
                    </ul>
                    <?php endif;?>

                </ul>
            </div>
        </nav>
        <?php endif; ?>
    </header>
    <!-- Fin Header -->

    <div class="container pt-2">
        <?php if (isset($_SESSION['msg'])): ?>
        <div class="alert alert-<?= $_SESSION['msg']['tipo'] ?>">
            <?= $_SESSION['msg']['mensaje'] ?>
        </div>
        <?php Helpers::unset("msg") ?>
        <?php endif; ?>
    </div>

    <?php require( CONTENIDO ) ?>

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark pt-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left mt-3 pb-3">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto">
                    <img class="img-footer" src="/imgs/logo_blanco.png" alt="">
                    <p class="ml-3">Creado por los estudiantes de 5to semestre en la Universidad del Valle sede
                        Pacífico.</p>
                </div>
                <hr class="w-100 clearfix d-md-none">
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Enlaces Útiles</h6>
                    <p>
                        <a href="#!">Tu Cuenta</a>
                    </p>
                    <p>
                        <a href="#!">Mis Planeadores</a>
                    </p>
                    <p>
                        <a href="#!">Asignaturas</a>
                    </p>
                    <p>
                        <a href="#!">Ayuda</a>
                    </p>
                </div>
                <hr class="w-100 clearfix d-md-none">
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contactatnos</h6>
                    <p>
                        <i class="fas fa-user mr-3"></i><b>The Programers</b></p>
                    <p>
                        <i class="fas fa-envelope mr-1"></i> contacto.programers@gmail.com</p>
                </div>
            </div>
            <hr>
            <div class="row d-flex align-items-center">
                <div class="col-12">
                    <p class="text-center">© 2019 Copyright:
                        <a href="https://mdbootstrap.com/education/bootstrap/">
                            <strong> jeangallego.io</strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Fin Footer  -->
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/vendor/mdb/js/mdb.min.js"></script>
</body>

</html>
