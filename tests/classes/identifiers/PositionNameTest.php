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
     * \Darling\RoadyRoutes\interfaces\identifiers\PositionName
     * interface.
     *
     * @see PositionNameTestTrait
     *
     */
    use PositionNameTestTrait;

    public function setUp(): void
    {
        $testText = [
            /**
             * Used to test that PositionName contains at least
             * one hypen.
             *
             * @see PositionNameTestTrait->test_Name_contains_at_least_one_hypen()
             *
             */
            new Text(str_repeat('0', rand(0, 100))),
            /**
             * Used to test that PositionName ends in alphanumeric
             * character.
             *
             * @see PositionNameTestTrait->test_Name_ends_with_an_alphanumeric_character()
             *
             */
            new Text('0-0-'),
            /**
             * Used to test that PositionName does not contain
             * periods (.), or underscores (_)
             *
             * @see PositionNameTestTrait->test_Name_does_not_contain_any_periods()
             * @see PositionNameTestTrait->test_Name_does_not_contain_any_underscores()
             *
             */
            new Text('0-' . '._' . '-0'),
            /**
             * Used to test that PositionName always matches
             * expected Name.
             *
             * @see PositionNameTestTrait->test_Name_returns_expected_Name()
             *
             */
            new Text($this->randomChars()),
        ];
        $name = new Name($testText[array_rand($testText)]);
        $this->setExpectedName($name);
        $this->setPositionNameTestInstance(
            new PositionName($name)
        );
    }

}

