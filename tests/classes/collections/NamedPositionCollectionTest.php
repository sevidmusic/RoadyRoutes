<?php

namespace Darling\RoadyRoutes\tests\classes\collections;

use \Darling\PHPMockingUtilities\classes\mock\values\MockClassInstance;
use \Darling\PHPReflectionUtilities\classes\utilities\Reflection;
use \Darling\PHPTextTypes\classes\strings\ClassString;
use \Darling\RoadyRoutes\classes\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\collections\NamedPositionCollectionTestTrait;

class NamedPositionCollectionTest extends RoadyRoutesTest
{

    /**
     * The NamedPositionCollectionTestTrait defines
     * common tests for implementations of the
     * Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection
     * interface.
     *
     * @see NamedPositionCollectionTestTrait
     *
     */
    use NamedPositionCollectionTestTrait;

    public function setUp(): void
    {
        $mockNamedPosition = new MockClassInstance(
            new Reflection(new ClassString(NamedPosition::class))
        );
        $namedPositions = [];
        for($i = 0; $i < rand(0, 1000); $i++) {
            if(rand(0, 1000000) <= $this->randomLimit()) {
                break;
            }
            $mockInstance = $mockNamedPosition->mockInstance();
            if($mockInstance instanceof NamedPosition) {
                $namedPositions[] = $mockInstance;
            }
        }
        $this->setExpectedCollection($namedPositions);
        $this->setNamedPositionCollectionTestInstance(
            new NamedPositionCollection(...$namedPositions)
        );
    }

}

