<?php

namespace Darling\RoadyRoutes\tests\interfaces\sorters;

use Darling\RoadyRoutes\classes\identifiers\NamedPosition;
use Darling\RoadyRoutes\classes\settings\Position;
use \Darling\PHPMockingUtilities\classes\mock\values\MockClassInstance;
use \Darling\PHPReflectionUtilities\classes\utilities\Reflection;
use \Darling\PHPTextTypes\classes\collections\NameCollection;
use \Darling\PHPTextTypes\classes\collections\SafeTextCollection;
use \Darling\PHPTextTypes\classes\strings\ClassString;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\SafeText;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\RoadyRoutes\classes\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\classes\collections\RouteCollection as RouteCollectionInstance;
use \Darling\RoadyRoutes\classes\paths\RelativePath;
use \Darling\RoadyRoutes\interfaces\routes\Route;
use \Darling\RoadyRoutes\classes\routes\Route as RouteInstance;
use \Darling\RoadyRoutes\interfaces\collections\RouteCollection;
use \Darling\RoadyRoutes\interfaces\sorters\RouteCollectionSorter;

/**
 * The RouteCollectionSorterTestTrait defines common tests for
 * implementations of the RouteCollectionSorter interface.
 *
 * @see RouteCollectionSorter
 *
 */
trait RouteCollectionSorterTestTrait
{

    /**
     * @var RouteCollectionSorter $routeCollectionSorter
     *                              An instance of a
     *                              RouteCollectionSorter
     *                              implementation to test.
     */
    protected RouteCollectionSorter $routeCollectionSorter;

    /**
     * Set up an instance of a RouteCollectionSorter implementation
     * to test.
     *
     * This method must set the RouteCollectionSorter
     * implementation instance to be tested via the
     * setRouteCollectionSorterTestInstance() method.
     *
     * This method may also be used to perform any additional
     * setup required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $this->setRouteCollectionSorterTestInstance(
     *         new \Darling\RoadyRoutes\classes\sorters\RouteCollectionSorter()
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the RouteCollectionSorter implementation instance to test.
     *
     * @return RouteCollectionSorter
     *
     */
    protected function routeCollectionSorterTestInstance(): RouteCollectionSorter
    {
        return $this->routeCollectionSorter;
    }

    /**
     * Set the RouteCollectionSorter implementation instance to test.
     *
     * @param RouteCollectionSorter $routeCollectionSorterTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the RouteCollectionSorter
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setRouteCollectionSorterTestInstance(
        RouteCollectionSorter $routeCollectionSorterTestInstance
    ): void
    {
        $this->routeCollectionSorter = $routeCollectionSorterTestInstance;
    }


    /**
     * Use the specified RouteCollection to determine the array
     * that should be returned by the RouteCollectionSorter
     * instance being tested's sortByNamedPosition() method
     * if it was passed the same RouteCollection.
     *
     * @return array<string, array<string, Route>>
     *
     */
    private function expectedArrayOfRoutesSortedByNamedPosition(
        RouteCollection $routeCollection
    ): array
    {
        $sortedRoutes = [];
        foreach($routeCollection->collection() as $route) {
            foreach($route->namedPositionCollection()->collection() as $namedPosition) {
                while(isset($sortedRoutes[$namedPosition->name()->__toString()][$namedPosition->position()->__toString()])) {
                    $namedPosition->position()->increasePosition();
                }
                $positionIndex = ($namedPosition->position()->__toString() === '0' ? '0.000' : $namedPosition->position()->__toString());
                $sortedRoutes[$namedPosition->name()->__toString()][$positionIndex] = $route;
                ksort($sortedRoutes[$namedPosition->name()->__toString()], SORT_NATURAL);
            }
        }
        ksort($sortedRoutes, SORT_NATURAL);
        return $sortedRoutes;
    }

