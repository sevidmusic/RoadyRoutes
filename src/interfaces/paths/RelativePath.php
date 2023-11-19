<?php

namespace Darling\RoadyRoutes\interfaces\paths;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Stringable;

/**
 * An RelativePath is a part of a Url.
 *
 * A RelativePath's value will be a string that consists of a sequence of
 * characters that begins with an alphanumeric character and is
 * followed by any combination of letters [a-z], digits [0-9],
 * periods (.), slashes (/), underscores (_), or hyphens (-).
 *
 * A RelativePath is made up of a collection of SafeText strings that
 * are concatenated together by using a DIRECTORY_SEPARATOR.
 *
 * The complete RelativePath can be obtained via the __toString() method.
 *
 * The collection of SafeText strings can be obtained via the
 * safeTextCollection() method.
 *
 */
interface RelativePath extends Stringable
{

    public function safeTextCollection(): SafeTextCollection;


    public function __toString(): string;

}

