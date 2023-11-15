# Roady Routes

The Roady Routes library provides classes for working with
and defining Routes for Roady.

A Route defines the relationship between NameCollection,
a NamedPositionCollection, and a RelativePath.

@see [Roady2.0](https://github.com/sevidmusic/roady)

# Overview

- [Installation](#installation)
- [Route](darlingroadyroutesinterfacesroutesroute)
- [RelativePath](darlingroadyroutesinterfacespathsrelativepath)
- [NamedPosition](darlingroadyroutesinterfacesidentifiersnamedposition)
- [NamedPositionCollection](darlingroadyroutesinterfacescollectionsnamedpositioncollection)
- [PositionName](darlingroadyroutesinterfacesidentifierspositionname)
- [RouteCollection](darlingroadyroutesinterfacescollectionsroutecollection)
- [CollectionOfRoutesSortedByNamedPosition](darlingroadyroutesinterfacescollectionscollectionofroutessortedbynamedposition)

# Installation

```
composer require darling/roady-routes
```

### \Darling\RoadyRoutes\interfaces\identifiers\PositionName

```
<?php

namespace \Darling\RoadyRoutes\interfaces\identifiers;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Stringable;

/**
 * A PositionName is a Name that begins with an alphanumeric
 * character, ends with an alphanumeric character, is all lowercase,
 * must contain at least one hypen (-), and may only contian the
 * following characters:
 *
 * - Alphanumeric characters: A-Z, a-z, and 0-9
 * - Hyphens: -
 *
 * The requriment for a hypes exists so that a PositionName can
 * be mapped to custom html tags.
 *
 * For example, if the PostionName is `foo-bar` then it could be
 * mapped to the custom html tag `<foo-bar></foo-bar>`.
 *
 * @see https://html.spec.whatwg.org/multipage/custom-elements.html#valid-custom-element-name
 *
 * Also note:
 *
 * A PositionName may not contain a consecutive sequence of 2 or more
 * hyphens, only single hyphens are allowed.
 *
 * A PositionName may not be empty.
 *
 * A PositionName must be between 3 and 30 characters in length.
 *
 */
interface PositionName extends Stringable
{

    public function Name(): Name;

    public function __toString(): string;

}

```
# Implement `\Darling\RoadyRoutes\interfaces\settings\Position`

```
<?php

namespace \Darling\RoadyRoutes\interfaces\settings;

use \Stringable;

/**
 * A Position is a fixed-point number with up to three decimal places.
 *
 * A Positon's value can be set via the set() method.
 *
 * A Positon's value can be obtained as a float via the floatValue() method.
 *
 * A Positon's value can be obtained as a int via the intValue() method.
 *
 * A Positon's value can be obtained as a string via the __toString() method.
 *
 * A Positon can be increased by a factor of '0.001' via the
 * increasePosition() method.
 *
 * A positon can be decreased by a factor of '0.001' via the
 * decreasePosition() method.
 *
 */
interface Position extends Stringable
{
    /**
     * Return the Position's value as a float.
     *
     * @return float
     *
     */
    public function floatValue(): float;

    /**
     * Return the Position's value as an int.
     *
     * @return int
     *
     */
    public function intValue(): int;

    /**
     * Return the Position's value as a string.
     *
     * @return string
     *
     */
    public function __toString(): string;

    /**
     * Set the Position's value.
     * Note: The assigined float will only contain up to three
     * decimal places even if the specified float is larger.
     *
     * @param float $position The float to assign to the Position.
     *
     * @return void
     *
     */
    public function set(float $position): void;

    /**
     * Increase the Position by a facotr of: 0.001
     *
     * @return void
     *
     */
    public function increasePosition(): void;

    /**
     * Decrease the Position by a facotr of: 0.001
     *
     * @return void
     *
     */
    public function decreasePosition(): void;

}

```
### \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition

```
<?php

namespace \Darling\RoadyRoutes\interfaces\identifiers;

/**
 * A NamedPosition assoiciates a Name with a Position.
 */
interface NamedPosition
{
    public function positionName(): PositionName;
    public function position(): Position;
}

```

### \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection

```
<?php

namespace \Darling\RoadyRoutes\interfaces\collections;

/**
 * A NamedPositionCollection defines a collection of NamedPositions.
 */
interface NamedPositionCollection
{
    /**
     * Return a numerically indexed array of NamedPositions.
     *
     * @return array<int, NamedPosition>
     *
     */
    public function collection(): array;

}

```
# Implement `\Darling\RoadyRoutes\interfaces\paths\RelativePath`

```
<?php

namespace \Darling\RoadyRoutes\interfaces\paths;

use \Stringable;

/**
 * An RelativePath defines a relative path to a file or
 * directory.
 *
 * A RelativePath's value will be a string that consists
 * of a sequence of characters that begins with an alphanumeric
 * character and is followed by any combination of letters [a-z],
 * digits [0-9], periods (.), slashes (/), underscores (_), or
 * hyphens (-).
 *
 * The complete RelativePath can be obtained via the
 * __toString() method.
 *
 */
interface RelativePath extends Stringable
{
    public function __toString(): string;
}

```
### \Darling\RoadyRoutes\interfaces\routes\Route

For example:

```
<?php

namespace \Darling\RoadyRoutes\interfaces\routes;

use \Darling\RoadyRoutes\interfaces\paths\RelativePath;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\PHPTextTypes\interfaces\collections\NameCollection;

/**
 * A Route defines the relationship between a collection of Names,
 * a collection of NamedPositions, and a RelativePath.
 *
 */
interface Route
{

    public function namedPositions(): NamedPositionCollection;
    public function names(): NameCollection;
    public function relativePath(): RelativePath;

}

```
### \Darling\RoadyRoutes\interfaces\collections\RouteCollection

```
<?php

namespace \Darling\RoadyRoutes\interfaces\collections;

/**
 * A RouteCollection defines a collection of Routes.
 *
 */
interface RouteCollection
{
    /**
     * Return a numerically indexed array of Routes.
     *
     * @return array<int, Route>
     *
     */
    public function collection(): array;

}

```

### \Darling\RoadyRoutes\interfaces\collections\RouteCollectionSorter

```
<?php

namespace \Darling\RoadyRoutes\interfaces\collections;

/**
 * A RouteCollectionSorter defines methods that can be used to sort
 * a collection of Routes.
 *
 * At the moment this interface only defines one method. In the future
 * other methods may be added if more sorting methods are needed.
 *
 */
interface RouteCollectionSorter
{
    /**
     * Return a multi-dimensional array of Routes sorted by
     * NamedPosition.
     *
     * The Routes will be indexed first by PositionName, and then
     * by Position.
     *
     * For example: `[ PositionName => [Position => Route], ... ]`
     *
     * If two or more Routes in the RouteCollection being sorted share
     * the same PositionName and Position then the indexes of each
     * Route my be larger than it's actual Position by a factor
     * of `0.001`. This is to allow multiple Routes with the same
     * PositionName and Positon to exist in the returned array.
     *
     * @return array<string, array<string, Route>>
     *
     */
    public function sortByNamedPosition(RouteCollection $routeCollection): array;

}

```

