<?php

namespace Darling\RoadyRoutes\tests\classes\collections;

use \Darling\PHPMockingUtilities\classes\mock\values\MockClassInstance;
use \Darling\PHPReflectionUtilities\classes\utilities\Reflection;
use \Darling\PHPTextTypes\classes\strings\ClassString;
use \Darling\RoadyRoutes\classes\collections\RouteCollection;
use \Darling\RoadyRoutes\interfaces\routes\Route;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\collections\RouteCollectionTestTrait;

class RouteCollectionTest extends RoadyRoutesTest
{

    /**
     * The RouteCollectionTestTrait defines
     * common tests for implementations of the
     * Darling\RoadyRoutes\interfaces\collections\RouteCollection
     * interface.
     *
     * @see RouteCollectionTestTrait
     *
     */
    use RouteCollectionTestTrait;

    public function setUp(): void
    {
        $mockRoute = new MockClassInstance(
            new Reflection(new ClassString(Route::class))
        );
        $routes = [];
        for($i = 0; $i < rand(0, 1000); $i++) {
            if(rand(0, 1000000) <= $this->randomLimit()) {
                break;
            }
            $mockInstance = $mockRoute->mockInstance();
            if($mockInstance instanceof Route) {
                $routes[] = $mockInstance;
            }
        }
        $this->setExpectedCollection($routes);
        $this->setRouteCollectionTestInstance(
            new RouteCollection(...$routes)
        );
    }
}

