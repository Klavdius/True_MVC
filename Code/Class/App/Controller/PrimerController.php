<?php

namespace App\Controller;

class PrimerController extends \Core\Model\Request
{

    public function urlAction()
    {
        var_dump('primer Controller');
    }

    public function defaultAction(){
        var_dump('default PrimerController');
    }
}