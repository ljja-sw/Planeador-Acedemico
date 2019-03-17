<?php
/**
 * Controla la base de datos
 */
abstract class Model
{
    protected static $campos;
    protected static $hidden;
    protected static $tabla;
    protected $query;
    protected static $key = "id";

    function __construct()
    {
    }

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

    public function join($table,$on)
    {

    }

    public function where($condition)
    {
      $this->query = DB::query("SELECT " . self::getCampos() . " FROM " . self::getTabla() . " WHERE {$condition}");
      return $this;
    }

    public function get()
    {
      return DB::resultSet($this->query);
    }

    public function setCampos($campos)
    {
        self::$campos = $campos;
        return $this;
    }

    public function getCampos()
    {
        return implode(',', self::$campos);
    }

    public function setHidden($hidden)
    {
        self::$hidden = $hidden;
    }

    public function getHidden()
    {
        return implode(',', self::$hidden);
    }

    public function setTabla($tabla)
    {
        self::$tabla = $tabla;
    }

    public function getTabla()
    {
        return self::$tabla;
    }

    public function setKey($key)
    {
        self::$key = $key;
    }

    public function getKey()
    {
        return self::$key;
    }
}
