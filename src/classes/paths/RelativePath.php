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
        $safeTextCollection = $this->safeTextCollection();
        foreach ($safeTextCollection->collection() as $key => $safeText) {
            $string .= match(
                $key === array_key_last($safeTextCollection->collection())
            ) {
                 true => $safeText->__toString(),
                 default => $safeText->__toString() . DIRECTORY_SEPARATOR,
            };
        }
        return $string;
    }
}

