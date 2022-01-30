<?php

namespace Core\Model\Db\Sql\Part;

interface RenderablePart
{
    public function getCode(): int;
    public function __toString();
}