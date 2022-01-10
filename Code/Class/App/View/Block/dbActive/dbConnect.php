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

    public function getPDO()
    {
        return $this->myPdo;
    }


}
