<?php

namespace Core\Model\Db\Sql\Search;

class FilterGroup implements ApplicableInFiltering
{
    private array $filters;

    public function __construct(ApplicableInFiltering ...$filters)
    {
        $this->filters = $filters;
    }

    public function render(): string
    {
        $renderedSql = '';
        for ($i = 0; $i < count($this->filters); ++$i) {
            if ($i > 0) {
                $renderedSql .= " {$this->filters[$i]->getGlue()} ";
            }
            $renderedSql .= $this->filters[$i]->render();
        }
        return "({$renderedSql})";
    }

    public function getGlue(): string
    {
        return self::GLUE_OR;
    }
}
