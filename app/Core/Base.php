<?php
/**
   *
   **/
class Base
{
  protected $controlador = "Paginas";
  protected $metodo = "index";
  protected $parametros = [];

  function __construct()
  {
    $url =  $this->cargarUrl();

    if (file_exists("../app/Controllers/" . ucwords($url[0]) . ".php")) {
      $this->controlador = ucwords($url[0]);
      unset($url[0]);
    }elseif (ucwords($url[0]) == "") {
      # code...
    }else{
      $this->controlador = "ErrorRequest";
      $this->metodo = "eror_404";
    }
    require_once "../app/Controllers/" . $this->controlador . ".php";

    if (isset($url[1])) {
      $metodo = str_replace("-", "_", $url[1]);
      if (method_exists($this->controlador, $metodo)) {
        $this->metodo = $metodo;
        unset($url[1]);
      }
    }

    $this->parametros = $url ? array_values($url) : [];

    call_user_func_array([
      $this->controlador,
      $this->metodo
    ], $this->parametros);
  }

  function cargarUrl()
  {
    if (isset($_GET["url"])) {
      $url = rtrim($_GET["url"], "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url;
    }
  }
}
