<?php
/**
 * Controlador de inicio
 */
class Paginas extends Controller
{
  public function index()
  {
    self::vista("Inicio");
  }

  public function perfil()
  {
    echo "perfil usuario";
  }
}
