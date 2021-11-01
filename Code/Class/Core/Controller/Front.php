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

        if (!class_exists($controllerName)) {
            $controllerName = '\\App\\Controller\\ErrorController';
            $actionName = 'e404';
        }
        if (!method_exists($controllerName,$actionName)){
            $controllerName = '\\App\\Controller\\ErrorController';
            $actionName = 'errorMethod';
        }
        $controller = new $controllerName;
        $controller->setRequest($this->getRequest());
        $controller->$actionName();
    }

}