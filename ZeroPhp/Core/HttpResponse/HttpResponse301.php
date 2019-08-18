<?php
namespace ZeroPhp\Core\HttpResponse;

final class HttpResponse301 extends AbstractHttpResponse300 {
    protected $responce_code = 301;
    public function __construct($url)
    {
        parent::__construct($url);
    }
}