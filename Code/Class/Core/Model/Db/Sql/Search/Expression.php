<?php

namespace Core\Model\Db\Sql\Search;

class Expression implements ApplicableInFiltering
{
    private string $expression;
    private string $glue;

    public function __construct(string $expression, string $glue = '')
    {
        $this->expression = $expression;
        $this->glue = $glue;
    }

    public function getGlue(): string
    {
        return $this->glue;
    }

    public function render(): string
    {
        return $this->expression;
    }
}
