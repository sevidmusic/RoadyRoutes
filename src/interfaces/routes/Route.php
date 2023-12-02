<?php

namespace Darling\RoadyRoutes\interfaces\routes;

use \Darling\PHPTextTypes\interfaces\collections\NameCollection;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath;
use \Darling\PHPTextTypes\interfaces\strings\Name;

/**
 * A Route defines the relationship between a NameCollection,
 * a NamedPositionCollection, and a RelativePath.
 *
 */
interface Route
{

    /**
     * Return the Name of the module this Route is defined by.
     *
     * @return Name
     *
     */
    public function moduleName(): Name;

    /**
     * Return the assigned NameCollection.
     *
     * @return NameCollection
     *
     */
    public function nameCollection(): NameCollection;

    /**
     * Return the assigned NamedPositionCollection.
     *
     * @return NamedPositionCollection
     *
     */
    public function namedPositionCollection(): NamedPositionCollection;

    /**
     * Return the assigned RelativePath.
     *
     * @return RelativePath
     *
     */
    public function relativePath(): RelativePath;

}

