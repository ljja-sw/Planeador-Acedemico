<?php
/**
 *
 */
class Programa extends Model
{
  function __construct()
  {
    self::setCampos($campos =[
        'nombre',
        'codigo',
        'sede',
        'id']);
      
    self::setTabla("programas");
  }
}
