<?php

namespace App\View\Block\Content;

use App\Controller\RandomizerController;

class Bottom extends \Core\Block\Template
{
    public function hello()
    {
        foreach ( (new Top())->getArrSecond() as $name)
        {
            echo $name;
            echo '<br>';
        }
    }

}