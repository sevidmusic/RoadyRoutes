<?php

namespace Darling\RoadyRoutes\classes\sorters;

use \Darling\RoadyRoutes\interfaces\sorters\RouteCollectionSorter as RouteCollectionSorterInterface;
use \Darling\RoadyRoutes\interfaces\collections\RouteCollection;

class RouteCollectionSorter implements RouteCollectionSorterInterface
{

    public function sortByNamedPosition(RouteCollection $routeCollection): array
    {
        $sortedRoutes = [];
        foreach($routeCollection->collection() as $route) {
            foreach($route->namedPositionCollection()->collection() as $namedPosition) {
                while(isset($sortedRoutes[$namedPosition->name()->__toString()][$namedPosition->position()->__toString()])) {
                    $namedPosition->position()->increasePosition();
                }
                $sortedRoutes[$namedPosition->name()->__toString()][$namedPosition->position()->__toString()] = $route;
            }
        }
        return $sortedRoutes;
    }

}

