<?php

namespace Core\Model\Db;

use Core\Model\Db\Sql\Parts;

abstract class SqlBuilder
{
    protected Parts $parts;

    abstract protected function initializePartsContainer(): void;
    abstract public function assemble(): string;

    public function __construct()
    {
        $this->initializePartsContainer();
    }

    public function __toString(): string
    {
        return $this->assemble();
    }
}
