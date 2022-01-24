<?php

namespace App\View\Block\dbActive;

class dbMvcConnect
{
    private $dsn = 'mysql:dbname=dbMvc;host=127.0.0.1';
    private $user = 'admin';
    private $password = 23;

    private $pdoMVC;

    public function __construct()
    {
        $this->pdoMVC = $this->dsn . ','. $this->user .','. $this->password;
    }

    public function getForPDO()
    {
        return $this->pdoMVC;
    }
}