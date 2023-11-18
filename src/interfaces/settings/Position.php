<?php

namespace Darling\RoadyRoutes\interfaces\settings;

use \Stringable;

/**
 * A Position is a fixed-point number with up to three decimal places.
 *
 * A Positon's value can be set via the set() method.
 *
 * A Positon's value can be obtained as a float via the floatValue() method.
 *
 * A Positon's value can be obtained as a int via the intValue() method.
 *
 * A Positon's value can be obtained as a string via the __toString() method.
 *
 * A Positon can be increased by a factor of '0.001' via the
 * increasePosition() method.
 *
 * A positon can be decreased by a factor of '0.001' via the
 * decreasePosition() method.
 *
 */
interface Position extends Stringable
{
    /**
     * Return the Position's value as a float.
     *
     * @return float
     *
     */
    public function floatValue(): float;

    /**
     * Return the Position's value as an int.
     *
     * @return int
     *
     */
    public function intValue(): int;

    /**
     * Return the Position's value as a string.
     *
     * @return string
     *
     */
    public function __toString(): string;

    /**
     * Set the Position's float value.
     *
     * @param float|Position $newPosition A float or a Position to
     *                                    set as the new Position.
     *
     *                                    Note:
     *
     *                                    The assigned float will only
     *                                    contain up to three decimal
     *                                    places even if the specified
     *                                    $newPosition is contains
     *                                    more decimal places.
     * @return void
     *
     */
    public function set(float|Position $newPosition): void;

    /**
     * Increase the Position by a facotr of: 0.001
     *
     * @return void
     *
     */
    public function increasePosition(): void;

    /**
     * Decrease the Position by a facotr of: 0.001
     *
     * @return void
     *
     */
    public function decreasePosition(): void;

}
