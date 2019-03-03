<?php
class Usuario extends Model
{
  public function getUsuarios()
  {
    $this->query("SELECT * FROM usuarios");
    return $this->resultSet();
  }

  public function getUsuario($codigo)
  {
    $this->query("SELECT * FROM usuarios WHERE codigo = '$codigo'");
    return $this->single();
  }
}

 ?>
