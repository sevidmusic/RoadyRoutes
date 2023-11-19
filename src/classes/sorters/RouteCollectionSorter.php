<?php

namespace Darling\RoadyRoutes\classes\sorters;

use \Darling\RoadyRoutes\interfaces\sorters\RouteCollectionSorter as RouteCollectionSorterInterface;
use \Darling\RoadyRoutes\interfaces\collections\RouteCollection;

class RouteCollectionSorter implements RouteCollectionSorterInterface
{

    public function sortByNamedPosition(RouteCollection $routeCollection): array
    {
        return [];
    }
}

