<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

class From extends AbstractAliased implements RenderablePart
{
    public function getCode(): int
    {
        return Parts::FROM;
    }
}
