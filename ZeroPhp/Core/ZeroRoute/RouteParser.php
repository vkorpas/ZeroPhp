<?php
namespace ZeroPhp\Core\ZeroRoute;
class RouteParser {
    public static function parse($route =""){
        $route = '/'.ltrim(rtrim($route, '/'), '/').'/';
        preg_match_all('@(\/(?\'controller\'\w+)|({(?\'var\'\w+))})@', $route, $route_parts, PREG_SET_ORDER, 0);
        $first_var = false;
        $temp = "@^(?'controller'";
        foreach ($route_parts as $route_part) {
            if($route_part['controller'] != ''){
                if($first_var){
                    throw new RouteException(CONTROLLERS_MUST_BE_IN_START, 1021);
                }
                $temp .= "\/".$route_part['controller'];
            }
            if(isset($route_part['var'])) {
                if(!$first_var){
                    $temp .=")";
                    $first_var = true;
                }
                $temp .="\/(?'".$route_part['var']."'\w+)";
            }
        }
        if(!$first_var){
            $temp .=")";
            $first_var = true;
        }
        $temp .= "\/?$@";
        return $temp;
    }
}