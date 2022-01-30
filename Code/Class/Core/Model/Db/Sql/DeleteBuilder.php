<?php

namespace Core\Model\Db\Sql;

class DeleteBuilder extends \Core\Model\Db\SqlBuilder
{
    function getQueryPattern(): string
    {
        return 'DELETE ';
    }
}
