<?php

namespace Darling\RoadyRoutes\tests\interfaces\routes;

use \Darling\PHPTextTypes\interfaces\collections\NameCollection;
use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath;
use \Darling\RoadyRoutes\interfaces\routes\Route;

/**
 * The RouteTestTrait defines common tests for implementations of the
 * Route interface.
 *
 * @see Route
 *
 */
trait RouteTestTrait
{

    /**
     * @var Route $route An instance of a Route implementation
     *                   to test.
     */
    private Route $route;

    /**
     * @var Name $expectedModuleName The Name that is expected
     *                               to be returned by the Route
     *                               implementation being tested's
     *                               moduleName() method.
     */
    private Name $expectedModuleName;

    /**
     * @var NameCollection $expectedNameCollection The NameCollection
     *                                             that is expected
     *                                             to be returned by
     *                                             the Route instance
     *                                             being tested's
     *                                             nameCollection()
     *                                             method.
     */
    private NameCollection $expectedNameCollection;

    /**
     * @var NamedPositionCollection $expectedNamedPositionCollection
     *                                   The NamedPositionCollection
     *                                   that is expected to be
     *                                   returned by the Route
     *                                   instance being tested's
     *                                   namedPositionCollection()
     *                                   method.
     */
    private NamedPositionCollection $expectedNamedPositionCollection;

    /**
     * @var RelativePath $expectedRelativePath The RelativePath that
     *                                         is expected to be
     *                                         returned by the Route
     *                                         instance being tested's
     *                                         relativePath() method.
     */
    private RelativePath $expectedRelativePath;

    /**
     * Set up an instance of a Route implementation to test.
     *
     * This method must set the Route implementation instance
     * to be tested via the setRouteTestInstance() method.
     *
     * This method must also set the NameCollection that is
     * expected to be returned by the Route instance being
     * tested's nameCollection() method via the
     * setExpectedNameCollection() method.
     *
     * This method must also set the NamedPositionCollection
     * that is expected to be returned by the Route instance
     * being tested's namedPositionCollection() method via
     * the setExpectedNamedPositionCollection() method.
     *
     * This method must also set the RelativePath that is
     * expected to be returned by the Route instance being
     * tested's relativePath() method via the
     * setExpectedRelativePath() method.
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
     *     $mockNameCollection = new MockClassInstance(
     *         new Reflection(
     *             new ClassString(NameCollection::class)
     *         )
     *     );
     *     $nameCollection = $mockNameCollection->mockInstance();
     *     $mockNamedPositionCollection = new MockClassInstance(
     *         new Reflection(
     *             new ClassString(NamedPositionCollection::class)
     *         )
     *     );
     *     $namedPositionCollection =
     *         $mockNamedPositionCollection->mockInstance();
     *     $mockRelativePath = new MockClassInstance(
     *         new Reflection(
     *             new ClassString(RelativePath::class)
     *         )
     *     );
     *     $relativePath = $mockRelativePath->mockInstance();
     *     if(
     *         $nameCollection instanceof NameCollection
     *         &&
     *         $namedPositionCollection instanceof NamedPositionCollection
     *         &&
     *         $relativePath instanceof RelativePath
     *     ) {
     *         $this->setExpectedNameCollection($nameCollection);
     *         $this->setExpectedNamedPositionCollection(
     *             $namedPositionCollection
     *         );
     *         $this->setExpectedRelativePath($relativePath);
     *         $this->setRouteTestInstance(
     *             new Route(
     *                 $nameCollection,
     *                 $namedPositionCollection,
     *                 $relativePath
     *             )
     *         );
     *     }
     * }
     *
     * ```
     *
     */
    abstract protected function setUp(): void;

    /**
     * Set the Route implementation instance to test.
     *
     * @param Route $routeTestInstance An instance of an
     *                                 implementation of
     *                                 the Route interface
     *                                 to test.
     *
     * @return void
     *
     */
    protected function setRouteTestInstance(
        Route $routeTestInstance
    ): void
    {
        $this->route = $routeTestInstance;
    }

    /**
     * Return the Route implementation instance to test.
     *
     * @return Route
     *
     */
    protected function routeTestInstance(): Route
    {
        return $this->route;
    }


    ###

    /**
     * Set the Name that is expected to be returned by the
     * Route instance being tested's moduleName() method.
     *
     * @param Name $name The Name that is expected to be returned by
     *                   the Route instance being tested's moduleName()
     *                   method.
     *
     * @return void
     *
     */
    protected function setExpectedModuleName(Name $name): void
    {
        $this->expectedModuleName = $name;
    }

    /**
     * Return the ModuleName that is expected to be returned by
     * the Route instance being tested's moduleName() method.
     *
     * @return Name
     *
     */
    protected function expectedModuleName(): Name
    {
        return $this->expectedModuleName;
    }

