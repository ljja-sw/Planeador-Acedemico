<?php
class LoginController extends Controller
{
  function __construct()
  {
  }

  public function formulario()
  {
    if (isset($_SESSION['md5'])) {
      header("Location: /");
    }
    self::setLayout("Auth");
    self::vista("Auth/Login");
  }

  public function formulario_administracion()
  {
    if (isset($_SESSION['md5'])) {
      header("Location: /");
    }
    self::setLayout("Auth");
    self::vista("Auth/Login.administracion");
  }

  public function iniciar()
  {
    $username = Request::post("username");
    $pass =  Request::post("password");

    $query = DB::query(
      "SELECT docentes.nombre,docentes.apellido,docentes.codigo,docentes.password,docentes.correo,docentes.documento_identidad,roles.nombre AS rol
       FROM docentes
       INNER JOIN roles
       ON docentes.rol = roles.id
       WHERE codigo = '$username'
       OR correo = '$username'");

    $usuario = DB::single($query);

    if (count($usuario) >= 1 && password_verify($pass,$usuario['password'])) {
      $md5 = md5(time().$codigo);

      $_SESSION['md5'] = $md5;
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nombre'] = $usuario['nombre'];
      $_SESSION['apellido'] = $usuario['apellido'];
      $_SESSION['codigo'] = $usuario['codigo'];
      $_SESSION['correo'] = $usuario['correo'];
      $_SESSION['di'] = $usuario['documento_identidad'];
      $_SESSION['rol'] = $usuario['rol'];

      switch ($_SESSION['rol']) {
        case 'Super Administrador':
          Helpers::redirect("/super-administrador");
          break;
        case 'Secretario Académico':
          Helpers::redirect("/secretario-academico");
          break;
        default:
            Helpers::redirect("/");
          break;
      }

    }else{
      $_SESSION['msg'] = "Nombre de usuario o contraseña incorrectos";
      header("Location: /iniciar-sesion");
      $_SESSION['codigo'] = $codigo;
    }
  }

  public function iniciar_administracion()
  {
    $username = Request::post("username");
    $pass =  Request::post("password");

    $query = DB::query(
      "SELECT usuarios.nombre,usuarios.apellido,usuarios.password,usuarios.correo,usuarios.documento_identidad,roles.nombre AS rol
       FROM usuarios
       INNER JOIN roles
       ON usuarios.rol = roles.id
       WHERE correo = '$username'");

    $usuario = DB::single($query);

    if (count($usuario) >= 1 && password_verify($pass,$usuario['password'])) {
      $md5 = md5(time().$codigo);

      $_SESSION['md5'] = $md5;
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nombre'] = $usuario['nombre'];
      $_SESSION['apellido'] = $usuario['apellido'];
      $_SESSION['correo'] = $usuario['correo'];
      $_SESSION['di'] = $usuario['documento_identidad'];
      $_SESSION['rol'] = $usuario['rol'];

      header("Location: /");

    }else{
      $_SESSION['msg'] = "Nombre de usuario o contraseña incorrectos";
      header("Location: /iniciar-sesion/administracion");
      echo "error";
    }
  }

  public function cerrar_sesion()
  {
    unset($_SESSION['md5']);
    session_destroy();
    header("Location: /");

  }
}
