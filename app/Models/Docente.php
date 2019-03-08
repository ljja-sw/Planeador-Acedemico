<?php
/**
 *
 */
class Docente extends Model
{
  protected  $campos = [
        'nombre',
        'apellido',
        'correo',
        'password',
        'documento_identidad',
        'codigo',
        'rol',
        'programa_dependencia'];

  function __construct()
  {

  }
}
