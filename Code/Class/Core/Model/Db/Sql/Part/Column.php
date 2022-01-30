<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

class Column extends AbstractAliased implements RenderablePart
{
    public function __construct(string $name, string $alias = null, string $tableName = null)
    {
        parent::__construct($name, $alias);
        $this->setTableName($tableName);
    }

    public function getCode(): int
    {
        return Parts::COLUMN;
    }

    public function setTableName(string $tableName)
    {
        $this->setNamePrefix("{$tableName}.");
    }
}
