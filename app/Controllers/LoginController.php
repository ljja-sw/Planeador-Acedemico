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

  public function iniciar()
  {
    $codigo = Request::post("codigo");
    $pass =  Request::post("password");

    $query = DB::query(
      "SELECT usuarios.nombre,usuarios.apellido,usuarios.codigo,usuarios.password,usuarios.correo,usuarios.documento_identidad,roles.nombre AS rol
       FROM usuarios
       INNER JOIN roles
       ON usuarios.rol = roles.id
       WHERE codigo = '$codigo'");

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

      header("Location: /");

    }else{
      $_SESSION['msg'] = "Nombre de usuario o contraseña incorrectos";
      header("Location: /iniciar-sesion");
      $_SESSION['codigo'] = $codigo;
    }
  }

  public function cerrar_sesion()
  {
    unset($_SESSION['md5']);
    session_destroy();
    header("Location: /");

  }
}
