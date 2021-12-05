<?php

namespace Core\Model\Db\Query\Select;

use Core\Model\Db\Query\Builder\Filter;

class Builder
{
    const PART_COLUMNS = 'columns';
    const PART_FROM = 'from';
    const PART_WHERE = 'where';
    const PART_JOIN = 'join';
    /**
     * [
     *  'type' => sdfdgdsfg,  INNER JOIN table1 as a on table1.f1 = main.f1
     *  'table' => sdfgdsfgh
     *  'on' => lsdrfjhbk
     * [
     *  'type' => 'inner',
     *  'table' => ['a' => 'table1'],
     *  'on' => 'table1.f1 = main.f1'
     * ]
     */
    const PART_LIMIT = 'limit';
    const PART_OFFSET = 'offset';
    const PART_HAVING = 'having';
    const PART_GROUP = 'group';

    private $parts = [];

    public function __construct()
    {
        $this->parts = [
            self::PART_COLUMNS => [],
            self::PART_FROM => [],
            self::PART_WHERE => [],
            self::PART_JOIN => [],
            self::PART_LIMIT => [],
            self::PART_OFFSET => [],
            self::PART_HAVING => [],
            self::PART_GROUP => [],
        ];
    }

    public function from(string $tableName, string $alias = null): Builder
    {
        if (!is_null($alias)) {
            $this->parts[self::PART_FROM] = [$alias => $tableName];
        } else {
            $this->parts[self::PART_FROM] = [$tableName];
        }

        return $this;
    }

    public function where(string $what, Filter $filter): Builder
    {
        $this->parts[self::PART_WHERE][] = [$what, $filter];
        return $this;
    }

    public function column(string $name, string $alias = null): Builder
    {
        if (!is_null($alias)) {
            $this->parts[self::PART_COLUMNS][$alias] = $name;
        } else {
            $this->parts[self::PART_COLUMNS][] = $name;
        }

        return $this;
    }

    public function build(): string
    {
        $sql = 'SELECT ';

        if ($this->parts[self::PART_COLUMNS]) {
            $column = [];
            foreach ($this->parts[self::PART_COLUMNS] as $alias => $value) {
                if (is_int($alias)) {
                    $column[] = "{$value}";
                } else {
                    $column[] = "{$value} AS {$alias}";
                }
            }
            $sql .= implode(', ', $column) . ' ';
        } else {
            $sql .= '* ';
        }

        $from = [];
        foreach ($this->parts[self::PART_FROM] as $alias => $value) {
            if (is_int($alias)) {
                $from[] = "{$value}";
            } else {
                $from[] = "{$value} AS {$alias}";
            }
        }

        $sql .= ' FROM ' . implode(', ', $from) . ' ';

        if ($this->parts[self::PART_WHERE]) {
            $where = [];

            foreach ($this->parts[self::PART_WHERE] as $part) {
                $where[] = "({$part[0]} {$part[1]})";
            }

            $sql .= 'WHERE ' . implode(' AND ', $where);
        }

        return $sql;
    }
}
