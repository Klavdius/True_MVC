<?php

namespace Core\Model\Db\Sql;

class InsertBuilder extends \Core\Model\Db\SqlBuilder
{
    function getQueryPattern(): string
    {
        return 'INSERT %s INTO ';
    }
}
