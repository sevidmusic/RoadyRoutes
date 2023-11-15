<?php

namespace Darling\RoadyRoutes\classes\identifiers;

use \Darling\RoadyRoutes\interfaces\identifiers\PositionName as PositionNameInterface;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;

class PositionName implements PositionNameInterface
{

    public function __construct(private Name $name) {
        $filteredNameString = substr(str_replace(['_', '.'], '-', $name->__toString()), 0, 30);
        $prefix = (
            $name->contains('-')
            &&
            ctype_alnum($filteredNameString[0])
            ? ''
            : 'roady-'
        );
        $suffix = (
             ctype_alnum(substr($filteredNameString, -1))
             ? ''
             : '-position-name'
         );
        $filteredName = new NameInstance(
            new TextInstance(
                strtolower(
                    $prefix .
                    $filteredNameString .
                    $suffix
                )
            )
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

