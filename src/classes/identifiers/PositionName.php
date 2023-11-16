<?php

namespace Darling\RoadyRoutes\classes\identifiers;

use \Darling\RoadyRoutes\interfaces\identifiers\PositionName as PositionNameInterface;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;

class PositionName implements PositionNameInterface
{

    public function __construct(private Name $name) {
        $filteredNameString = str_replace(
            ['_', '.'],
            '-',
            $name->__toString()
        );
        $offset = ($name->length() - mb_strlen('-position-name'));
        $filteredNameString = (
             ctype_alnum(substr($filteredNameString, -1))
             &&
             str_contains($filteredNameString, '-')
             ? $filteredNameString
             : substr($filteredNameString, 0, $offset) . '-position-name'
         );
        $filteredName = new NameInstance(
            new TextInstance(strtolower($filteredNameString))
        );
        $this->name = $filteredName;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return '';
    }

}

