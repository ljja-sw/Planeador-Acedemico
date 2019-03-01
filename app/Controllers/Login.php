<?php
class Login extends Controller
{ 
  public function Index()
  {
    self::$layout = "Auth";
    self::vista("Auth/Login");

  }

  public function enviar()
  {
    echo Request::post("codigo");
    echo Request::post("password");
  }
}
 