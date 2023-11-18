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

    /**
     * Instantiate a new NamedPositionCollection using the
     * specified NamedPositions.
     *
     * @param NamedPosition ...$namedPositions The NamedPositions
     *                                         to assign to the
     *                                         collection.
     *
     */
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

