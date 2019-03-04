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
    self::vista("Perfil");
  }
}
