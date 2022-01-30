<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

class GroupBy extends AbstractNamed implements RenderablePart
{
    public function getCode(): int
    {
        return Parts::GROUP_BY;
    }
}
