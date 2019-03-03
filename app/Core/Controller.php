<?php
/**
 *
 */
class Controller
  {

  protected static $layout = "default";

  public function modelo($modelo){
    require_once "../app/mModels/" . $modelo . ".php";
    return new $modelo;
  }

  public function vista($vista,$datos = []){
    if(file_exists("../app/Views/" . $vista . ".php")){      
      define(CONTENIDO,"../app/Views/".$vista.".php");
      require ("../app/Views/Layouts/".self::$layout.".php");
    }else{
      die("La Vista no Existe");
    }
  }

  public function setLayout($layout){
    self::$layout = $layout;
  }
}

 ?>
