<?php

namespace Darling\RoadyRoutes\interfaces\collections;

use \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition;

/**
 * A NamedPositionCollection defines a collection of NamedPositions.
 *
 */
interface NamedPositionCollection
{
    /**
     * Return a numerically indexed array of NamedPositions.
     *
     * @return array<int, NamedPosition>
     *
     */
    public function collection(): array;

}

