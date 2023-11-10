# Roady Routes

The Roady Routes library provides classes for working with
and defining Routes for Roady.

A Route defines the relationship between collection of names,
a collection of named positions, and a relative path to a resource.

@see [Roady2.0](https://github.com/sevidmusic/roady)

# Overview

- [Installation](#installation)
- [Route](darlingroadyroutesinterfacesroutesroute)
- [RelativePathToAResource](darlingroadyroutesinterfacespathsrelativepathtoaresource)
- [NamedPosition](darlingroadyroutesinterfacesidentifiersnamedposition)
- [NamedPositionCollection](darlingroadyroutesinterfacescollectionsnamedpositioncollection)
- [PositionName](darlingroadyroutesinterfacesidentifierspositionname)
- [RouteCollection](darlingroadyroutesinterfacescollectionsroutecollection)
- [CollectionOfRoutesSortedByNamedPosition](darlingroadyroutesinterfacescollectionscollectionofroutessortedbynamedposition)

# Installation

```
composer require darling/roady-routes
```

### \Darling\RoadyRoutes\interfaces\routes\Route

For example:

```
<?php

namespace \Darling\RoadyRoutes\interfaces\routes;

use \Darling\RoadyRoutes\interfaces\paths\RelativePathToAResource;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\PHPTextTypes\interfaces\collections\NameCollection;

/**
 * A Route defines the relationship between a collection of Names,
 * a collection of NamedPositions, and a RelativePathToAResource.
 *
 */
interface Route
{

    public function namedPositions(): NamedPositionCollection;
    public function names(): NameCollection;
    public function relativePathToAResource(): RelativePathToAResource;

}

```

### \Darling\RoadyRoutes\interfaces\paths\RelativePathToAResource

```
<?php

namespace \Darling\RoadyRoutes\interfaces\paths;

use \Stringable;

/**
 * An RelativePathToAResource defines a relative path to a file or directory.
 *
 * A RelativePathToAResource's value will be a string that consists of a sequence of
 * characters that begins with an alphanumeric character and is
 * followed by any combination of letters [a-z], digits [0-9],
 * periods (.), slashes (/), underscores (_), or hyphens (-).
 *
 * The complete RelativePathToAResource can be obtained via the __toString()
 * method.
 *
 */
interface RelativePathToAResource extends Stringable
{
    public function __toString(): string;
}

```

### \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition

```
<?php

namespace \Darling\RoadyRoutes\interfaces\identifiers;

/**
 *
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
 *
 */
interface NamedPositionCollection
{
    /**
     * @return array<int, NamedPosition>
     */
    public function namedPositions(): array;

}

```

### \Darling\RoadyRoutes\interfaces\identifiers\PositionName

```
<?php

namespace \Darling\RoadyRoutes\interfaces\identifiers;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Stringable;

/**
 * PositionName is a Name that begins with an alphanumeric
 * character, ends with an alphanumeric character, is all
 * lowercase, must contain at least one hypen (-), and may
 * only contian the following characters:
 *
 * - Alphanumeric characters: A-Z, a-z, and 0-9
 * - Hyphens: -
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

### \Darling\RoadyRoutes\interfaces\collections\RouteCollection

```
<?php

namespace \Darling\RoadyRoutes\interfaces\collections;

/**
 *
 */
interface RouteCollection
{
    /**
     * @return array<int, Route>
     */
    public function routes(): array;

}

```

### \Darling\RoadyRoutes\interfaces\collections\CollectionOfRoutesSortedByNamedPosition

```
<?php

namespace \Darling\RoadyRoutes\interfaces\collections;

/**
 *
 */
interface CollectionOfRoutesSortedByNamedPosition
{
    /**
     * @return array<string, array<int, Route>>
     */
    public function routesSortedByNamedPosition(): array;

}

```
