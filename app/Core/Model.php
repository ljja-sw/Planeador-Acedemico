<?php
/**
 * Controla la base de datos
 */
abstract class Model
{
    protected static $campos;
    protected static $tabla;
    protected static $key = "id";

    public static function crear($data)
    {
        $values = [];
        $fields = [];
        $request = [];

        foreach ($data as $field => $value) {
            $values[] = ":" . $field;
            $fields[] = $field;
            $request[] = $value;
        }

        $values = implode(",", $values);

        $query = "INSERT INTO " . self::getTabla() . " (". self::getCampos() .") VALUES($values)";
        return DB::query($query, $request);
    }

    public static function buscar($id)
    {
        $query = DB::query("SELECT " . self::getCampos() . " FROM " . self::getTabla() . "  WHERE " . self::getKey() . " = $id;");
        return DB::single($query);
    }

    public static function obtenerTodos()
    {
        $query = DB::query("SELECT " . self::getCampos() . " FROM " . self::getTabla());
        return DB::resultSet($query);
    }

    public static function obtener($field = "", $compartor = "", $value = "")
    {
        $query = DB::query("SELECT " . self::getCampos() . " FROM " . self::getTabla() . " WHERE {$field} {$compartor} {$value}");
        return DB::resultSet($query);
    }

    public static function setCampos($campos)
    {
        self::$campos = $campos;
    }

    public static function getCampos()
    {
        return implode(',', self::$campos);
    }

    public static function setTabla($tabla)
    {
        self::$tabla = $tabla;
    }

    public static function getTabla()
    {
        return self::$tabla;
    }

    public static function setKey($key)
    {
        self::$key = $key;
    }

    public static function getKey()
    {
        return self::$key;
    }
}
