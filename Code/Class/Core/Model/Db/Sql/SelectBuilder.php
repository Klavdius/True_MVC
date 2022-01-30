<?php

namespace Core\Model\Db\Sql;

use Core\Model\Db\Sql\Part\Column;
use Core\Model\Db\Sql\Part\From;
use Core\Model\Db\Sql\Part\GroupBy;
use Core\Model\Db\Sql\Part\Join;
use Core\Model\Db\Sql\Part\Join\TableInfo;
use Core\Model\Db\Sql\Part\Limit;
use Core\Model\Db\Sql\Part\Offset;
use Core\Model\Db\Sql\Part\Where;
use Core\Model\Db\Sql\Search\ApplicableInFiltering;

class SelectBuilder extends \Core\Model\Db\SqlBuilder
{
    protected function initializePartsContainer(): void
    {
        $this->parts = new Parts();
    }

    public function column(string $name, $alias = null, $tableName = null): SelectBuilder
    {
        $column = new Column($name, $alias);
        $column->setTableName($tableName);
        $this->parts->addPart($column);
        return $this;
    }

    public function columns(Column ...$columns): SelectBuilder
    {
        foreach ($columns as $column) {
            $this->parts->addPart($column);
        }
        return $this;
    }

    public function from(string $name, string $alias = null): SelectBuilder
    {
        $this->parts->addPart(new From($name, $alias));
        return $this;
    }

    public function limit(int $limit): SelectBuilder
    {
        $this->parts->addPart(new Limit($limit), true);
        return $this;
    }

    public function offset(int $offset): SelectBuilder
    {
        $this->parts->addPart(new Offset($offset), true);
        return $this;
    }

    public function groupBy(string $columnName): SelectBuilder
    {
        $this->parts->addPart(new GroupBy($columnName));
        return $this;
    }

    public function where(ApplicableInFiltering $applicableInFiltering): SelectBuilder
    {
        $this->parts->addPart(new Where($applicableInFiltering), true);
        return $this;
    }

    public function having(ApplicableInFiltering $applicableInFiltering): SelectBuilder
    {
        $this->parts->addPart(new Where($applicableInFiltering), true);
        return $this;
    }

    public function joinInner(TableInfo $tableInfo, ApplicableInFiltering $condition, Column ...$columns): SelectBuilder
    {
        $this->join($tableInfo, $condition, Join::INNER, ...$columns);
        return $this;
    }

    public function joinLeft(TableInfo $tableInfo, ApplicableInFiltering $condition, Column ...$columns): SelectBuilder
    {
        $this->join($tableInfo, $condition, Join::LEFT, ...$columns);
        return $this;
    }

    public function joinRight(TableInfo $tableInfo, ApplicableInFiltering $condition, Column ...$columns): SelectBuilder
    {
        $this->join($tableInfo, $condition, Join::RIGHT, ...$columns);
        return $this;
    }

    public function joinFull(TableInfo $tableInfo, ApplicableInFiltering $condition, Column ...$columns): SelectBuilder
    {
        $this->join($tableInfo, $condition, Join::FULL, ...$columns);
        return $this;
    }

    private function join(TableInfo $tableInfo, ApplicableInFiltering $condition, string $joinType, Column ...$columns): void
    {
        $this->parts->addPart(new Join($tableInfo, $condition, $joinType, ...$columns));
    }

    private function renderCommaSeparatedList(array $list): string
    {
        $result = [];
        foreach ($list as $part) {
            $result[] = (string)$part;
        }
        return implode(', ', $result);
    }

    private function renderColumns(): string
    {
        $columns = $this->parts->getParts(Parts::COLUMN);

        /**
         * @var $join Join
         */
        foreach ($this->parts->getParts(Parts::JOIN) as $join) {
            if ($join->getColumns()) {
                foreach ($join->getColumns() as $column) {
                    $column->setTableName($join->getTableInfo()->getAlias() ?? $join->getTableInfo()->getName());
                    $columns[] = $column;
                }
            } else {
                $columns[] = ($join->getTableInfo()->getAlias() ?? $join->getTableInfo()->getName()) . '.*';
            }
        }

        if (!$columns) {
            /**
             * @var $from From
             */
            $from = $this->parts->getParts(Parts::FROM);
            foreach ($from as $item) {
                $columns[] = ($item->getAlias() ?? $item->getName()) . '.*';
            }
        }

        return $this->renderCommaSeparatedList($columns);
    }

    private function renderFrom(): string
    {
        return $this->renderCommaSeparatedList($this->parts->getParts(Parts::FROM));
    }

    private function renderJoins(): string
    {
        $joins = PHP_EOL;

        /**
         * @var $join Join
         */
        foreach ($this->parts->getParts(Parts::JOIN) as $join) {
            $joins .= $join->render() . PHP_EOL;
        }

        return $joins;
    }

    private function renderGroupBy(): string
    {
        return "GROUP BY {$this->renderCommaSeparatedList($this->parts->getParts(Parts::GROUP_BY))}";
    }

    private function renderLimit(): string
    {
        $limit = $this->parts->getParts(Parts::LIMIT)[0] ? $this->parts->getParts(Parts::LIMIT)[0]->render() : '';
        return "LIMIT {$limit}";
    }

    private function renderOffset(): string
    {
        $offset = $this->parts->getParts(Parts::OFFSET)[0] ? $this->parts->getParts(Parts::OFFSET)[0]->render() : '';
        return "OFFSET {$offset}";
    }

    private function renderWhere(): string
    {
        return "WHERE {$this->parts->getParts(Parts::WHERE)[0]->render()}";
    }

    private function renderHaving(): string
    {
        return "HAVING {$this->parts->getParts(Parts::HAVING)[0]->render()}";
    }

    public function assemble(): string
    {
        $sql = "SELECT {$this->renderColumns()} FROM {$this->renderFrom()}";

        if ($this->parts->getParts(Parts::JOIN)) {
            $sql .= " {$this->renderJoins()}";
        }

        if ($this->parts->getParts(Parts::WHERE)) {
            $sql .= " {$this->renderWhere()}";
        }

        if ($this->parts->getParts(Parts::GROUP_BY)) {
            $sql .= " {$this->renderGroupBy()}";
        }

        if ($this->parts->getParts(Parts::LIMIT)) {
            $sql .= " {$this->renderLimit()}";
        }

        if ($this->parts->getParts(Parts::OFFSET)) {
            $sql .= " {$this->renderOffset()}";
        }

        if ($this->parts->getParts(Parts::HAVING)) {
            $sql .= " {$this->renderHaving()}";
        }

        return $sql;
    }
}
