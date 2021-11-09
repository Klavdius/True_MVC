<?php

namespace Core\Controller;

abstract class Controller
{
    private $request;

    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest($newRequest)
    {
        $this->request = $newRequest;
    }

    public function varPrint($name)
    {
        echo '<pre>';
        var_dump($name);
        echo '</pre>';
    }


}