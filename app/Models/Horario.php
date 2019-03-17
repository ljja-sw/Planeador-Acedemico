<?php
/**
 *
 */
class Horario extends Model
{
  function __construct()
  {
    self::setCampos($campos =[
        'id',
        'salon',
        'hora_inicio',
        'hora_fin',
        'dia']);

    self::setTabla("horarios");

    return $this;
  }
}
