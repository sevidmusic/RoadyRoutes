<?php

namespace Darling\RoadyRoutes\classes\identifiers;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition as NamedPositionInterface;
use \Darling\RoadyRoutes\interfaces\settings\Position;

class NamedPosition implements NamedPositionInterface
{

    /**
     * Instantiate a new NamedPosition.
     *
     * @param Name $name The name to assign to the NamedPosition.
     *
     * @param Position $position The Position to assign to the
     *                           NamedPosition.
     *
     */
    public function __construct(
        private Name $name, private Position $position
    ) {}

    /**
     * Return the Name of the Position.
     *
     * @return Name
     *
     */
    public function name(): Name
    {
        return $this->name;
    }


    /**
     * Return the Position.
     *
     * @return Position
     *
     */
    public function position(): Position
    {
        return $this->position;
    }
}

