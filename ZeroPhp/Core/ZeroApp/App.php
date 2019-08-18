<?php
namespace ZeroPhp\Core\ZeroApp;
use http\Env\Request;
use http\Env\Response;
use \ZeroPhp\Core\HttpRequest;
use \ZeroPhp\Core\HttpResponse\HttpResponse301;
use \ZeroPhp\Core\HttpResponse\HttpResponse302;
class App{


    private static $isInitialized = false, $isDeinitialized = false;

    public static function Initialize(){
        if(!self::$isInitialized){
            HttpRequest::Initialize();

            if(APP_ONLY_SECURE && !HttpRequest::isSecure()){
                $url = HttpRequest::getUrl();
                $url->setProtocol("https");
                self::Redirect301($url);
            }
            print_r($_SERVER);
        }
    }

    public static function Redirect301($url){
        $a = new HttpResponse301("$url");
        $a->Response();
    }
    public static function Redirect302($url){
        $a = new HttpResponse302("$url");
        $a->Response();
    }

    public static function Deinitialize(){
        if(!self::$isDeinitialized){

        }
    }

}