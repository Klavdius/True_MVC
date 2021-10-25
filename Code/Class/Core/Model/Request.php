<?php

namespace Core\Model;

use Core\Tools\MasterUrl;

class Request
{
    private $controllerName;
    private $actionName;
    private $arrServer;
    private $post;
    private $get;

    public function __construct()
    {
        $this->arrServer = $_SERVER;
        $this->post = $_POST;
        $this->get = $_GET;
        $this->parseUri();
    }

    private function parseUri()
    {
        $url = trim(str_replace('/index.php','', $this->getRequestUri()));
        $arrUrl = array_filter(MasterUrl::UrlSplit($url));

        switch (count($arrUrl)) {
            case 2:
                $this->controllerName = $arrUrl[0];
                $this->actionName = $arrUrl[1];
                break;
            case 1:
                $this->controllerName = $arrUrl[0];
                $this->actionName = 'default';
                break;
            default:
                $this->controllerName = 'Default';
                $this->actionName = 'default';
                break;
        }

    }

    public function getRequestUri()
    {
        return $this->arrServer['REQUEST_URI'];
    }

    /**
     * @return array
     */
    public function getGet($name = null)
    {
        return is_null($name) ? $this->get : (array_key_exists($name,$this->get) ? $this->get[$name] : null);
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return array
     */
    public function getArrServer($name = null)
    {
        return is_null($name) ? $this->arrServer : (array_key_exists($name,$this->arrServer) ? $this->arrServer[$name] : null);
    }

    /**
     * @return array
     */
    public function getPost($name = null)
    {
        return is_null($name) ? $this->post : (array_key_exists($name,$this->post) ? $this->post[$name] : null);
    }



}