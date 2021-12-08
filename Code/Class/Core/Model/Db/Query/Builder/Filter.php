<?php

namespace Core\Model\Db\Query\Builder;

class Filter
{
    const EQ = 'eq';
    const NEQ = 'neq';
    const GT = 'gt';
    const GTEQ = 'gteq';
    const LT = 'lt';
    const LTEQ = 'lteq';
    const IN = 'in';
    const NIN = 'nin';
    const BETWEEN = 'between';

    private $pdo = null;

    private $filter = null;
    private $value = null;

    public function __construct(\PDO $pdo, string $filter = null, string $value = null)
    {
        $this->pdo = $pdo;
        $this->filter = $filter;
        $this->value = $value;
    }

    public function getFilter()
    {
        return $this->filter;
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function render(): string
    {
        $sql = '';

        switch ($this->filter) {
            case self::EQ:
                $sql = " = {$this->pdo->quote($this->value)}";
                break;
            case self::NEQ:
                $sql = " != {$this->pdo->quote($this->value)}";
                break;
            case self::GT:
                $sql = " > {$this->pdo->quote($this->value)}";
                break;
            case self::GTEQ:
                $sql = " >= {$this->pdo->quote($this->value)}";
                break;
            case self::LT:
                $sql = " < {$this->pdo->quote($this->value)}";
                break;
            case self::LTEQ:
                $sql = " <= {$this->pdo->quote($this->value)}";
                break;
            case self::IN:
                $value = implode(', ', $this->pdo->quote($this->value));
                $sql = " IN ({$value})";
                break;
            case self::NIN:
                $value = implode(', ', $this->pdo->quote($this->value));
                $sql = " NOT IN ({$value})";
                break;
            case self::BETWEEN:
                $sql = " BETWEEN {$this->pdo->quote($this->value[0])} AND {$this->pdo->quote($this->value[1])}";
                break;
        }

        return $sql;
    }

    public function __toString()
    {
        return $this->render();
    }
}
