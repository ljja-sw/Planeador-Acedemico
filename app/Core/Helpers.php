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

  public static function loggedin()
  {
    return isset($_SESSION['md5']);
  }

  public static function unset($var)
  {
    unset($_SESSION[$var]);
  }
}
