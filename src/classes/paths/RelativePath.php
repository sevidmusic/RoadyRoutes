<?php

namespace Darling\RoadyRoutes\classes\paths;

use \Darling\PHPTextTypes\interfaces\collections\SafeTextCollection;
use \Darling\RoadyRoutes\interfaces\paths\RelativePath as RelativePathInterface;

final class RelativePath implements RelativePathInterface
{


    public function __construct(
        private SafeTextCollection $safeTextCollection
    ) { }

    public function safeTextCollection(): SafeTextCollection
    {
        return $this->safeTextCollection;
    }

    public function __toString(): string
    {
        $string = '';
        foreach ($this->safeTextCollection()->collection() as $safeText) {
            $string .= $safeText->__toString() . DIRECTORY_SEPARATOR;
        }
        return $string;
    }
}

