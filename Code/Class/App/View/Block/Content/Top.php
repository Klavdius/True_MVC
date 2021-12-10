<?php

namespace App\View\Block\Content;

use App\Controller\TableController;
use App\View\Block\Randomaizer;
use Core\Factory;

class Top extends \Core\Block\Template
{

    private $arrFirst;
    private $arrDeck;
    private $arrSecond;

    private $factory;
    private $random;

    public function __construct()
    {
        $this->random = new Randomaizer();
        $this->arrSecond = $this->random::getArrSecond();
        $this->arrFirst = $this->random::getArrFirst();
    }

    public function hello()
    {
       foreach ($this->arrFirst as $name)
       {
           echo $name;
           echo '<br>';
       }

        foreach ($this->arrSecond as $name)
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