    ###
    /**
     * Set the NameCollection that is expected to be returned by the
     * Route instance being tested's nameCollection() method.
     *
     * @param NameCollection $nameCollection The NameCollection that
     *                                       is expected to be
     *                                       returned by the Route
     *                                       instance being tested's
     *                                       nameCollection() method.
     *
     * @return void
     *
     */
    protected function setExpectedNameCollection(
        NameCollection $nameCollection
    ): void
    {
        $this->expectedNameCollection = $nameCollection;
    }


    /**
     * Return the NameCollection that is expected to be returned by
     * the Route instance being tested's nameCollection() method.
     *
     * @return NameCollection
     *
     */
    protected function expectedNameCollection(): NameCollection
    {
        return $this->expectedNameCollection;
    }

    /**
     * Set the NamedPositionCollection that is expected
     * to be returned by the Route instance being tested's
     * namedPositionCollection() method.
     *
     * @param NamedPositionCollection $namedPositionCollection
     *                                    The NamedPositionCollection
     *                                    that is expected to be
     *                                    returned by the Route
     *                                    instance being tested's
     *                                    namedPositionCollection()
     *                                    method.
     *
     * @return void
     *
     */
    protected function setExpectedNamedPositionCollection(
        NamedPositionCollection $namedPositionCollection
    ): void
    {
        $this->expectedNamedPositionCollection =
            $namedPositionCollection;
    }

    /**
     * Return the NamedPositionCollection that is expected to be returned
     * by the Route instance being tested's namedPositionCollection()
     * method.
     *
     * @return NamedPositionCollection
     *
     */
    protected function expectedNamedPositionCollection(): NamedPositionCollection
    {
        return $this->expectedNamedPositionCollection;
    }

    /**
     * Set the RelativePath that is expected to be returned by the
     * Route instance being tested's relativePath() method.
     *
     * @param RelativePath $relativePath The RelativePath that
     *                                       is expected to be
     *                                       returned by the Route
     *                                       instance being tested's
     *                                       relativePath() method.
     *
     *
     * @return void
     *
     */
    protected function setExpectedRelativePath(
        RelativePath $relativePath
    ): void
    {
        $this->expectedRelativePath = $relativePath;
    }

    /**
     * Return the RelativePath that is expected to be returned by
     * the Route instance being tested's relativePath() method.
     *
     * @return RelativePath
     *
     */
    protected function expectedRelativePath(): RelativePath
    {
        return $this->expectedRelativePath;
    }

    /**
     * Test nameCollection() returns expected NameCollection.
     *
     * @return void
     *
     * @covers Route->nameCollection()
     *
     */
    public function test_nameCollection_returns_expected_NameCollection(): void
    {
        $this->assertEquals(
            $this->expectedNameCollection(),
            $this->routeTestInstance()->nameCollection(),
            $this->testFailedMessage(
                $this->routeTestInstance(),
                'nameCollection',
                'return the expected NameCollection'
            ),
        );
    }

    /**
     * Test namedPositionCollection() returns expected NamedPositionCollection.
     *
     * @return void
     *
     * @covers Route->namedPositionCollection()
     *
     */
    public function test_namedPositionCollection_returns_expected_NamedPositionCollection(): void
    {
        $this->assertEquals(
            $this->expectedNamedPositionCollection(),
            $this->routeTestInstance()->namedPositionCollection(),
            $this->testFailedMessage(
                $this->routeTestInstance(),
                'namedPositionCollection',
                'return the expected NamedPositionCollection'
            ),
        );
    }

    /**
     * Test relativePath() returns expected RelativePath.
     *
     * @return void
     *
     * @covers Route->relativePath()
     *
     */
    public function test_relativePath_returns_expected_RelativePath(): void
    {
        $this->assertEquals(
            $this->expectedRelativePath(),
            $this->routeTestInstance()->relativePath(),
            $this->testFailedMessage(
                $this->routeTestInstance(),
                'relativePath',
                'return the expected RelativePath'
            ),
        );
    }

    /**
     * Test moduleName returns expected module Name.
     *
     * @return void
     *
     * @covers Route->moduleName()
     *
     */
    public function test_moduleName_returns_expected_module_Name(): void
    {
        $this->assertEquals(
            $this->expectedModuleName(),
            $this->routeTestInstance()->moduleName(),
            $this->testFailedMessage(
                $this->routeTestInstance(),
                'moduleName',
                'return the expected module Name'
            ),
        );
    }

    abstract protected static function assertEquals(mixed $expected, mixed $actual, string $message = ''): void;
    abstract protected function testFailedMessage(object $object, string $method, string $message): string;

}

