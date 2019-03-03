<?php
class ErrorRequest extends Controller{

    public static function error_404(){
        View::load("404");
    }
}
