<?php

namespace Darling\RoadyRoutes\classes\identifiers;

use \Darling\RoadyRoutes\interfaces\identifiers\NamedPosition as NamedPositionInterface;
use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;
use \Darling\RoadyRoutes\interfaces\settings\Position;

class NamedPosition implements NamedPositionInterface
{

    /**
     * Instantiate a new NamedPosition.
     *
     * @param PositionName $positionName The PositionName to assign to
     *                                   the NamedPosition.
     *
     * @param Position $position The Position to assign to the
     *                           NamedPosition.
     *
     */
    public function __construct(
        private PositionName $positionName, private Position $position
    ) {}

    /**
     * Return the PositionName of the Position.
     *
     * @return PositionName
     *
     */
    public function positionName(): PositionName
    {
        return $this->positionName;
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

