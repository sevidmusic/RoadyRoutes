<?php

namespace Darling\RoadyRoutes\interfaces\sorters;

use \Darling\RoadyRoutes\interfaces\collections\RouteCollection;
use \Darling\RoadyRoutes\interfaces\routes\Route;

/**
 * A RouteCollectionSorter defines methods that can be used to sort
 * a collection of Routes.
 *
 * At the moment this interface only defines one method. In the future
 * other methods may be added if more sorting methods are needed.
 *
 */
interface RouteCollectionSorter
{
    /**
     * Return a multi-dimensional array of Routes sorted by
     * NamedPosition.
     *
     * The Routes will be indexed first by PositionName, and then
     * by Position.
     *
     * For example: `[ PositionName => [Position => Route], ... ]`
     *
     * If two or more Routes in the RouteCollection being sorted share
     * the same PositionName and Position then the indexes of each
     * Route my be larger than it's actual Position by a factor
     * of `0.001`. This is to allow multiple Routes with the same
     * PositionName and Positon to exist in the returned array.
     *
     * @return array<string, array<string, Route>>
     *
     */
    public function sortByNamedPosition(RouteCollection $routeCollection): array;

}
