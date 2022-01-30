<?php

namespace Core\Model\Db\Sql\Search\Filter;

use \Core\Model\Db\Sql\Search\Condition;

class Validator
{
    public static function validate(string $condition, $value)
    {
        $validatorName = 'validate' . ucfirst(strtolower($condition));
        self::{$validatorName}($value);
    }

    public static function validateEq(string $value): void
    {
    }

    public static function validateNeq(string $value): void
    {
    }

    public static function validateIsnull(bool $value): void
    {
    }

    public static function validateNotnull(bool $value): void
    {
    }

    public static function validateGt(string $value): void
    {
    }

    public static function validateGteq(string $value): void
    {
    }

    public static function validateLt(string $value): void
    {
    }

    public static function validateLteq(string $value): void
    {
    }

    public static function validateLike(string $value): void
    {
    }

    public static function validateNlike(string $value): void
    {
    }

    public static function validateBetween(array $value): void
    {
        if (count($value) < 2) {
            throw new \ValidationException('Between require array with 2 values');
        }
    }

    public static function validateFinset(string $value): void
    {
    }

    public static function validateRegexp(string $value): void
    {
    }

    public static function validateIn(array $value): void
    {
        if (!$value) {
            throw new \ValidationException('Empty array cannot be used as IN operand');
        }
    }

    public static function validateNin(array $value): void
    {
        if (!$value) {
            throw new \ValidationException('Empty array cannot be used as NOT IN operand');
        }
    }
}
