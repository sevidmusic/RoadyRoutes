<?php

namespace Darling\RoadyRoutes\tests\interfaces\collections;

use \Darling\RoadyRoutes\interfaces\collections\RouteCollection;
use \Darling\RoadyRoutes\interfaces\routes\Route;

/**
 * The RouteCollectionTestTrait defines common tests for
 * implementations of the RouteCollection interface.
 *
 * @see RouteCollection
 *
 */
trait RouteCollectionTestTrait
{

    /**
     * @var RouteCollection $routeCollection
     *                              An instance of a
     *                              RouteCollection
     *                              implementation to test.
     */
    protected RouteCollection $routeCollection;

    /**
     * Set up an instance of a RouteCollection implementation to test.
     *
     * This method must set the RouteCollection implementation
     * instance to be tested via the setRouteCollectionTestInstance()
     * method.
     *
     * This method must also set the collection of Routes that is
     * expected to be returned by the RouteCollection instance being
     * tested's collection() method via the setExpectedCollection()
     * method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * public function setUp(): void
     * {
     *     $mockRoute = new MockClassInstance(
     *         new Reflection(new ClassString(Route::class))
     *     );
     *     $routes = [];
     *     for($i = 0; $i < rand(0, 1000); $i++) {
     *         if(rand(0, 1000000) <= $this->randomLimit()) {
     *             break;
     *         }
     *         $mockInstance = $mockRoute->mockInstance();
     *         if($mockInstance instanceof Route) {
     *             $routes[] = $mockInstance;
     *         }
     *     }
     *     $this->setExpectedCollection($routes);
     *     $this->setRouteCollectionTestInstance(
     *         new RouteCollection(...$routes)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * @var array<int, Route> The collection of Routes that is
     *                        expected to be returned by the
     *                        RouteCollection being tested's
     *                        collection() method.
     *
     */
    private array $expectedCollection;

    /**
     * Return the RouteCollection implementation instance to test.
     *
     * @return RouteCollection
     *
     */
    protected function routeCollectionTestInstance(): RouteCollection
    {
        return $this->routeCollection;
    }

    /**
     * Set the RouteCollection implementation instance to test.
     *
     * @param RouteCollection $routeCollectionTestInstance
     *                                             An instance of an
     *                                             implementation of
     *                                             the RouteCollection
     *                                             interface to test.
     *
     * @return void
     *
     */
    protected function setRouteCollectionTestInstance(
        RouteCollection $routeCollectionTestInstance
    ): void
    {
        $this->routeCollection = $routeCollectionTestInstance;
    }

    /**
     * Set the array of Route instances that is expected to be
     * returned by the RouteCollection instance being tested's
     * collection() method.
     *
     * @param array<int, Route> $collection
     *
     * @return void
     *
     */
    protected function setExpectedCollection(array $collection): void
    {
        $this->expectedCollection = $collection;
    }

    /**
     * Return the array of Route instances that is expected to be
     * returned by the RouteCollection instance being tested's
     * collection() method.
     *
     * @return array<int, Route>
     *
     */
    protected function expectedCollection(): array
    {
        return $this->expectedCollection;
    }

    /**
     * Test collection returns the expected array of Route instances.
     *
     * @return void
     *
     * @covers RouteCollection->collection()
     *
     */
    public function test_collection_returns_the_expected_array_of_Route_instances(): void
    {
        $this->assertEquals(
            $this->expectedCollection(),
            $this->routeCollectionTestInstance()->collection(),
            $this->testFailedMessage(
                $this->routeCollectionTestInstance(),
                'collection',
                'return the expected array of Route instances'
            ),
        );
    }

    abstract protected static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $object, string $method, string $message): string;

}

