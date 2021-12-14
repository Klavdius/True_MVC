<?php

namespace App\View\Block\Content;

use App\View\Block\Randomaizer;

class Middle extends \Core\Block\Template
{
    private $battlefild;
    private $random;
    private $arrFirst;
    private $arrSecond;

    public function __construct()
    {
        $this->random = new Randomaizer();
        $this->battlefild = Randomaizer::getBattelfild();
        $this->arrFirst = $this->random::getArrFirst();
        $this->arrSecond = $this->random::getArrSecond();
    }

    public function getNumberBattlefild($number)
    {
        echo "{$this->battlefild[$number]}";
    }

    public function hello()
    {
        foreach ($this->arrSecond as $name)
        {
            echo $name;
            echo '<br>';
        }
    }

    public function getCardFromDeck($number)
    {
        echo "{$this->arrFirst[$number]}";
    }
    public function getCardFromSecDeck($number)
    {
        echo "{$this->arrSecond[$number]}";
    }
}