<?php

namespace Core\Model;

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
        $url = trim(str_replace('/index.php','', $this->getRequestUri()),"/ ");
        $url = explode('?',$url);
        $arrUrl = explode('/', $url[0]);

        while(count($arrUrl) > 2)
        {
            $i = array_shift($arrUrl);
        }
        $this->controllerName = (!empty($arrUrl[0])) ? array_shift($arrUrl) : 'Default';
        $this->actionName = (!empty($arrUrl[0])) ? array_shift($arrUrl) : 'default';

        while (!empty($arrUrl))
        {
            $this->get[array_shift($arrUrl)] = array_shift($arrUrl);
        }


    }

    public function getRequestUri()
    {
        return $this->arrServer['REQUEST_URI'];
    }

    /**
     * @param null $name
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
     * @param null $name
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