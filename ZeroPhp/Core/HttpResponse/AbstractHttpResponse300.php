<?php
namespace ZeroPhp\Core\HttpResponse;
class AbstractHttpResponse300 extends AbstractHttpResponse{
    protected $responce_code = 300;
    protected $url;
    public function __construct($url)
    {
        $this->url = $url;
        parent::__construct();

    }
    public function Response()
    {
        echo $this->url;
        header("Location: ".$this->url);
    }
}