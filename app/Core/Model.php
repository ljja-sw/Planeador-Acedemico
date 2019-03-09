<?php
/**
 * Controla la base de datos
 */
abstract class Model
{
  protected static $campos;
  protected static $tabla;

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
    return DB::query($query,$request);
  }

  public static function buscar($id)
  {
    $query = DB::query("SELECT ".implode(',',self::getCampos())." FROM ".self::getTabla()."  WHERE id = $id;");
    return DB::single($query);
  }

  public static function obtenerTodos()
  {
    $query = DB::query("SELECT ".implode(',',self::getCampos())." FROM ".self::getTabla());
    return DB::resultSet($query);
  }

  public static function obtener($field = "",$compartor = "",$value = "")
  {
    $query = DB::query("SELECT ".implode(',',self::getCampos())." FROM ".self::getTabla());

    if (!$field == "") {
      $query = DB::query("SELECT ".implode(',',self::getCampos())." FROM ".self::getTabla()." WHERE {$field} {$compartor} {$value}");

    }
    return DB::resultSet($query);
  }

  public static function setCampos($campos)
  {
    self::$campos = $campos;
  }

  public static function getCampos()
  {
    return self::$campos;
  }

  public static function setTabla($tabla)
  {
    self::$tabla = $tabla;
  }

  public static function getTabla()
  {
    return self::$tabla;
  }
}
 ?>
