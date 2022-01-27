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
        if(!empty($_POST['action'])) {
            $action = $_POST['action'];

            if(!empty($_POST['tableName'])) {
                $tableName = $_POST['tableName'];
                $arrInput = $_POST['arrInput'];
                $arrSelect = $_POST['arrSelect'];
            }
            switch($action) {
                case 'newCollum' : $value = $_POST['value'];$dbC->newCollum($value);break;
                case 'inputForSelect' : $dbC->inputForSelect();break;
                case 'notEmptyTable' : $value = $_POST['value'];$dbC->notEmptyTable($value);break;
                case 'creatNewTable' : $dbC->creatNewTable($tableName,$arrInput,$arrSelect);break;
            }
        }

    }



}