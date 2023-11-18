<?php

namespace Darling\RoadyRoutes\classes\settings;

use \Darling\RoadyRoutes\interfaces\settings\Position as PositionInterface;

class Position implements PositionInterface
{

    public function __construct(private float $float) { }

    public function floatValue(): float
    {
        return $this->float;
    }

    public function intValue(): int
    {
        return intval($this->floatValue());
    }

    public function __toString(): string
    {
        return strval($this->floatValue());
    }

    public function set(float|PositionInterface $newPosition): void
    {
        $this->float = (
            is_float($newPosition)
            ? $newPosition
            : $newPosition->floatValue()
        );
    }

    public function increasePosition(): void
    {

    }

    public function decreasePosition(): void
    {

    }

}

