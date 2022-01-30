<?php

namespace Core\Model\Db\Sql\Search\Filter;

class Renderer
{
    public static function render(string $field, string $condition, $value = null): string
    {
        $validatorName = 'render' . ucfirst(strtolower($condition));
        return self::{$validatorName}($field, $value);
    }

    private static function renderEq(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} = {$adapter->quote($value)})";
    }

    private static function renderNeq(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} != {$adapter->quote($value)})";
    }

    private static function renderIsnull(string $field, bool $value = null): string
    {
        return "({$field} IS NULL)";
    }

    private static function renderNotnull(string $field, bool $value): string
    {
        return "({$field} IS NOT NULL)";
    }

    private static function renderGt(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} > {$adapter->quote($value)})";
    }

    private static function renderGteq(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} >= {$adapter->quote($value)})";
    }

    private static function renderLt(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} < {$adapter->quote($value)})";
    }

    private static function renderLteq(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} <= {$adapter->quote($value)})";
    }

    private static function renderLike(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} LIKE {$adapter->quote($value)})";
    }

    private static function renderNlike(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} NOT LIKE {$adapter->quote($value)})";
    }

    private static function renderBetween(string $field, array $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} BETWEEN {$adapter->quote($value[0])} AND {$adapter->quote($value[1])})";
    }

    private static function renderFinset(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "(FIND_IN_SET({$adapter->quote($value)}, {$field}))";
    }

    private static function renderRegexp(string $field, string $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        return "({$field} REGEXP {$adapter->quote($value)})";
    }

    private static function renderIn(string $field, array $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        $escapedValues = [];
        foreach ($value as $v) {
            $escapedValues[] = $adapter->quote($v);
        }
        $escapedValues = implode(', ', $escapedValues);
        return "({$field} IN ({$escapedValues}))";
    }

    private static function renderNin(string $field, array $value): string
    {
        $adapter = \App::getDbConnection()->getAdapter();
        $escapedValues = [];
        foreach ($value as $v) {
            $escapedValues[] = $adapter->quote($v);
        }
        $escapedValues = implode(', ', $escapedValues);
        return "({$field} NOT IN ({$escapedValues}))";
    }
}
