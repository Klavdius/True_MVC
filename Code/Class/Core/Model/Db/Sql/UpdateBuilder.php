<?php

namespace Core\Model\Db\Sql;

class UpdateBuilder extends \Core\Model\Db\SqlBuilder
{
    function getQueryPattern(): string
    {
        return 'UPDATE %FROM% SET %s';
    }

}
