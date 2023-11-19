<?php

namespace Darling\RoadyRoutes\interfaces\collections;

use \Darling\RoadyRoutes\interfaces\routes\Route;

/**
 * A RouteCollection defines a collection of Routes.
 *
 */
interface RouteCollection
{

    /**
     * Return a numerically indexed array of Routes.
     *
     * @return array<int, Route>
     *
     */
    public function collection(): array;

}

