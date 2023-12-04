<?php

namespace Darling\RoadyRoutes\tests\classes\identifiers;

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\RoadyRoutes\classes\identifiers\NamedPosition;
use \Darling\RoadyRoutes\classes\identifiers\PositionName;
use \Darling\RoadyRoutes\classes\settings\Position;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\identifiers\NamedPositionTestTrait;

class NamedPositionTest extends RoadyRoutesTest
{

    /**
     * The NamedPositionTestTrait defines
     * common tests for implementations of the
     * Darling\RoadyRoutes\interfaces\identifiers\NamedPosition
     * interface.
     *
     * @see NamedPositionTestTrait
     *
     */
    use NamedPositionTestTrait;

    public function setUp(): void
    {
        $positionName = new PositionName(new Name(new Text($this->randomChars())));
        $position = new Position($this->randomFloat());
        $this->setExpectedPositionName($positionName);
        $this->setExpectedPosition($position);
        $this->setNamedPositionTestInstance(
            new NamedPosition($positionName, $position)
        );
    }
}

