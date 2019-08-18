<?php
namespace ZeroPhp\Core;
class HttpRequest{
    private static $isInitialized = false;
    private static $url, $method, $path, $get, $post, $isSecure = false;

    public static function Initialize(){
        if(!self::$isInitialized){
            self::$url = new \ZeroPhp\Core\URL($_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            self::$method = $_SERVER['REQUEST_METHOD'];
            self::$path = self::$url->getPath();
            self::$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            self::$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on"){
                self::$isSecure = true;
            }
            self::$isInitialized = true;
        }
    }



}