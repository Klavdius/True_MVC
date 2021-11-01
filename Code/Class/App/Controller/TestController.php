<?php

namespace App\Controller;

use \Core\Model\Request;

class TestController extends \Core\Controller\Controller
{

    public function testAction()
    {
        var_dump($this->getRequest()->getGet());
    }
}