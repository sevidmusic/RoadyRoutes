<?php

namespace Darling\RoadyRoutes\tests\interfaces\collections;

use \Darling\RoadyRoutes\interfaces\collections\PositionNameCollection;
use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;

/**
 * The PositionNameCollectionTestTrait defines common tests for
 * implementations of the PositionNameCollection interface.
 *
 * @see PositionNameCollection
 *
 */
trait PositionNameCollectionTestTrait
{

    /**
     * @var PositionNameCollection $positionNameCollection
     *                                An instance of a
     *                                PositionNameCollection
     *                                implementation to test.
     */
    private PositionNameCollection $positionNameCollection;

    /**
     * @var array<int, PositionName> $expectedCollection
     */
    private $expectedCollection;

    /**
     * Set up an instance of a PositionNameCollection implementation
     * to test.
     *
     * This method must set the PositionNameCollection
     * implementation instance to be tested via the
     * setPositionNameCollectionTestInstance() method.
     *
     * This method must also set the array of PositionName instances
     * that is expected to be returned by the PositionNameCollection
     * instance being tetsted's collection() method via the
     * setExpectedCollection() method.
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
     *     $positionNames = [];
     *     for($i = 0; $i < rand(0, 100); $i++) {
     *         $positionNames[] = new PositionName(
     *             new Name(
     *                 new Text($this->randomChars())
     *             )
     *         );
     *     }
     *     $this->setExpectedCollection($positionNames);
     *     $this->setPositionNameCollectionTestInstance(
     *         new PositionNameCollection(...$positionNames)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the PositionNameCollection implementation instance
     * to test.
     *
     * @return PositionNameCollection
     *
     */
    protected function positionNameCollectionTestInstance(): PositionNameCollection
    {
        return $this->positionNameCollection;
    }

    /**
     * Set the PositionNameCollection implementation instance to test.
     *
     * @param PositionNameCollection $positionNameCollectionTestInstance
     *                                   An instance of an
     *                                   implementation of the
     *                                   PositionNameCollection
     *                                   interface to test.
     *
     * @return void
     *
     */
    protected function setPositionNameCollectionTestInstance(
        PositionNameCollection $positionNameCollectionTestInstance
    ): void
    {
        $this->positionNameCollection = $positionNameCollectionTestInstance;
    }

    /**
     * Set the array of PositionName instances that is expected to be
     * returned by the PositionNameCollection instance being tested's
     * collection() method.
     *
     * @param array<int, PositionName> $collection
     *
     * @return void
     *
     */
    protected function setExpectedCollection(array $collection): void
    {
        $this->expectedCollection = $collection;
    }

    /**
     * Return the array of PositionName instances that is expected
     * to be returned by the PositionNameCollection instance being
     * tested's collection() method.
     *
     * @return array<int, PositionName>
     *
     */
    protected function expectedCollection(): array
    {
        return $this->expectedCollection;
    }


    /**
     * Test collection returns the expected array of PoisitionNames.
     *
     * @return void
     *
     * @covers PositionNameCollection->collection()
     *
     */
    public function test_collection_returns_the_expected_array_of_PoisitionNames(): void
    {
        $this->assertEquals(
            $this->expectedCollection(),
            $this->positionNameCollectionTestInstance()->collection(),
            $this->testFailedMessage(
                $this->positionNameCollectionTestInstance(),
                'collection',
                'return the expected array of PositionName instances.'
            ),
        );
    }

    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

