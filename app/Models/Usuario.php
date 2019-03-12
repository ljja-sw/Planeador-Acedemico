<?php
/**
 *
 */
class Usuario extends Model
{
  function __construct()
  {
    self::setCampos($campos =[
        'nombre',
        'apellido',
        'correo',
        'password',
        'documento_identidad',
        'rol']);

    self::setTabla("usuarios");

    return $this;
  }
}
