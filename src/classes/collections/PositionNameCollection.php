<?php

namespace Darling\RoadyRoutes\classes\collections;

use \Darling\RoadyRoutes\interfaces\collections\PositionNameCollection as PositionNameCollectionInterface;
use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;

class PositionNameCollection implements PositionNameCollectionInterface
{

    /**
     * @var array<int, PositionName> $collection
     */
    private array $collection = [];

    /**
     * Instantiate a new PositionNameCollection.
     *
     * @param PositionName ...$positionNames The PositionName
     *                                       instances to include
     *                                       in the collection.
     *
     */
    public function __construct(PositionName ...$positionNames)
    {
        foreach($positionNames as $positionName) {
            $this->collection[] = $positionName;
        }
    }

    public function collection(): array
    {
        return $this->collection;
    }

}

