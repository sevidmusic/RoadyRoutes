<?php

namespace Darling\RoadyRoutes\classes\sorters;

use \Darling\RoadyRoutes\interfaces\collections\RouteCollection;
use \Darling\RoadyRoutes\interfaces\sorters\RouteCollectionSorter as RouteCollectionSorterInterface;

class RouteCollectionSorter implements RouteCollectionSorterInterface
{

    public function sortByNamedPosition(
        RouteCollection $routeCollection
    ): array
    {
        $sortedRoutes = [];
        foreach($routeCollection->collection() as $route) {
            foreach(
                $route->namedPositionCollection()->collection()
                as
                $namedPosition
            ) {
                $positionName = $namedPosition->positionName()->__toString();
                $positionIndex = (
                    $namedPosition->position()->__toString() === '0'
                    ? '0.000'
                    : $namedPosition->position()->__toString()
                );
                while(
                    isset($sortedRoutes[$positionName][$positionIndex])
                ) {
                    $namedPosition->position()->increasePosition();
                    $positionIndex = $namedPosition->position()
                                                   ->__toString();
                }
                $sortedRoutes[$positionName][$positionIndex] = $route;
                ksort($sortedRoutes[$positionName], SORT_NUMERIC);
            }
        }
        ksort($sortedRoutes, SORT_NATURAL);
        return $sortedRoutes;
    }

}

