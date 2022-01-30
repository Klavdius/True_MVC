<?php

namespace Core\Model\Db;

class Connection
{
    private \PDO $adapter;

    public function getAdapter(): \PDO
    {
        if (!isset($this->adapter)) {
            $this->adapter = new \PDO('mysql:host=localhost;dbname=sample_book_database', 'root', 'root');
        }
        return $this->adapter;
    }
}
