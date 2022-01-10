<?php

namespace App\View\Block\dbActive;

class dbMvcConnect
{
    public $dsn = 'mysql:dbname=dbMVC;host=127.0.0.1';
    public $user = 'root';
    public $password = null;

    public $pdoMVC;

    public function __construct()
    {
        $this->pdoMVC = $this->dsn . ','. $this->user .','. $this->password;
    }

    public function getForPDO()
    {
        return $this->pdoMVC;
    }
}