<?php

namespace Darling\RoadyRoutes\interfaces\identifiers;

use \Darling\RoadyRoutes\interfaces\identifiers\PositionName;
use \Darling\RoadyRoutes\interfaces\settings\Position;

/**
 * A NamedPosition assoiciates a PositionName with a Position.
 */
interface NamedPosition
{


    /**
     * Return the PositionName.
     *
     * @return PositionName
     *
     */
    public function positionName(): PositionName;


    /**
     * Return the Position.
     *
     * @return Position
     *
     */
    public function position(): Position;

}
