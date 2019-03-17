<?php
/**
 *
 */
class ApiController extends Controller
{

  function __construct()
  {

  }

  public function horarios()
  {
    $salon = $_POST['salon'];
    if (isset($salon)) {
      $horarios = self::modelo("Horario")
        ->where("salon = {$salon}")
        ->get();
    }else{
      $horarios = self::modelo("Horario")
        ->obtenerTodos();
    }

    echo Helpers::toJson($horarios);
  }
}
