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
     * This method must set the Position implementation instance
     * to be tested via the setPositionTestInstance() method.
     *
     * This method must also set the flaot value that is expected
     * to be initially assigned to the Position instance being
     * tested via the setExpectedInitialFloatValue() method.
     *
     * This method may also be used to perform any additional setup
     * required by the implementation being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     *
     * public function setUp(): void
     * {
     *     $initalFloatValue = $this->randomFloat();
     *     $this->setExpectedInitialFloatValue($initalFloatValue);
     *     $this->setPositionTestInstance(new Position($initalFloatValue));
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

    /**
     * Test intValue() returns the int value of the float returned by
     * the floatValue() method.
     *
     * @return void
     *
     * @covers Position->intValue()
     *
     */
    public function test_intValue_returns_the_int_value_of_the_float_returned_by_the_floatValue_method(): void
    {
        $this->assertEquals(
            intval($this->positionTestInstance()->floatValue()),
            $this->positionTestInstance()->intValue(),
            $this->testFailedMessage(
               $this->positionTestInstance(),
               'intValue',
               'Test intValue() returns the int value of the ' .
               'float returned by the floatValue() method.'
            ),
        );
    }

    /**
     * Test __toString() returns the string value of the float
     * returned by the floatValue() method.
     *
     * @return void
     *
     * @covers Position->__toString()
     *
     */
    public function test___toString_returns_the_string_value_of_the_float_returned_by_the_floatValue_method(): void
    {
        $this->assertEquals(
            strval($this->positionTestInstance()->floatValue()),
            $this->positionTestInstance()->__toString(),
            $this->testFailedMessage(
               $this->positionTestInstance(),
               '__toString',
               'Test __toString() returns the string value of the ' .
               'float returned by the floatValue() method.'
            ),
        );
    }


    /**
     * Test increase position increases position by point `0.001`.
     *
     * @return void
     *
     * @covers Position->__toString()
     *
     */
    public function test_increase_position_increases_position_by_point_001(): void
    {
        $this->setExpectedInitialFloatValue(
            $this->expectedInitialFloatValue() + 0.001
        );
        $this->positionTestInstance()->increasePosition();
        $this->assertEquals(
            $this->expectedInitialFloatValue(),
            $this->positionTestInstance()->floatValue(),
            $this->testFailedMessage(
               $this->positionTestInstance(),
               'increasePosition',
               'Test increase position increases position by ' .
               'point `0.001`.'
            ),
        );
    }

    /**
     * Test decrease position decreases position by point `0.001`.
     *
     * @return void
     *
     * @covers Position->__toString()
     *
     */
    public function test_decrease_position_decreases_position_by_point_001(): void
    {
        $this->setExpectedInitialFloatValue(
            $this->expectedInitialFloatValue() - 0.001
        );
        $this->positionTestInstance()->decreasePosition();
        $this->assertEquals(
            $this->expectedInitialFloatValue(),
            $this->positionTestInstance()->floatValue(),
            $this->testFailedMessage(
               $this->positionTestInstance(),
               'decreasePosition',
               'Test decrease position decreases position by ' .
               'point `0.001`.'
            ),
        );
    }

    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;
    abstract public function randomFloat(): float;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;

}

