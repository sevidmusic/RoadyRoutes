<?php

namespace Darling\RoadyRoutes\tests\classes\paths;

use \Darling\PHPTextTypes\classes\collections\SafeTextCollection;
use \Darling\PHPTextTypes\classes\strings\SafeText;
use \Darling\PHPTextTypes\classes\strings\Text;
use \Darling\RoadyRoutes\classes\paths\RelativePath;
use \Darling\RoadyRoutes\tests\RoadyRoutesTest;
use \Darling\RoadyRoutes\tests\interfaces\paths\RelativePathTestTrait;

class RelativePathTest extends RoadyRoutesTest
{

    /**
     * The RelativePathTestTrait defines common tests for implementations of
     * the Darling\RoadyRoutes\interfaces\paths\RelativePath
     * interface.
     *
     * @see RelativePathTestTrait
     *
     */
    use RelativePathTestTrait;

    public function setUp(): void
    {
        $safeTextCollection = new SafeTextCollection(
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
            new SafeText(new Text('-' . $this->randomChars())),
        );
        $this->setExpectedSafeTextCollection($safeTextCollection);
        $this->setRelativePathTestInstance(new RelativePath($safeTextCollection));
    }
}

