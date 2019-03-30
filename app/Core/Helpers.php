<?php
/**
 *
 */
class Helpers
{

  public static function redirect($destino)
  {
    header("Location: $destino");
    return self;
  }

  public static function alert($tipo,$mensaje)
  {
    $_SESSION['msg'] =
    ['mensaje'=> $mensaje,
     'tipo'=> $tipo];
  }

  public static function toJson($array)
  {
    header("Content-type: application/json");
    return json_encode(['data' => $array]);
  }

  public static function loggedin()
  {
    if(isset($_SESSION['md5'])){
      return true;
    }
    self::redirect("/iniciar-sesion");
  }

  public static function unset($var)
  {
    unset($_SESSION[$var]);
  }
}
