<?php

namespace App\View\Block\dbActive;

use PDO;

class dbMvcConnect
{
    private $dsn = 'mysql:dbname=dbMvc;host=127.0.0.1';
    private $user = 'admin';
    private $password = '23';

    private $pdoMVC;

    public function __construct()
    {
        $this->pdoMVC = new PDO ($this->dsn , $this->user , $this->password);
        $tr = 0;
    }

    public function getForPDO()
    {
        return $this->pdoMVC;
    }
}