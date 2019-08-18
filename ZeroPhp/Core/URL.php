<?php
namespace ZeroPhp\Core;
class URL{
    private $scheme="", $port = null, $host="", $path="", $query="", $fragment="", $user="", $pass="";



    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->scheme;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol($protocol)
    {
        $this->scheme = $protocol;
    }

    /**
     * @param string $uri
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    public function __construct($url)
    {
        $this->setUrl($url);
    }

    public function setUrl($url){
        $url_parsed  = parse_url($url);
        print_r($url_parsed);
        foreach ($url_parsed as $key => $value){
            if($value !=null){
                $this->$key = $value;
            }
        }
    }

    public function getUrl(){
        $user_part = "";
        $port_part = "";
        $query_part = "";
        $fragmet_part = "";

        if($this->user != null){
            $user_part = $this->user;
            if($this->pass != null){
                $user_part .= ":".$this->pass;
            }
            $user_part .= "@";
        }
        if($this->port != null){
            $port_part = ":".$this->port;
        }
        if($this->query != null){
            $query_part = "?".$this->query;
        }
        if($this->fragment != null){
            $fragmet_part = "#".$this->fragment;
        }
        return $this->scheme."://".$user_part.$this->host.$port_part.$this->path.$query_part.$fragmet_part;
    }

    public function __toString()
    {
        return $this->getUrl();
    }

}