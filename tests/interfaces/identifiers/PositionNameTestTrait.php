<?php

namespace Darling\RoadyRoutes\tests\interfaces\identifiers;

use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;
use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;

/**
 * The PositionNameTestTrait defines common tests for
 * implementations of the PositionName interface.
 *
 * @see PositionName
 *
 */
trait PositionNameTestTrait
{

    /**
     * @var PositionName $positionName
     *                              An instance of a
     *                              PositionName
     *                              implementation to test.
     */
    protected PositionName $positionName;

    /**
     * @var Name $expectedName;
     */
    protected Name $expectedName;

    /**
     * Set up an instance of a PositionName implementation to test.
     *
     * This method must set the PositionName implementation
     * instance to be tested via the setPositionNameTestInstance()
     * method.
     *
     * This method must set the Name instance that is expected
     * to be returned by the PositionName instance being
     * tested's name() method via the setExpectedName() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * public function setUp(): void
     * {
     *     $invalidChars = str_shuffle(
     *         '!@#$%^&*()_+=|\\}]{["\':;?/>.<,~`'
     *     );
     *     $testText = [
     *         new Text(''),
     *         new Text(
     *             $invalidChars .
     *             $this->randomChars() .
     *             $invalidChars .
     *             '-'
     *         ),
     *     ];
     *     $name = new Name($testText[array_rand($testText)]);
     *     $this->setExpectedName($name);
     *     $this->setPositionNameTestInstance(
     *         new PositionName($name)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the PositionName implementation instance to test.
     *
     * @return PositionName
     *
     */
    protected function positionNameTestInstance(): PositionName
    {
        return $this->positionName;
    }

    /**
     * Set the PositionName implementation instance to test.
     *
     * @param PositionName $positionNameTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the PositionName
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setPositionNameTestInstance(
        PositionName $positionNameTestInstance
    ): void
    {
        $this->positionName = $positionNameTestInstance;
    }


    /**
     * Set the Name that is expected to be returned by the
     * PositionName instance being tested's name() method.
     *
     * @param Name $name The Name that is expected to be returned by
     *                   the PositionName instance being tested's
     *                   name() method.
     *
     *                   Note: The specified Name will be used to
     *                   instantiate a new Name instance that is
     *                   filtered to comply with the additional
     *                   requirements of a PostionName.
     *
     *                   This new Name instance will be assigned as
     *                   the expected Name instance.
     *
     *                   If the specified Name does not begin with an
     *                   alphanumeric character, the prefix `roady-`
     *                   will be prepended to the specified Name.
     *
     *                   If the specified Name does not end with an
     *                   alphanumeric character, the suffix
     *                   `-0` will be prepended to the
     *                   specified Name.
     *
     *                   Finally, if the specified Name contains any
     *                   underscores (_) or periods (.) they will be
     *                   replaced with hypens (-).
     *
     * @return void
     *
     */
    protected function setExpectedName(Name $name): void
    {

        $filteredNameString = str_replace(
            ['_', '.'],
            '-',
            $name->__toString()
        );
        $offset = ($name->length() - mb_strlen('-rpn'));
        $filteredNameString = (
            ctype_alnum(substr($filteredNameString, -1))
            &&
            str_contains($filteredNameString, '-')
            ? $filteredNameString
            : (
                $name->length() + $offset < 70
                ? $filteredNameString . '-rpn'
                : substr($filteredNameString, 0, $offset) . '-rpn'
            )
        );
        $filteredName = new NameInstance(
            new TextInstance(strtolower($filteredNameString))
        );
        $this->expectedName = $filteredName;
    }

    /**
     * Return the Name that is expected to be returned by the
     * PositionName instance being tested's name() method.
     *
     * @return Name
     *
     */
    protected function expectedName(): Name
    {
        return $this->expectedName;
    }

    /**
     * Test Name returns expected Name.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_returns_expected_Name(): void
    {
        $this->assertEquals(
            $this->expectedName(),
            $this->positionNameTestInstance()->name(),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
                'return the expected Name, Name is: ' . $this->positionNameTestInstance()->name()->__toString()
            ),
        );
    }

    /**
     * Test Name returns contains at least one hypehn (-).
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_contains_at_least_one_hypen(): void
    {
        $this->assertTrue(
            $this->positionNameTestInstance()->name()->contains('-'),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
                'Name must contain at least one hyphen (-), Name is: `' . $this->positionNameTestInstance()->name()->__toString() . '`'
            ),
        );
    }

    /**
     * Test Name begins with an alphanumeric character.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_begins_with_an_alphanumeric_character(): void
    {
        $this->assertTrue(
            ctype_alnum($this->positionNameTestInstance()->name()->__toString()[0]),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
                'Name must begin with an alphanumeric character, Name is: `' . $this->positionNameTestInstance()->name()->__toString() . '`'
            ),
        );
    }

    /**
     * Test name ends with an alphanumeric character.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_ends_with_an_alphanumeric_character(): void
    {
        $this->assertTrue(
            ctype_alnum(mb_substr($this->positionNameTestInstance()->name()->__toString(), -1)),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
                'Name must end with an alphanumeric character, Name is: `' . $this->positionNameTestInstance()->name()->__toString() . '`'
            ),
        );
    }

    /**
     * Test Name is lowercase.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_is_lower_case(): void
    {
        $this->assertEquals(
            strtolower($this->positionNameTestInstance()->name()->__toString()),
            $this->positionNameTestInstance()->name()->__toString(),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
                'Name must be lowercase, Name is: `' . $this->positionNameTestInstance()->name()->__toString() . '`'
            ),
        );
    }

    /**
     * Test Name is less than 71 characters.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     *
     */
    public function test_Name_is_less_than_71_characters(): void
    {
        $this->assertLessThan(
            71,
            $this->positionNameTestInstance()->name()->length(),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name\'s length must be less than 71 characters'
            ),
        );
    }

    /**
     * TODO
     * test___toString_returns_the_same_string_that_returned_by_the___toString_method_of_the_Name_returned_by_the_name_method()
     * test_Name_does_not_contain_any_periods()
     * test_Name_does_not_contain_any_underscores()
     */

    abstract public static function assertLessThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

