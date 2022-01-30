<?php

namespace Core\Model\Db\Sql\Part;

use Cassandra\Table;
use Core\Model\Db\Sql\Part\Join\TableInfo;
use Core\Model\Db\Sql\Parts;
use Core\Model\Db\Sql\Search\ApplicableInFiltering;

class Join implements RenderablePart
{
    const INNER = 'INNER';
    const LEFT = 'LEFT';
    const RIGHT = 'RIGHT';
    const FULL = 'FULL';

    private TableInfo $tableInfo;
    private ApplicableInFiltering $condition;
    private array $columns;
    private string $joinType;

    /**
     * @param string $tableName
     * @param null|string $tableAlias
     * @param ApplicableInFiltering $condition
     * @param array|null $columns
     */
    public function __construct(TableInfo $tableInfo, ApplicableInFiltering $condition, string $joinType, Column ...$columns)
    {
        $this->tableInfo = $tableInfo;
        $this->condition = $condition;
        $this->joinType = $joinType;
        $this->columns = $columns;
    }

    public function render(): string
    {
        return <<<SQL
{$this->joinType} JOIN {$this->tableInfo->render()} ON
{$this->condition->render()}
SQL;
    }

    public function getCode(): int
    {
        return Parts::JOIN;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getTableInfo(): TableInfo
    {
        return $this->tableInfo;
    }

    public function __toString()
    {
        return $this->render();
    }
}
