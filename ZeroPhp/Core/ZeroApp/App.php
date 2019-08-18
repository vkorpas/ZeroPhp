<?php
namespace ZeroPhp\Core\ZeroApp;
use \ZeroPhp\Core\HttpRequest;
class App{

    private static $isInitialized = false, $isDeinitialized = false;

    public static function Initialize(){
        if(!self::$isInitialized){
            HttpRequest::Initialize();
            print_r($_SERVER);
        }
    }
    public static function Deinitialize(){
        if(!self::$isDeinitialized){

        }
    }

}