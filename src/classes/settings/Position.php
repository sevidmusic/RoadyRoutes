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
        return rand(0, 100);
    }

    public function __toString(): string
    {
        return '';
    }

    public function set(float $position): void
    {

    }

    public function increasePosition(): void
    {

    }

    public function decreasePosition(): void
    {

    }

}

