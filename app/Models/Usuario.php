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
    $this->query("SELECT usuarios.password,usuarios.nombre,usuarios.apellido,usuarios.codigo,roles.nombre AS rol
    FROM usuarios INNER JOIN roles on usuarios.rol = roles.id
    WHERE codigo = '$codigo'");
    return $this->single();
  }
}
 ?>