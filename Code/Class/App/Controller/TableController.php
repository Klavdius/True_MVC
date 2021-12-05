<?php

namespace App\Controller;

use App\Helper\Labels;
use Core\Factory;
use App\Controller\RandomizerController;
use App\Controller\ViewController;

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

        //$this->tableView = new \App\Controller\ViewController();
    }

    public function tableAction()
    {
        $this->varPrint('ara ara ara второй способ');

        $this->varPrint($this->random->getArrFirst());
        $this->varPrint($this->random->getArrSecond());
        $this->varPrint($this->random->getArrDeck());


     }

    private function cardInHead()
    {


    }

}