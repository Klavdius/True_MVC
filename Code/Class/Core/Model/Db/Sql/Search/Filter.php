<?php

namespace Core\Model\Db\Sql\Search;

use Core\Model\Db\Sql\Search\Filter\Renderer;
use Core\Model\Db\Sql\Search\Filter\Validator;

class Filter implements ApplicableInFiltering
{
    private string $field;
    private string $condition;
    private $value;

    public function __construct(string $field, string $condition, $value = null)
    {
        $this->field = $field;
        $this->condition = $condition;
        $this->value = $value;
        Validator::validate($condition, $value);
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getGlue(): string
    {
        return self::GLUE_AND;
    }

    public function render(): string
    {
        return Renderer::render($this->getField(), $this->getCondition(), $this->getValue());
    }
}
