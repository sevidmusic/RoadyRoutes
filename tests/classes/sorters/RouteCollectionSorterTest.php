<?php

namespace Darling\RoadyRoutes\tests\classes\sorters;

use \Darling\RoadyRoutes\classes\sorters\RouteCollectionSorter;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\sorters\RouteCollectionSorterTestTrait;

class RouteCollectionSorterTest extends RoadyRoutesTest
{

    /**
     * The RouteCollectionSorterTestTrait defines
     * common tests for implementations of the
     * Darling\RoadyRoutes\interfaces\sorters\RouteCollectionSorter
     * interface.
     *
     * @see RouteCollectionSorterTestTrait
     *
     */
    use RouteCollectionSorterTestTrait;

    public function setUp(): void
    {
        $this->setRouteCollectionSorterTestInstance(
            new RouteCollectionSorter()
        );
    }
}

