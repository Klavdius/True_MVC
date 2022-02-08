<?php

namespace App\View\Block\dbActive;

use App\View\Block\dbActive\dbMvcConnect;

class dbConnect extends \Core\Block\Template
{
    public $myConnect;
    public $myPdo;

    public function __construct()
    {
        $this->myConnect = new dbMvcConnect();
        $this->myPdo = $this->myConnect->getForPDO();
    }

    public function showTable()
    {
        $command = 'SHOW TABLES  FROM `dbmvc`';
        $res =  $this->myPdo->query($command)->fetchAll($this->myPdo::FETCH_COLUMN);
        foreach ($res as $value)
        {
            $res2 = (!empty($res2))? ($res2 = $res2 . ", " . $value): ($res2= $value) ;
        }
        echo $res2;
    }
}