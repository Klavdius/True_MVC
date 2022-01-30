<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

abstract class AbstractAliased extends AbstractNamed
{
    protected string $number;
    protected ?string $alias;

    public function __construct(string $name, string $alias = null)
    {
        parent::__construct($name);
        $this->alias = $alias;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function render(): string
    {
        return $this->alias ? "{$this->getName()} AS {$this->getAlias()}" : parent::render();
    }
}