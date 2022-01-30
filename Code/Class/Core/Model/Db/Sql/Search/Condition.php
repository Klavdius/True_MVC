<?php

namespace Core\Model\Db\Sql\Search;

interface Condition
{
    const EQ = 'eq';
    const NEQ = 'neq';
    const IS_NULL = 'isnull';
    const NOT_NULL = 'notnull';
    const GT = 'gt';
    const GTEQ = 'gteq';
    const LT = 'lt';
    const LTEQ = 'lteq';
    const LIKE = 'like';
    const NOT_LIKE = 'nlike';
    const BETWEEN = 'between';
    const FINSET = 'finset';
    const REGEXP = 'regexp';
    const IN = 'in';
    const NOT_IN = 'nin';
}
