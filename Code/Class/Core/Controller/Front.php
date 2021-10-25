<?php

namespace Core\Controller;

use Core\Model\Request;

class Front
{
    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function dispatch()
    {


        $controllerName = '\\App\\Controller\\' . $this->request->getControllerName() . 'Controller';
        $actionName = $this->request->getActionName() . 'Action';
        var_dump($controllerName);
        if (!class_exists($controllerName)) {
            $controllerName = '\\App\\Controller\\ErrorController';
            $actionName = 'e404';
        }
        $controller = new $controllerName;
        $controller->$actionName();
    }

}