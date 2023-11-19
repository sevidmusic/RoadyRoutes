<?php

namespace Darling\RoadyRoutes\classes\collections;

use \Darling\RoadyRoutes\interfaces\collections\RouteCollection as RouteCollectionInterface;
use \Darling\RoadyRoutes\interfaces\routes\Route;

class RouteCollection implements RouteCollectionInterface
{

    /**
     * @var array<int, Route> $routes
     */
    private array $routes = [];

    public function __construct(Route ...$routes) {
        foreach($routes as $route) {
            $this->routes[] = $route;
        }
    }

    public function collection(): array
    {
        return $this->routes;
    }

}

