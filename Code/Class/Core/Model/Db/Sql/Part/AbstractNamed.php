<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

abstract class AbstractNamed
{
    protected ?string $namePrefix;
    protected string $name;

    public function __construct(string $name, string $namePrefix = null)
    {
        $this->name = $name;
        $this->namePrefix = $namePrefix;
    }

    public function getName(): string
    {
        return $this->getNamePrefix() ? $this->getNamePrefix() . $this->name : $this->name;
    }

    public function getNamePrefix(): ?string
    {
        return $this->namePrefix;
    }

    public function setNamePrefix(?string $namePrefix): void
    {
        $this->namePrefix = $namePrefix;
    }

    public function render(): string
    {
        return $this->getName();
    }

    public function __toString()
    {
        return $this->render();
    }
}