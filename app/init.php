<?php
session_start();
// Cargamos Config
require_once "Config/Config.php";

// Usamos una especie de Autoload para cargar las clases
spl_autoload_register(function($className) {
  require_once "Core/". $className . ".php";
});

require_once('Routes/web.php');
require_once('Routes/api.php');
?>
