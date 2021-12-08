<?php

namespace App\View\Block\Content;

use App\Controller\TableController;

class Top extends \Core\Block\Template
{

    private $arrFirst;
    private $arrDeck;
    private $arrSecond;

    public function hello()
    {
       foreach ($this->arrFirst as $name)
       {
           echo $name;
           echo '<br>';
       }
    }

    public function buildDeck()
    {
        for ($i = 0; $i < 60; $i++) {
            $this->arrDeck[$i] = $i;
        }
        shuffle($this->arrDeck);
    }

    public function startPull()
    {
        for ($i = 0; $i < 7; $i++) {
            $this->arrFirst[$i] = array_shift($this->arrDeck);
            $this->arrSecond[$i] = array_shift($this->arrDeck);
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

