<?php

namespace Darling\RoadyRoutes\tests\classes\collections;

use \Darling\RoadyRoutes\classes\collections\PositionNameCollection;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\collections\PositionNameCollectionTestTrait;
use \Darling\RoadyRoutes\classes\identifiers\PositionName;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

class PositionNameCollectionTest extends RoadyRoutesTest
{

    /**
     * The PositionNameCollectionTestTrait defines
     * common tests for implementations of the
     * Darling\RoadyRoutes\interfaces\collections\PositionNameCollection
     * interface.
     *
     * @see PositionNameCollectionTestTrait
     *
     */
    use PositionNameCollectionTestTrait;

    public function setUp(): void
    {
        $positionNames = [];
        for($i = 0; $i < rand(0, 100); $i++) {
            $positionNames[] = new PositionName(
                new Name(
                    new Text($this->randomChars())
                )
            );
        }
        $this->setExpectedCollection($positionNames);
        $this->setPositionNameCollectionTestInstance(
            new PositionNameCollection(...$positionNames)
        );
    }

}

