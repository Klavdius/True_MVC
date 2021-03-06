<?php

namespace App\Controller;

use App\Helper\Labels;
use Core\Factory;
use App\Controller\RandomizerController;
use Core\Model\View\Layout;

class TableController extends \Core\Controller\Controller
{

    private $random;
    private $print;
    private $tableView;
    private $arrFirst;
    private $arrSecond;



    public function __construct()
    {
        $this->random = new \App\Controller\RandomizerController();

        $this->setArrFirst($this->random->getArrFirst());
        $this->setArrSecond();

        //$this->tableView = new \App\Controller\ViewController();
    }

    public function tableAction()
    {
        (new Layout())->loadLayout('table_table')->render();
    }


   public function setArrFirst($arr)
   {
        $this->arrFirst = $arr;
   }

    public function setArrSecond()
    {
        $this->arrSecond = $this->random->getArrSecond();
    }

    /**
     * @return mixed
     */
    public function getArrFirst()
    {
        return $this->arrFirst;
    }

    /**
     * @return mixed
     */
    public function getArrSecond()
    {
        return $this->arrSecond;
    }


}