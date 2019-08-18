<?php
namespace ZeroPhp\Core\ZeroApp;
use \ZeroPhp\Core\Request;
class App{

    private static $isInitialized = false, $isDeinitialized = false;

    public static function Initialize(){
        if(!self::$isInitialized){
            Request::Initialize();
            print_r($_SERVER);
        }
    }
    public static function Deinitialize(){
        if(!self::$isDeinitialized){

        }
    }

}