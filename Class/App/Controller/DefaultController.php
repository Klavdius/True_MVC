<?php

namespace App\Controller;

use Core\Model\View\Layout;

class DefaultController extends \Core\Controller\Controller
{
    public function defaultAction()
    {
        (new Layout())->loadLayout('default_default')->render();
    }
}