<?php
namespace ZeroPhp\Core\HttpResponse;

final class HttpResponse302 extends AbstractHttpResponse300 {
    protected $responce_code = 302;
    public function __construct($url)
    {
        parent::__construct($url);
    }
}