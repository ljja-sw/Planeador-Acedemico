<?php
/**
 *
 */
class Docente extends Model
{
  function __construct()
  {
    self::setCampos($campos =[
        'nombre',
        'apellido',
        'correo',
        'password',
        'documento_identidad',
        'codigo',
        'rol',
        'programa_dependencia']);

    self::setHidden($hidden = "password");

    self::setTabla("docentes");

    self::setKey("codigo");

    return $this;
  }
}
