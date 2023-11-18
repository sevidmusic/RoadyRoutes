<?php

namespace Darling\RoadyRoutes\tests\classes\settings;

use \Darling\RoadyRoutes\classes\settings\Position;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\settings\PositionTestTrait;

class PositionTest extends RoadyRoutesTest
{

    /**
     * The PositionTestTrait defines common tests for implementations
     * of the Darling\RoadyRoutes\interfaces\settings\Position
     * interface.
     *
     * @see PositionTestTrait
     *
     */
    use PositionTestTrait;

    public function setUp(): void
    {
        $initalFloatValue = $this->randomFloat();
        $this->setExpectedInitialFloatValue($initalFloatValue);
        $this->setPositionTestInstance(new Position($initalFloatValue));
    }
}

