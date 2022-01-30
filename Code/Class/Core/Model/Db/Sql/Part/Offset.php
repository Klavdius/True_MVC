<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

class Offset extends AbstractNumeric implements RenderablePart
{
    public function getCode(): int
    {
        return Parts::OFFSET;
    }
}
