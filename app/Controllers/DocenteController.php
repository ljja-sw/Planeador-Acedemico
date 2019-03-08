<?php
/**
 *
 */
class DocenteController extends Controller
{

  function __construct()
  {
  }

  public function registrar_docente()
  {
    self::$modelo = self::modelo("Docente");
    self::$modelo->buscar(1);
}
}
