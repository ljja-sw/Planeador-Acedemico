<?php
/**
 * Controlador de inicio
 */
class PaginasController extends Controller
{
  public function inicio()
  {
    self::vista("Inicio");
  }

  public function perfil()
  {
    echo "perfil usuario";
  }
}
