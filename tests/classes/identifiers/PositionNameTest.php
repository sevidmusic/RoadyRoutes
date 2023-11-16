<?php

namespace Darling\RoadyRoutes\tests\classes\identifiers;

use \Darling\PHPTextTypes\classes\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\RoadyRoutes\classes\identifiers\PositionName;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\identifiers\PositionNameTestTrait;

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
            /* Used to test that Name contains at least one hypen */
            new Text(str_repeat('0', 126)),
            /* Used to test that Name ends in alphanumeric character */
#            new Text(str_repeat($this->randomChars(), 126) . '-'),
            /* Used to test that Name  does not contain periods (.), or underscores (_) */
#           new Text($this->randomChars() . (rand(0, 1) ? '.' : '_')),
        ];
        $name = new Name($testText[array_rand($testText)]);
        $this->setExpectedName($name);
        $this->setPositionNameTestInstance(
            new PositionName($name)
        );
    }

}

