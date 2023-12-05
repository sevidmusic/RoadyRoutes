<?php

namespace Darling\RoadyRoutes\interfaces\collections;

use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;

/**
 * A PositionNameCollection defines an array of PositionName instance
 * that can be obtained via the PositionNameCollection->collection()
 * method.
 *
 */
interface PositionNameCollection
{

    /**
     * Return a numerically indexed array of PositionName instances.
     *
     * @return array<int, PositionName>
     *
     */
    public function collection(): array;

}

