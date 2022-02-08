<?php

namespace App\Controller;

use App\View\Block\dbActive\dbCreateConnect;
use Core\Model\View\Layout;


class dbCreateController extends \Core\Controller\Controller
{
    public function dbCreateAction()
    {
        (new Layout())->loadLayout('dbCreate_dbCreate')->render();
    }

    public function ConnectAction()
    {
        $dbC = new dbCreateConnect();
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