<?php

namespace Darling\RoadyRoutes\tests\interfaces\paths;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath;

/**
 * The RelativePathTestTrait defines common tests for implementations
 * of the RelativePath interface.
 *
 * @see RelativePath
 *
 */
trait RelativePathTestTrait
{

    /**
     * @var RelativePath $relativePath An instance of a RelativePath
     * implementation to test.
     */
    protected RelativePath $relativePath;


    /**
     * @var SafeTextCollection $expectedSafeTextCollection
     *                                  The SafeTextCollection
     *                                  that is expected to
     *                                  be returned by the
     *                                  RelativePath instance being
     *                                  tested's safeTextCollection()
     *                                  method.
     */
    protected SafeTextCollection $expectedSafeTextCollection;

    /**
     * Set up an instance of a RelativePath implementation to test.
     *
     * This method must set the RelativePath implementation instance
     * to be tested via the setRelativePathTestInstance() method.
     *
     * This method must also set the SafeTextCollection
     * instance that is expected to be returned by the
     * RelativePath being tested's safeTextCollection() method
     * via the setExpectedSafeTextCollection() method.
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
     *     $safeTextCollection = new SafeTextCollection(
     *         new SafeText(new Text($this->randomChars()))
     *     );
     *     $this->setExpectedSafeTextCollection($safeTextCollection);
     *     $this->setRelativePathTestInstance(new RelativePath($safeTextCollection));
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Return the RelativePath implementation instance to test.
     *
     * @return RelativePath
     *
     */
    protected function relativePathTestInstance(): RelativePath
    {
        return $this->relativePath;
    }

    /**
     * Set the RelativePath implementation instance to test.
     *
     * @param RelativePath $relativePathTestInstance An instance of an implementation
     *                              of the RelativePath interface to test.
     *
     * @return void
     *
     */
    protected function setRelativePathTestInstance(
        RelativePath $relativePathTestInstance
    ): void
    {
        $this->relativePath = $relativePathTestInstance;
    }

    /**
     * Set the SafeTextCollection that is expected to be returned
     * by the RelativePath instance being tested's safeTextCollection()
     * method.
     *
     * @param SafeTextCollection $safeTextCollection
     *                                          The SafeTextCollection
     *                                          instance that is
     *                                          expected to be
     *                                          returned by the
     *                                          RelativePath instance
     *                                          being tested's
     *                                          safeTextCollection()
     *                                          method.
     *
     * @return void
     *
     */
    protected function setExpectedSafeTextCollection(SafeTextCollection $safeTextCollection): void
    {
        $this->expectedSafeTextCollection = $safeTextCollection;
    }

    /**
     * Return the SafeTextCollection that is expected to be returned
     * by the safeTextCollection() method.
     *
     * @return SafeTextCollection
     *
     */
    protected function expectedSafeTextCollection(): SafeTextCollection
    {
        return $this->expectedSafeTextCollection;
    }

    /**
     * Return the string that is expected to be returned
     * by the RelativePath instance being tested's __toStiring()
     * method.
     *
     * The string should be constructed by concatenating the
     * SafeText instances in the expected SafeTextCollection
     * with a DIRECTORY_SEPARATOR.
     *
     * @return string
     *
     */
    private function expectedString(): string
    {
        $string = '';
        $safeTextCollection = $this->expectedSafeTextCollection();
        foreach ($safeTextCollection->collection() as $key => $safeText) {
            $string .= match(
                $key === array_key_last($safeTextCollection->collection())
            ) {
                 true => $safeText->__toString(),
                 default => $safeText->__toString() . DIRECTORY_SEPARATOR,
            };
        }
        return $string;
    }

    /**
     * Test that the safeTextCollection() method returns the expected
     * SafeTextCollection.
     *
     * @return void
     *
     * @covers RelativePath->safeTextCollection()
     */
    public function test_safeTextCollection_returns_the_expected_SafeTextCollection(): void
    {
        $this->assertEquals(
            $this->expectedSafeTextCollection(),
            $this->relativePathTestInstance()->safeTextCollection(),
            $this->testFailedMessage(
                $this->relativePathTestInstance(),
                'safeTextCollection',
                'return the expected SafeTextCollection'
            ),
        );
    }

    /**
     * Test that the __toString() method returns the expected string.
     *
     * The string should be constructed by concatenating the
     * SafeText instances in the expected SafeTextCollection
     * with a DIRECTORY_SEPARATOR.
     *
     * @return void
     *
     * @covers RelativePath->__toString()
     */
    public function test___toString_returns_the_expected_string(): void
    {
        $this->assertEquals(
            $this->expectedString(),
            $this->relativePathTestInstance()->__toString(),
            $this->testFailedMessage(
                $this->relativePathTestInstance(),
                '__toString',
                'return the expected string'
            ),
        );
    }

    abstract public static function assertTrue(bool $condition, string $message = ''): void;
    abstract public static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $testedInstance, string $testedMethod, string $expectation): string;

}

