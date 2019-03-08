<?php
/**
 *
 */
class Rol extends Model
{
  function __construct()
  {
    self::setCampos($campos =[
        'nombre',
        'id']);
      
    self::setTabla("roles");
  }
}
