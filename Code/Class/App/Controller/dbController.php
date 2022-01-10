<?php

namespace App\Controller;

use Core\Model\View\Layout;

class dbController extends \Core\Controller\Controller
{
    public function dbAction()
    {
        (new Layout())->loadLayout('db_db')->render();
    }




}