<?php

namespace Core\Model\Db\Sql;

use Core\Model\Db\Sql\Part\RenderablePart;

class Parts
{
    const COLUMN = 0;
    const FROM = 1;
    const LIMIT = 2;
    const OFFSET = 3;
    const GROUP_BY = 4;
    const WHERE = 5;
    const HAVING = 6;
    const JOIN = 7;

    private array $container;

    public function __construct()
    {
        $this->container = [];
    }

    public function addPart(RenderablePart $part, bool $override = false): void
    {
        if (!isset($this->container[$part->getCode()])) {
            $this->container[$part->getCode()] = [];
        }
        if ($override) {
            $this->container[$part->getCode()][0] = $part;
        } else {
            $this->container[$part->getCode()][] = $part;
        }
    }

    public function getParts(int $code = null): array
    {
        if (is_null($code)) {
            return $this->container;
        }

        return $this->container[$code] ?? [];
    }
}
