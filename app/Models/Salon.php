<?php
/**
 *
 */
class Salon extends Model
{

  function __construct()
  {
    self::setCampos($campos =[
        'id',
        'nombre']);

    self::setTabla("salones_salas");
  }
}
