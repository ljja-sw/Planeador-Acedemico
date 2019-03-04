<?php

Base::add("/","PaginasController@inicio");

Base::add("/perfil","PaginasController@perfil");

Base::add("/iniciar-sesion","LoginController@formulario");
Base::add("/iniciar-sesion/iniciar","LoginController@iniciar");

Base::add("/cerrar-sesion","LoginController@cerrar_sesion");
