<?php

namespace Darling\RoadyRoutes\tests\interfaces\identifiers;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition;
use \Darling\RoadyRoutes\interfaces\settings\Position;

/**
 * The NamedPositionTestTrait defines common tests for implementations
 * of the NamedPosition interface.
 *
 * @see NamedPosition
 *
 */
trait NamedPositionTestTrait
{

    /**
     * @var NamedPosition $namedPosition An instance of a
     *                                   NamedPosition
     *                                   implementation to test.
     */
    protected NamedPosition $namedPosition;


    /**
     * @var Name $expectedName The Name that is expected to be
     *                         returned by the NamedPosition being
     *                         tested's name() method.
     */
    private Name $expectedName;

    /**
     * @var Position $expectedPosition The Position that is expected
     *                                 to be returned by the
     *                                 NamedPosition being tested's
     *                                 position() method.
     */
    private Position $expectedPosition;

    /**
     * Set up an instance of a NamedPosition implementation to test.
     *
     * This method must set the NamedPosition implementation instance
     * to be tested via the setNamedPositionTestInstance() method.
     *
     * This method must also set the Name that is expected to be
     * returned by the NamedPosition being tested's name() method
     * via the setExpectedName() method.
     *
     * This method must also set the Position that is expected to be
     * returned by the NamedPosition being tested's position() method.
     * via the setExpectedPosition() method.
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
     *     $name = new Name(new Text($this->randomChars()));
     *     $position = new Position($this->randomFloat());
     *     $this->setExpectedName($name);
     *     $this->setExpectedPosition($position);
     *     $this->setNamedPositionTestInstance(
     *         new NamedPosition($name, $position)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the NamedPosition implementation instance to test.
     *
     * @return NamedPosition
     *
     */
    protected function namedPositionTestInstance(): NamedPosition
    {
        return $this->namedPosition;
    }

    /**
     * Set the NamedPosition implementation instance to test.
     *
     * @param NamedPosition $namedPositionTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the NamedPosition
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setNamedPositionTestInstance(
        NamedPosition $namedPositionTestInstance
    ): void
    {
        $this->namedPosition = $namedPositionTestInstance;
    }

    /**
     * Set the Name that is expected to be returned by the
     * NamedPosition being tested's name() method.
     *
     * @param Name $name The Name that is expected to be returned by
     *                   the NamedPosition being tested's name()
     *                   method.
     *
     * @return void
     *
     */
    protected function setExpectedName(Name $name): void
    {
        $this->expectedName = $name;
    }

    /**
     * Return the Name that is expected to be returned by the
     * NamedPosition being tested's name() method.
     *
     * @return Name
     *
     */
    protected function expectedName(): Name
    {
        return $this->expectedName;
    }

    /**
     * Set the Position that is expected to be returned by the
     * NamedPosition being tested's position() method.
     *
     * @param Position $position The Position that is expected to be
     *                           returned by the NamedPosition being
     *                           tested's position() method.
     *
     * @return void
     *
     */
    protected function setExpectedPosition(Position $position): void
    {
        $this->expectedPosition = $position;
    }

    /**
     * Return the Position that is expected to be returned by the
     * NamedPosition being tested's position() method.
     *
     * @return Position
     *
     */
    protected function expectedPosition(): Position
    {
        return $this->expectedPosition;
    }

    /**
     * Test name() returns the expected Name.
     *
     * @covers NamedPosition->name()
     *
     */
    public function test_name_returns_expected_name(): void
    {
        $this->assertEquals(
            $this->expectedName(),
            $this->namedPositionTestInstance()->name(),
            $this->testFailedMessage(
                $this->namedPositionTestInstance(),
                'name',
                'return the expected name'
            ),
        );
    }

    /**
     * Test position() returns the expected position.
     *
     * @covers NamedPosition->position()
     *
     */
    public function test_position_returns_expected_position(): void
    {
        $this->assertEquals(
            $this->expectedPosition(),
            $this->namedPositionTestInstance()->position(),
            $this->testFailedMessage(
                $this->namedPositionTestInstance(),
                'position',
                'return the expected position'
            ),
        );
    }

    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

