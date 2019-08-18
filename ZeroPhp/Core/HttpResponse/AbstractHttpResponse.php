<?php
namespace ZeroPhp\Core\HttpResponse;

abstract class AbstractHttpResponse{
    protected $responce_code = 200;

    public function __construct()
    {
        header("ZeroPhp-Version: 0.1");
        header("ZeroPhp-Owner: Division By Zero P.C.");
        http_response_code($this->responce_code);

    }

    abstract public function Response();
}