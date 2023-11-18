<?php

namespace Darling\RoadyRoutes\classes\collections;

use Darling\RoadyRoutes\interfaces\identifiers\NamedPosition;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection as NamedPositionCollectionInterface;

class NamedPositionCollection implements NamedPositionCollectionInterface
{

    /**
     * @var array<int, NamedPosition> $collection
     */
    private array $collection = [];

    public function __construct(NamedPosition ...$namedPositions)
    {
        foreach($namedPositions as $namedPosition) {
            $this->collection[] = $namedPosition;
        }
    }

    public function collection(): array
    {
        return $this->collection;
    }

}

