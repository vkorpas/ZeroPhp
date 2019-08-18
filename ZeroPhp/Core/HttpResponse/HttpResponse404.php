<?php
namespace ZeroPhp\Core\HttpResponse;
final class HttpResponse404 extends AbstractHttpResponse{
    protected $responce_code = 404;
    public function __construct()
    {
        parent::__construct();

    }
    public function Response()
    {
        print_r("<h1>Page Not Found 404</h1>");
    }
}