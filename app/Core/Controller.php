<?php
/**
 *
 */
class Controller
  {

  protected static $layout = "default";
  protected static $modelo;

  public function modelo($modelo){
    require_once "../app/Models/" . $modelo . ".php";
    return new $modelo;
  }

  public function vista($vista, $datos = []) {
    if(file_exists("../app/Views/" . $vista . ".php")){
        define(@CONTENIDO,"../app/Views/".$vista.".php");
        require_once ("../app/Views/Layouts/".self::$layout.".php");
      }else{
        die("La Vista no Existe");
      }
  }

  public function setLayout($layout){
    self::$layout = $layout;
  }
}

 ?>
