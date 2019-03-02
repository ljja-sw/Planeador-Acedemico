<?php class View{

    public function load($vista,$layout = "default"){
        if(file_exists("../app/Views/" . $vista . ".php")){      
            define(CONTENIDO,"../app/Views/".$vista.".php");
            require ("../app/Views/Layouts/".$layout.".php");
          }else{
            die("La Vista no Existe");
          }
    }


} ?>