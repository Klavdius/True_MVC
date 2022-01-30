<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;

class Having extends Where implements RenderablePart
{
    public function getCode(): int
    {
        return Parts::HAVING;
    }
}