    private function testRouteCollection(): RouteCollection
    {
        return new RouteCollectionInstance(
            new RouteInstance(
                new NameCollection(new Name(new Text('name3.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(3.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name3.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-1')),
                        new Position(3.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name1.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-1')),
                        new Position(1.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name1.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-1')),
                        new Position(1.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name1.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-5')),
                        new Position(1.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name1.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-1')),
                        new Position(1.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name1.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-1')),
                        new Position(1.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name0.02'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(0.02),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name0.02'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(0.02),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name0'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(0),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name0'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(0),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name0.02'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(0.02),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name3.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(3.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name7.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-5')),
                        new Position(23.27683),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
            new RouteInstance(
                new NameCollection(new Name(new Text('name7.1'))),
                new NamedPositionCollection(
                    new NamedPosition(
                        new Name(new Text('named-position-2')),
                        new Position(7.1),
                    ),
                ),
                new RelativePath(
                    new SafeTextCollection(
                        new SafeText(new Text('relative')),
                        new SafeText(new Text('path')),
                    )
                ),
            ),
        );
    }
    /**
     * Test sortByNamedPosition() returns an associatively index
     * array of associatively indexed arrays of Routes indexed first
     * by Name and then by Position.
     *
     * @return void
     *
     * @covers RouteCollectionSorter->sortByNamedPosition()
     *
     */
    public function test_sortByNamedPosition_returns_an_associatively_index_array_of_associatively_indexed_arrays_of_Routes_indexed_first_by_Name_and_then_by_Position(): void
    {
        $mockClassInstance = new MockClassInstance(
            new Reflection(new ClassString(RouteCollection::class))
        );
        $testRouteCollection =  $this->testRouteCollection();
        $this->assertEquals(
            $this->expectedArrayOfRoutesSortedByNamedPosition($testRouteCollection),
            $this->routeCollectionSorterTestInstance()->sortByNamedPosition($testRouteCollection),
            $this->testFailedMessage(
                $this->routeCollectionSorterTestInstance(),
                'sortByNamedPosition',
                'Test sortByNamedPosition() returns an associatively index array of associatively indexed arrays of Routes indexed first by Name and then by Position'
            ),
        );
    }

    /**
     * Test Routes are sorted by Position in ascending order.
     *
     * @return void
     *
     * @covers RouteCollectionSorter->sortByNamedPosition()
     *
     */
    public function test_positions_are_sorted_in_ascending_order(): void
    {
        $testRouteCollection = $this->testRouteCollection();
        $sortedRoutes = $this->routeCollectionSorterTestInstance()->sortByNamedPosition($testRouteCollection);
        foreach($sortedRoutes as $positionName => $routes) {
            foreach($routes as $positionIndex => $route) {
                if(isset($lastPositionIndex)) {
                    $this->assertGreaterThan(
                        strval($lastPositionIndex),
                        strval($positionIndex),
                        $this->testFailedMessage(
                            $this->routeCollectionSorterTestInstance(),
                            'sortByNamedPosition',
                            'Routes must be sorted by position in ascending order',
                        ),
                    );
                }
                $lastPositionIndex = $positionIndex;
            }
            unset($lastPositionIndex);
        }
    }

    /**
     * Test positionNames are sorted in alphabetical order.
     *
     * @return void
     *
     * @covers RouteCollectionSorter->sortByNamedPosition()
     *
     */
    public function test_positionNames_are_sorted_in_alphabetical_order(): void
    {
        $testRouteCollection = $this->testRouteCollection();
        $sortedRoutes = $this->routeCollectionSorterTestInstance()->sortByNamedPosition($testRouteCollection);
        $positionNames = array_keys($sortedRoutes);
        $unsortedPositionNames = $positionNames;
        asort($positionNames, SORT_NATURAL);
        $this->assertSame(
            $positionNames,
            $unsortedPositionNames,
            $this->testFailedMessage(
                $this->routeCollectionSorterTestInstance(),
                'sortByNamedPosition',
                'positionNames must be sorted in alphabetical order'
            ),
        );
    }

    abstract public static function assertSame(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $object, string $method, string $message): string;
    abstract public static function assertGreaterThan(mixed $expected, mixed $actual, string $message = ''): void;

}

