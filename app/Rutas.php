<?php

Router::add("/","PaginasController@inicio");

Router::add("/perfil","PaginasController@perfil");

Router::add("/registrar-docente","DocenteController@registrar_docente");


Router::add("/iniciar-sesion","LoginController@formulario");
Router::add("/iniciar-sesion/iniciar","LoginController@iniciar");

Router::add("/cerrar-sesion","LoginController@cerrar_sesion");
