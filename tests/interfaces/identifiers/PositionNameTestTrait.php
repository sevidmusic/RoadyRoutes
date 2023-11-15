<?php

namespace Darling\RoadyRoutes\tests\interfaces\identifiers;

use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\PHPTextTypes\classes\strings\Name as NameInstance;
use \Darling\PHPTextTypes\interfaces\strings\Text;
use \Darling\PHPTextTypes\classes\strings\Text as TextInstance;

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
     * This method must also set the PositionName implementation instance
     * to be tested via the setPositionNameTestInstance() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * protected function setUp(): void
     * {
     *     $this->setPositionNameTestInstance(
     *         new \Darling\RoadyRoutes\classes\identifiers\PositionName()
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
     * @return void
     *
     */
    protected function setExpectedName(Name $name): void
    {
        $filteredNameString = substr(str_replace(['_', '.'], '-', $name->__toString()), 0, 30);
        $prefix = (
            $name->contains('-')
            &&
            ctype_alnum($filteredNameString[0])
            ? ''
            : 'roady-'
        );
        $suffix = (
             ctype_alnum(substr($filteredNameString, -1))
             ? ''
             : '-position-name'
         );
        $filteredName = new NameInstance(
            new TextInstance(
                strtolower(
                    $prefix .
                    $filteredNameString .
                    $suffix
                )
            )
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
    public function test_name_returns_expected_Name(): void
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
    public function test_name_contains_at_least_one_hypen(): void
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
    public function test_name_begins_with_an_alphanumeric_character(): void
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
    public function test_name_ends_with_an_alphanumeric_character(): void
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
    public function test_name_is_lower_case(): void
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

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

