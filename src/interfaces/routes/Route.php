<?php

namespace Darling\RoadyRoutes\interfaces\routes;

use \Darling\PHPTextTypes\interfaces\collections\NameCollection;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath;

/**
 * A Route defines the relationship between a NameCollection,
 * a NamedPositionCollection, and a RelativePath.
 *
 */
interface Route
{

    public function nameCollection(): NameCollection;


    public function namedPositionCollection(): NamedPositionCollection;

    public function relativePath(): RelativePath;

}

