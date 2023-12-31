<?php

namespace Darling\RoadyRoutes\tests\interfaces\identifiers;

use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;
use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;

/**
 * The PositionNameTestTrait defines common tests for implementations
 * of the PositionName interface.
 *
 * @see PositionName
 *
 */
trait PositionNameTestTrait
{

    /**
     * @var PositionName $positionName An instance of a PositionName
     *                                 implementation to test.
     */
    protected PositionName $positionName;

    /**
     * @var Name $expectedName The Name that is expected to be
     *                         returned by the PositionName instance
     *                         being tested's name() method.
     */
    protected Name $expectedName;

    /**
     * Set up an instance of a PositionName implementation to test.
     *
     * This method must set the PositionName implementation
     * instance to be tested via the setPositionNameTestInstance()
     * method.
     *
     * This method must also set the Name instance that is expected
     * to be returned by the PositionName instance being tested's
     * name() method via the setExpectedName() method.
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
     *     $testText = [
     *         new Text(str_repeat('0', rand(0, 100))),
     *         new Text('0-0-'),
     *         new Text('0-' . '._' . '-0'),
     *         new Text($this->randomChars()),
     *     ];
     *     $name = new Name($testText[array_rand($testText)]);
     *     $this->setExpectedName($name);
     *     $this->setPositionNameTestInstance(
     *         new PositionName($name)
     *     );
     * }
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
     *                                             An instance of an
     *                                             implementation of
     *                                             the PositionName
     *                                             interface to test.
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
     *                   Note:
     *
     *                   The specified Name will be used to
     *                   instantiate a new Name instance that is
     *                   filtered to comply with the requirements
     *                   of a PostionName.
     *
     *                   This new Name instance will be the Name that
     *                   is actually assigned as the expected Name
     *                   instance.
     *
     *                   If the specified Name contains any
     *                   underscores (_) or periods (.) they
     *                   will be replaced with hypens (-).
     *
     *                   If the specified Name does not end with an
     *                   alphanumeric character, the suffix `-rpn`
     *                   will be appended to the specified Name.
     *
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
        $offset = ($name->length() - mb_strlen($this->expectedAlphanumericSuffix()));
        $filteredNameString = (
            ctype_alnum(substr($filteredNameString, -1))
            &&
            str_contains($filteredNameString, '-')
            ? $filteredNameString
            : (
                $name->length() + $offset < 70
                ? $filteredNameString . $this->expectedAlphanumericSuffix()
                : substr($filteredNameString, 0, $offset) . $this->expectedAlphanumericSuffix()
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
     * Return the alphanumeric suffix that is expected to be appended
     * to the Name returned by the expectedName() method method if
     * the specified Name did not end in an alphanumeric character.
     *
     * @return string
     *
     * @see PositionTestTrait->setExpectedName()
     * @see PositionTestTrait->expectedName()
     *
     */
    private function expectedAlphanumericSuffix(): string
    {
        return '-rpn';
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
               'return the expected Name, Name is: ' .
               $this->positionNameTestInstance()->name()->__toString()
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
               'Name must contain at least one hyphen (-), Name is: `' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
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
            ctype_alnum(
                $this->positionNameTestInstance()
                     ->name()
                     ->__toString()[0]
            ),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name must begin with an alphanumeric character, ' .
               'Name is: `' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
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
            ctype_alnum(
                mb_substr(
                    $this->positionNameTestInstance()
                         ->name()
                         ->__toString(),
                    -1
                )
            ),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name must end with an alphanumeric character, ' .
               'Name is: `' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
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
            strtolower(
                $this->positionNameTestInstance()->name()->__toString()
            ),
            $this->positionNameTestInstance()->name()->__toString(),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name must be lowercase, Name is: `' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
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
     * Test Name is greater than 2 characters.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     *
     */
    public function test_Name_is_greater_than_2_characters(): void
    {
        $this->assertGreaterThan(
            2,
            $this->positionNameTestInstance()->name()->length(),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name\'s length must be greater than 2 characters'
            ),
        );
    }

    /**
     * Test Name does not contain any periods.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_does_not_contain_any_periods(): void
    {
        $this->assertTrue(
            !str_contains(
                $this->positionNameTestInstance()->name()->__toString(),
                '.'
            ),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name must not contain any periods. Name is: ' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
            ),
        );
    }

    /**
     * Test Name does not contain any underscores.
     *
     * @return void
     *
     * @covers PositionName->name()
     *
     */
    public function test_Name_does_not_contain_any_underscores(): void
    {
        $this->assertTrue(
            !str_contains(
                $this->positionNameTestInstance()->name()->__toString(),
                '_'
            ),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               'name',
               'Name must not contain any underscores. Name is: ' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
            ),
        );
    }

    /**
     * Test __toString() returns the same string that is returned by
     * the __toString() method of the Name instance returned by the
     * name() method.
     *
     * @return void
     *
     * @covers PositionName->__toString()
     *
     */
    public function test___toString_returns_the_same_string_that_is_returned_by_the___toString_method_of_the_Name_returned_by_the_name_method(): void
    {
        $this->assertEquals(
            $this->positionNameTestInstance()->name()->__toString(),
            $this->positionNameTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->positionNameTestInstance(),
               '__toString',
               'returns the same string that is returned by ' .
               'the __toString() method of the Name ' .
               'instance returned by the name() method.' .
               $this->positionNameTestInstance()->name()->__toString() .
               '`'
            ),
        );
    }

    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertGreaterThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertLessThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertTrue(bool $condition, string $message = ''): void;

}

