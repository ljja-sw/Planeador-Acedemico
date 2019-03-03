<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#A81B2B">
    <!-- <meta name="theme-color" content="#212121"> -->
    <title>Inicio</title>
    <!-- Fontawesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/mdb/css/mdb.lite.min.css">
    <link rel="stylesheet" href="css/main.css">
    <!-- Icon -->
    <link rel="icon" sizes="192x192" href="favicon.png">
    <link rel="icon" href="/favicon.png ">
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
            <a class="navbar-brand mx-auto" href="/">
                <img src="imgs/logo_blanco.png" alt="Planeador Académico">
            </a>

            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarPrincipal"
                aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navbarPrincipal">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-chalkboard-teacher"></i><br>
                            Mis Asignaturas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-list-ol"></i><br>
                            Mis Planeadores</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['md5'])): ?>
                    <li class="nav-item avatar">
                        <a class="nav-link p-0" href="#">
                            
                        </a>
                    </li>
                    <div class="nav-item avatar dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><?= "{$_SESSION['nombre']} {$_SESSION['apellido']} - {$_SESSION['rol']}" ?></span>
                            <img src="imgs/default_user.png" class="rounded-circle z-depth-0 m-1" alt="avatar image"
                                height="35"></button>
                        <div class="dropdown-menu dropdown-primary dropdown-menu-center">
                            <a class="dropdown-item" href="#">
                            <i class="fa fa-user"></i><br>                                
                            Mi Perfil</a>
                            <a class="dropdown-item" href="login/cerrar_sesion">
                            <i class="fa fa-sign-out-alt"></i><br>
                                Cerrar Sesión</a>
                        </div>
                    </div>
                    <?php else:?>

                    <li class="nav-item">
                        <a href="login" class="btn btn-light"> <i class="fa fa-sign-in-alt"></i> Iniciar Sesion</a>
                    </li>
                    <?php endif;?>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Fin Header -->
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
                        <i class="fas fa-user mr-3"></i><b>Jean Carlos Gallego</b></p>
                    <p>
                        <i class="fas fa-envelope mr-1"></i> jean.gallego@gmail.com</p>
                    <p>
                        <i class="fas fa-user mr-3"></i><b>Juiner Solis</b></p>
                    <p>
                        <i class="fas fa-envelope mr-1"></i> juiner.info@gmail.com</p>
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

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="vendor/mdb/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="vendor/mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="vendor/mdb/js/mdb.min.js"></script>
</body>

</html>