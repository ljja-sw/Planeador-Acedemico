<?php
class ErrorRequest extends Controller{

    public static function error_404(){
        self::vista("404");
    }
}
