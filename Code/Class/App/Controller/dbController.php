<?php

namespace App\Controller;

use App\View\Block\dbActive\dbConnect;
use Core\Model\View\Layout;

class dbController extends \Core\Controller\Controller
{
    public function dbAction()
    {
        (new Layout())->loadLayout('db_db')->render();
    }

    public function ConnectAction()
    {
        $dbC = new dbConnect();
        if(!empty($_POST['action']))
        {
            $action = $_POST['action'];
            switch ($action){
                case 'showTable' : $dbC->showTable();break;
            }
        }
    }


}