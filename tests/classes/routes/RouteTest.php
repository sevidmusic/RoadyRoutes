<?php

namespace Darling\RoadyRoutes\tests\classes\routes;

use \Darling\PHPMockingUtilities\classes\mock\values\MockClassInstance;
use \Darling\PHPReflectionUtilities\classes\utilities\Reflection;
use \Darling\PHPTextTypes\classes\strings\ClassString;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\PHPTextTypes\interfaces\collections\NameCollection;
use \Darling\RoadyRoutes\classes\routes\Route;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\routes\RouteTestTrait;

class RouteTest extends RoadyRoutesTest
{

    /**
     * The RouteTestTrait defines common tests for implementations of
     * the Darling\RoadyRoutes\interfaces\routes\Route interface.
     *
     * @see RouteTestTrait
     *
     */
    use RouteTestTrait;

    public function setUp(): void
    {
        $moduleName = new Name(new Text($this->randomChars()));
        $this->setExpectedModuleName($moduleName);
        $mockNameCollection = new MockClassInstance(
            new Reflection(
                new ClassString(NameCollection::class)
            )
        );
        $nameCollection = $mockNameCollection->mockInstance();
        $mockNamedPositionCollection = new MockClassInstance(
            new Reflection(
                new ClassString(NamedPositionCollection::class)
            )
        );
        $namedPositionCollection =
            $mockNamedPositionCollection->mockInstance();
        $mockRelativePath = new MockClassInstance(
            new Reflection(
                new ClassString(RelativePath::class)
            )
        );
        $relativePath = $mockRelativePath->mockInstance();
        if(
            $nameCollection instanceof NameCollection
            &&
            $namedPositionCollection instanceof NamedPositionCollection
            &&
            $relativePath instanceof RelativePath
        ) {
            $this->setExpectedNameCollection($nameCollection);
            $this->setExpectedNamedPositionCollection(
                $namedPositionCollection
            );
            $this->setExpectedRelativePath($relativePath);
            $this->setRouteTestInstance(
                new Route(
                    $moduleName,
                    $nameCollection,
                    $namedPositionCollection,
                    $relativePath
                )
            );
        }
    }
}

