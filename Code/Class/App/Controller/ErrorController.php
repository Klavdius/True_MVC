<?php

namespace App\Controller;

class ErrorController extends \Core\Model\Request
{

    public function e404()
    {
        var_dump('Error page');

    }

    public function errorMethod()
    {
        var_dump('Method not exists');
    }

}