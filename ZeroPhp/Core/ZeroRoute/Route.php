<?php
namespace ZeroPhp\Core\ZeroRoute;
use \ZeroPhp\Core\HttpRequest;
use \ZeroPhp\Core\HttpResponses\Http404Response;
final class Route{
    private static $routes = [
        'GET' => [
            ['', '\ZeroPhp\Controllers\HomeController'],
            ['login', '\ZeroPhp\Controllers\LoginController']
        ],
        'POST' => [
        ],
    ];

    public static function RouteResolve(){
        $vars = [];
        foreach (self::$routes[HttpRequest::getMethod()] as $route) {
            preg_match(RouteParser::parse($route[0]), HttpRequest::getURI(), $matches, PREG_OFFSET_CAPTURE, 0);
            if(sizeof($matches) > 0){
                foreach($matches as $key=>$value){
                    if($key == 'controller' || is_int($key)){
                        unset($matches[$key]);
                    } else {
                        $vars[$key] = $value[0];
                    }
                }
                $controller = new $route[1]($vars);
                return $controller->run();
            }
        }
        return new Http404Response();
    }
    public static function addRoute($method, $route, $controller){
        self::$routes[$method][] = [$route, $controller];
    }
}