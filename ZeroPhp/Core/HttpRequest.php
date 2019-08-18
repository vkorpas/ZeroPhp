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

    /**
     * @return mixed
     */
    public static function getGet()
    {
        return self::$get;
    }

    /**
     * @return mixed
     */
    public static function getMethod()
    {
        return self::$method;
    }

    /**
     * @return mixed
     */
    public static function getPath()
    {
        return self::$path;
    }

    /**
     * @return mixed
     */
    public static function getPost()
    {
        return self::$post;
    }

    /**
     * @return mixed
     */
    public static function getUrl()
    {
        return self::$url;
    }

    /**
     * @return bool
     */
    public static function isSecure()
    {
        return self::$isSecure;
    }



}