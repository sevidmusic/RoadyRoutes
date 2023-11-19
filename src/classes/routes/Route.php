<?php

namespace Darling\RoadyRoutes\classes\routes;

use \Darling\RoadyRoutes\interfaces\paths\RelativePath;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\routes\Route as RouteInterface;
use \Darling\PHPTextTypes\interfaces\collections\NameCollection;

class Route implements RouteInterface
{

    public function __construct(
        private NameCollection $nameCollection,
        private NamedPositionCollection $namedPositionCollection,
        private RelativePath $relativePath,
    ) { }

    public function nameCollection(): NameCollection
    {
        return $this->nameCollection;
    }

    public function namedPositionCollection(): NamedPositionCollection
    {
        return $this->namedPositionCollection;
    }

    public function relativePath(): RelativePath
    {
        return $this->relativePath;
    }

}

