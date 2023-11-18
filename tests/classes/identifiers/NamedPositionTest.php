<?php

namespace Darling\RoadyRoutes\tests\classes\identifiers;

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\RoadyRoutes\classes\identifiers\NamedPosition;
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
        $name = new Name(new Text($this->randomChars()));
        $position = new Position($this->randomFloat());
        $this->setExpectedName($name);
        $this->setExpectedPosition($position);
        $this->setNamedPositionTestInstance(
            new NamedPosition($name, $position)
        );
    }
}

