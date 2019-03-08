<?php
/**
 * Controla la base de datos
 */
abstract class Model
{
  public static function setCampos($campos)
  {
    self::$campos = $campos;
  }

  public static function crear($data)
  {
    $values = [];
    $fields = [];
    $request = [];

    foreach ($data as $field => $value) {
      $values[] = ":".$field;
      $fields[] = $field;
      $request[] = $value;
    }

    $values = implode(",",$values);
    $fields = implode(",",$fields);

    $query = "INSERT INTO usuarios ($fields) VALUES($values)";
    $insert = DB::query($query,$request);
  }

  public static function buscar($id)
  {
    $query = DB::query("SELECT ($this->campos) from usuarios WHERE id = $id");
    return DB::single($query);
  }
}
 ?>
