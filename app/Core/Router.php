<?php
/**
   *
   **/
class Router
{
  protected $controlador;
  protected $metodo;
  protected $parametros = [];

  protected static $rutas = [];

  function __construct()
  {
    $uri = $this->getURI();
    
    $url = explode("?",$this->getURI());
    

    if ($this->esRuta($url)) {
      $ruta = $this->getRoutes()[$url[0]];
      $accion = $this->separarAccion($ruta);
           
      $this->controlador = $accion[0];
      $this->metodo = $accion[1];
      $this->parametros = $_GET;
      
      if(file_exists("../app/Controllers/" . $this->controlador . ".php")){
        require_once "../app/Controllers/" . $this->controlador . ".php";
      }
      
      $this->controlador = 
      (str_replace("/","",strstr($this->controlador,"/")) != "") ? 
              str_replace("/","",strstr($this->controlador,"/")) :
              $this->controlador ;

      if (@in_array($_SESSION['rol'],$ruta['rol']) || $ruta['rol'] == "") {        
        if (method_exists($this->controlador,$this->metodo)) {
          call_user_func_array([
            $this->controlador,
            $this->metodo
          ], $this->parametros);
        }else{
          require_once "../app/Controllers/ErrorRequest.php";
          call_user_func_array([
            "ErrorRequest",
            "error_404"
          ], $this->parametros);
        }
      } else {
        die("No tienes los permisos para acceder a este recurso");
      }

    }else{
      require_once "../app/Controllers/ErrorRequest.php";
      call_user_func_array([
        "ErrorRequest",
        "error_404"
      ], $this->parametros);
    }
  }

  public static function add($ruta,$action,$rol = ""){
      self::$rutas[$ruta] = ['ruta' => $action,'rol' => $rol];
  }

  function esRuta($url)
  {
    foreach ($this->getRoutes() as $ruta => $action) {

      if ($url[0] == $ruta) {
        return true;
      }
    }
  }

  public static function loggedin()
  {
    return true;
  }

  function transformarUrl($url)
  {
      $url = rtrim($url, "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
  }

  function separarAccion($accion)
  {
    $a = explode("@",$accion['ruta']);
    return $a;
  }

  function getRoutes()
  {
    return self::$rutas;
  }

  function getURI()
  {
    return $_SERVER['REQUEST_URI'];
  }
}