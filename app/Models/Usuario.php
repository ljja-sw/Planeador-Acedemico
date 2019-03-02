<?php
class Usuario extends Model
{
  public function getUsuarios()
  {
    $this->query("SELECT * FROM usuarios");
    return $this->resultSet();

  }
}

 ?>
