<?php

namespace Core\Model\Db\Sql\Search;

interface ApplicableInFiltering
{
    const GLUE_AND = 'AND';
    const GLUE_OR = 'OR';

    public function getGlue(): string;
    public function render(): string;
}
