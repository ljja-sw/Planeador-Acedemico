<?php 
class ErrorRequest extends Controller{

    public static function eror_404(){
        View::load("404");
    }
}