<?php

namespace App\Controller;

use App\Controller\RandomizerController;
use Core\Tools\MasterUrl;

class TableController
{

    private $random;
    private $print;


    public function __construct()
    {
        $this->random = new \App\Controller\RandomizerController();
        $this->print = new MasterUrl();
    }

    public function tableAction()
    {

       $this->print->varPrint($this->random->getArrFirst());
       $this->print->varPrint($this->random->getArrSecond());
       $this->print->varPrint($this->random->getArrDeck());


     }

    private function cardInHead()
    {


    }

}