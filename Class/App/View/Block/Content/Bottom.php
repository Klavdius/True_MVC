<?php

namespace App\View\Block\Content;

use App\Controller\RandomizerController;

class Bottom extends \Core\Block\Template
{
    private $firstDec;

    public function hello()
    {
        return 'Hello from Bottom';
    }

}