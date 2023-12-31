<?php

namespace Darling\RoadyRoutes\classes\routes;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\PHPTextTypes\interfaces\collections\NameCollection;
use \Darling\RoadyRoutes\interfaces\collections\NamedPositionCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath;
use \Darling\RoadyRoutes\interfaces\routes\Route as RouteInterface;

class Route implements RouteInterface
{

    public function __construct(
        private Name $moduleName,
        private NameCollection $nameCollection,
        private NamedPositionCollection $namedPositionCollection,
        private RelativePath $relativePath,
    ) { }

    public function moduleName(): Name
    {
        return $this->moduleName;
    }

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

