<?php

Router::add("/","PaginasController@inicio");
Router::add("/perfil","PaginasController@perfil");

Router::add("/docentes",
            "DocenteController@index",
            ['Secretario Académico']);

Router::add("/docentes/guardar","DocenteController@registrar_docente");
Router::add("/docentes/detalles","DocenteController@detalles_docente");

Router::add("/admin/usuarios",
            "UsuarioController@index",
            ['Super Administrador']);

Router::add("/usuarios/guardar","UsuarioController@registrar_usuario");
Router::add("/usuarios/detalles","UsuarioController@detalles_usuario");


Router::add("/iniciar-sesion","LoginController@formulario");
Router::add("/iniciar-sesion/administracion","LoginController@formulario_administracion");
Router::add("/iniciar-sesion/iniciar","LoginController@iniciar");
Router::add("/iniciar-sesion/iniciar_administracion","LoginController@iniciar_administracion");
Router::add("/cerrar-sesion","LoginController@cerrar_sesion");
