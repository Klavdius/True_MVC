<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

class Limit extends AbstractNumeric implements RenderablePart
{
    public function getCode(): int
    {
        return Parts::LIMIT;
    }
}
