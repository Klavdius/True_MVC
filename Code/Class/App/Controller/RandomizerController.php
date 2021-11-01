<?php

namespace App\Controller;

use Core\Tools\MasterUrl;

class RandomizerController extends \Core\Model\Request
{
    private $arrDeck;
    private $countFirst;
    private $countSecond;
    private $CardInFirst;
    private $CardInSecond;
    private $arrFirst;
    private $arrSecond;
    private $printVar;

    public function __construct()
    {
        $this->printVar = new MasterUrl();
        $this->buildDeck();
        $this->startPull();
    }

    public function numberAction()
    {
        var_dump(rand(0, 59));
    }

    private function buildDeck()
    {
        for ($i = 0; $i < 60; $i++) {
            $this->arrDeck[$i] = $i;
            shuffle($this->arrDeck);
        }
    }

    public function getArrDeck()
    {
        return $this->arrDeck;
    }

    public function getArrFirst($number = null)
    {
        return is_null($number) ? $this->arrFirst : ( (array_key_exists($number, $this->arrFirst))  ? $this->arrFirst[$number] : null) ;
    }

    public function getArrSecond($number = null)
    {
        return is_null($number) ? $this->arrSecond : ( (array_key_exists($number,$this->arrSecond)) ? $this->arrSecond[$number] : null);
    }

    public function startPull()
    {
        for ($i = 0; $i < 7; $i++) {
            $this->arrFirst[$i] = array_shift($this->arrDeck);
            $this->arrSecond[$i] = array_shift($this->arrDeck);
        }
    }


}