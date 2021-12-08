<?php

namespace App\View\Block\Content;

use App\Controller\TableController;
use Core\Factory;

class Top extends \Core\Block\Template
{

    private $arrFirst;
    private $arrDeck;
    private $arrSecond;
    private $factory;

    public function __construct()
    {
        $this->factory = new Factory();
        $this->arrSecond = $this->factory->createSingleton(RandomizerController::arrSecond);

    }

    public function hello()
    {
       foreach ($this->arrFirst as $name)
       {
           echo $name;
           echo '<br>';
       }
    }


    public function getArrFirst($number = null)
    {
        return is_null($number) ? $this->arrFirst : ( (array_key_exists($number, $this->arrFirst))  ? $this->arrFirst[$number] : null) ;
    }

    public function getArrSecond($number = null)
    {
        return is_null($number) ? $this->arrSecond : ( (array_key_exists($number, $this->arrSecond))  ? $this->arrSecond[$number] : null) ;
    }
}

