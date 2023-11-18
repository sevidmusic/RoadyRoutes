<?php

namespace Darling\RoadyRoutes\tests\interfaces\settings;

use \Darling\RoadyRoutes\interfaces\settings\Position;

/**
 * The PositionTestTrait defines common tests for implementations of
 * the Position interface.
 *
 * @see Position
 *
 */
trait PositionTestTrait
{

    /**
     * @var Position $position An instance of a Position
     *                         implementation to test.
     */
    protected Position $position;

    /**
     * @var float $expectedInitialFloatValue The float that is
     *                                       expected to be initial
     *                                       float value of the
     *                                       Position instance being
     *                                       tested.
     *
     */
    private float $expectedInitialFloatValue;

    /**
     * Set up an instance of a Position implementation to test.
     *
     * This method must also set the Position implementation instance
     * to be tested via the setPositionTestInstance() method.
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
     *     $this->setPositionTestInstance(
     *         new \Darling\RoadyRoutes\classes\settings\Position()
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;


    /**
     * Set the float value that is expected to be the Position
     * instance being tested's initial float value.
     *
     * @param float $float The float value that is expected to be
     *                     the Position instance being tested's
     *                     initial float value.
     *
     * @return void
     *
     */
    protected function setExpectedInitialFloatValue(float $float): void
    {
        $this->expectedInitialFloatValue = $float;
    }

    /**
     * Return the float value that is expected to be the Position
     * instance being tested's initial float value.
     *
     * @return float
     *
     */
    protected function expectedInitialFloatValue(): float
    {
        return $this->expectedInitialFloatValue;
    }

    /**
     * Return the Position implementation instance to test.
     *
     * @return Position
     *
     */
    protected function positionTestInstance(): Position
    {
        return $this->position;
    }

    /**
     * Set the Position implementation instance to test.
     *
     * @param Position $positionTestInstance An instance of an
     *                                       implementation of
     *                                       the Position interface
     *                                       to test.
     *
     * @return void
     *
     */
    protected function setPositionTestInstance(
        Position $positionTestInstance
    ): void
    {
        $this->position = $positionTestInstance;
    }

    /**
     * Test floatValue() returns expected initial float value if
     * Position->set() has not been called.
     *
     * @return void
     *
     * @covers Position->floatValue()
     *
     */
    public function test_floatValue_returns_expected_initial_float_value_if_set_has_not_been_called(): void
    {
        $this->assertEquals(
            $this->expectedInitialFloatValue(),
            $this->positionTestInstance()->floatValue(),
            $this->testFailedMessage(
               $this->positionTestInstance(),
               'flaotValue',
               'return the expected inital float value if set() ' .
               'has not been called'
            ),
        );
    }

    /**
     * Test floatValue() returns value most recently set via the set
     * method.
     *
     * @return void
     *
     * @covers Position->floatValue()
     *
     */
    public function test_floatValue_returns_value_most_recently_set_via_the_set_method(): void
    {
        $newFloatValue = $this->randomFloat();
        $this->setExpectedInitialFloatValue($newFloatValue);
        $this->positionTestInstance()->set($newFloatValue);
        $this->assertEquals(
            $this->expectedInitialFloatValue(),
            $this->positionTestInstance()->floatValue(),
            $this->testFailedMessage(
               $this->positionTestInstance(),
               'flaotValue',
               'Test floatValue() returns value most recently set ' .
               'via the set method.'
            ),
        );
    }

    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertGreaterThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertLessThan(mixed $expected, mixed $actual, string $message = ''): void;
    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public function randomFloat(): float;

}

