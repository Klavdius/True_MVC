<?php

namespace App\Controller;

use Core\Tools\MasterUrl;

class RandomizerController
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
        $this->arrDeck;

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
        for ($i = 0; $i < 13; $i++) {
            $i == 0 ? $this->arrFirst[$i] = $this->arrDeck[$i] :( (fmod($i, 2) == 0) ? $this->arrFirst[$i] = $this->arrDeck[$i] : $this->arrFirst[$i] = null);
        }
        $this->arrFirst = array_values(array_diff($this->arrFirst, [null]));

        for ($i = 0; $i < 15; $i++) {
             ($i == 1) ? $this->arrSecond[$i] = $this->arrDeck[$i] : ( (!fmod($i, 2) == 0) ? $this->arrSecond[$i] = $this->arrDeck[$i] : $this->arrSecond[$i] = null );
        }
        $this->arrSecond = array_values(array_diff($this->arrSecond, [null]));

        $this->arrDeck = array_values(array_diff(array_diff($this->arrDeck,$this->arrFirst),$this->arrSecond));
    }


}