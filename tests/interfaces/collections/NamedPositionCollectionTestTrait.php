<?php

namespace Darling\RoadyRoutes\tests\interfaces\collections;

use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition;

/**
 * The NamedPositionCollectionTestTrait defines common tests for
 * implementations of the NamedPositionCollection interface.
 *
 * @see NamedPositionCollection
 *
 */
trait NamedPositionCollectionTestTrait
{

    /**
     * @var NamedPositionCollection $namedPositionCollection
     *                              An instance of a
     *                              NamedPositionCollection
     *                              implementation to test.
     */
    protected NamedPositionCollection $namedPositionCollection;

    /**
     * @var array<int, NamedPosition> The collection of NamedPositions
     *                                that is expected to be returned
     *                                by the NamedPositionCollection
     *                                being tested's collection()
     *                                method.
     *
     */
    private array $expectedCollection;

    /**
     * Set up an instance of a NamedPositionCollection
     * implementation to test.
     *
     * This method must set the NamedPositionCollection
     * implementation instance to be tested via the
     * setNamedPositionCollectionTestInstance() method.
     *
     * This method must also set the collection
     * of NamedPositions that is expected to be
     * returned by the NamedPositionCollection
     * being tested's collection() method via the
     * setNamedPositionCollectionTestInstance()
     * method.
     *
     * This method may also be used to perform any
     * additional setup required by the implementation
     * being tested.
     *
     * @return void
     *
     * @example
     *
     * ```
     * public function setUp(): void
     * {
     *     $mockNamedPosition = new MockClassInstance(
     *         new Reflection(new ClassString(NamedPosition::class))
     *     );
     *     $namedPositions = [];
     *     for($i = 0; $i < rand(0, 1000); $i++) {
     *         if(rand(0, 1000000) <= $this->randomLimit()) {
     *             break;
     *         }
     *         $mockInstance = $mockNamedPosition->mockInstance();
     *         if($mockInstance instanceof NamedPosition) {
     *             $namedPositions[] = $mockInstance;
     *         }
     *     }
     *     $this->setExpectedCollection($namedPositions);
     *     $this->setNamedPositionCollectionTestInstance(
     *         new NamedPositionCollection(...$namedPositions)
     *     );
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the NamedPositionCollection implementation instance
     * to test.
     *
     * @return NamedPositionCollection
     *
     */
    protected function namedPositionCollectionTestInstance(): NamedPositionCollection
    {
        return $this->namedPositionCollection;
    }

    /**
     * Set the NamedPositionCollection implementation instance
     * to test.
     *
     * @param NamedPositionCollection $namedPositionCollectionTestInstance
     *                              An instance of an
     *                              implementation of
     *                              the NamedPositionCollection
     *                              interface to test.
     *
     * @return void
     *
     */
    protected function setNamedPositionCollectionTestInstance(
        NamedPositionCollection $namedPositionCollectionTestInstance
    ): void
    {
        $this->namedPositionCollection = $namedPositionCollectionTestInstance;
    }

    /**
     * Set the collection of NamedPositions that is expected to be
     * returned by the NamedPositionCollection being tested's
     * collection() method.
     *
     * @param array<int, NamedPosition> $collection
     *                                      The collection of
     *                                      NamedPositions that
     *                                      is expected to be
     *                                      returned by the
     *                                      NamedPositionCollection
     *                                      being tested's
     *                                      collection() method.
     *
     * @return void
     *
     */
    private function setExpectedNamedPositionCollection(array $collection): void
    {
        $this->expectedCollection = $collection;
    }

    /**
     * Return the collection of NamedPositions that is expected to be
     * returned by the NamedPositionCollection being tested's
     * collection() method.
     *
     * @return array<int, NamedPosition>
     *
     */
    private function expectedNamedPositionCollection(): array
    {
        return $this->expectedCollection;
    }

    /**
     * Return a random integer to use a limit.
     *
     * Integer will be `0`, `1`, or a integer between `0` and `50000`.
     *
     * @return int
     *
     */
    protected function randomLimit(): int
    {
        $limits = [1, rand(0, 50000), 0];
        return $limits[array_rand($limits)];
    }

    /**
     * Set the array of NamedPosition instances that is expected to be
     * returned by the NamedPositionCollection instance being tested's
     * collection() method.
     *
     * @param array<int, NamedPosition> $collection
     *
     * @return void
     *
     */
    protected function setExpectedCollection(array $collection): void
    {
        $this->expectedCollection = $collection;
    }

    /**
     * Return the array of NamedPosition instances that is expected to be
     * returned by the NamedPositionCollection instance being tested's
     * collection() method.
     *
     * @return array<int, NamedPosition>
     *
     */
    protected function expectedCollection(): array
    {
        return $this->expectedCollection;
    }

    /**
     * Test collection returns the expected array of NamedPosition
     * instances.
     *
     * @return void
     *
     * @covers NamedPositionCollection->collection()
     *
     */
    public function test_collection_returns_the_expected_array_of_NamedPosition_instances(): void
    {

        $this->assertEquals(
            $this->expectedCollection(),
            $this->namedPositionCollectionTestInstance()->collection(),
            $this->testFailedMessage(
                $this->namedPositionCollectionTestInstance(),
                'collection',
                'return the expected array of NamedPosition instances'
            ),
        );
    }

    abstract protected static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $object, string $method, string $message): string;

}

