<?php

namespace Darling\RoadyRoutes\interfaces\identifiers;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Darling\RoadyRoutes\interfaces\settings\Position;

/**
 * A NamedPosition assoiciates a Name with a Position.
 */
interface NamedPosition
{


    /**
     * Return the Name of the Position.
     *
     * @return Name
     *
     */
    public function name(): Name;


    /**
     * Return the Position.
     *
     * @return Position
     *
     */
    public function position(): Position;

}
