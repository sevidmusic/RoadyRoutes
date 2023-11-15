<?php

namespace Darling\RoadyRoutes\tests\classes\identifiers;

use \Darling\RoadyRoutes\classes\identifiers\PositionName;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\identifiers\PositionNameTestTrait;
use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;

class PositionNameTest extends RoadyRoutesTest
{

    /**
     * The PositionNameTestTrait defines
     * common tests for implementations of the
     * Darling\RoadyRoutes\interfaces\identifiers\PositionName
     * interface.
     *
     * @see PositionNameTestTrait
     *
     */
    use PositionNameTestTrait;

    public function setUp(): void
    {
        $testText = [
            new Text($this->randomChars() . 'bar-----foo-'),
        ];
        $name = new Name($testText[array_rand($testText)]);
        $this->setExpectedName($name);
        $this->setPositionNameTestInstance(
            new PositionName($name)
        );
    }
}

