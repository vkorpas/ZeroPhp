<?php
include("ZeroPhp/autoload.php");

spl_autoload_register("\ZeroPhp\Autoload::loadClass");
use \ZeroPhp\Core\ZeroApp\App;

try{
    App::Initialize();
    App::Deinitialize();

} catch (\ZeroPhp\ZeroPhpExceptionException $e){
    print_r($e->getMessage());

} catch (\ZeroPhp\AutoloadException $e){
    print_r($e->getMessage());

} catch (\Exception $e){
    print_r($e->getMessage());
}
