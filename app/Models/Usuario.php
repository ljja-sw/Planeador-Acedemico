<?php
class Usuario extends Model
{
  public function getUsuario($codigo)
  {
    $query = DB::query("SELECT usuarios.password,usuarios.nombre,usuarios.apellido,usuarios.codigo,roles.nombre AS rol
    FROM usuarios INNER JOIN roles on usuarios.rol = roles.id
    WHERE codigo = '$codigo'");
    return   DB::single($query);
  }
}
 ?>
