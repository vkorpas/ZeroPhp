<?php

namespace ZeroPhp;
class Autoload{
    private static $isInitialized = false;



    public static function loadClass($class){
        if(!self::$isInitialized){
            self::initialize();
        }
        $file = self::classParser($class);
        if(file_exists($file)){
            require_once($file);
        } else {
            throw new AutoloadException("The class $class not found");
        }
    }
    private static function classParser($class){
        return str_replace("\\","/", $class).".php";
    }
    private static function initialize(){
        require_once ('settings.php');
    }
}

class AutoloadException extends \Exception{

}