<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

abstract class AbstractNumeric
{
    protected int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function render(): string
    {
        return (string)$this->getNumber();
    }

    public function __toString()
    {
        return $this->render();
    }
}