<?php

namespace Core\Model\Db\Sql\Part;

use Core\Model\Db\Sql\Parts;
use Core\Model\Db\Sql\Search\ApplicableInFiltering;

class Where implements RenderablePart
{
    private ApplicableInFiltering $filter;

    /**
     * @param ApplicableInFiltering $filter
     */
    public function __construct(ApplicableInFiltering $filter)
    {
        $this->filter = $filter;
    }

    public function render(): string
    {
        return "{$this->filter->render()}";
    }

    public function getCode(): int
    {
        return Parts::WHERE;
    }

    public function __toString()
    {
        return $this->render();
    }
}
