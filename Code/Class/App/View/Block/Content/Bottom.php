<?php

namespace App\View\Block\Content;

use App\View\Block\Randomaizer;

class Bottom extends \Core\Block\Template
{
    private $arrFirst;
    private $random;

    public function __construct()
    {
        $this->random = new Randomaizer();
//        $this->arrSecond = $this->random::getArrSecond();
        $this->arrFirst = $this->random::getArrFirst();
    }

    public function hello()
    {
        foreach ($this->arrFirst as $name)
        {
            echo $name;
            echo '<br>';
        }
    }

}