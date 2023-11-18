<?php

namespace Darling\RoadyRoutes\interfaces\identifiers;

use \Darling\PHPTextTypes\interfaces\strings\Name;
use \Stringable;

/**
 * A PositionName is a Name that begins with an alphanumeric
 * character, ends with an alphanumeric character, is all lowercase,
 * must contain at least one hypen (-), and may only contian the
 * following characters:
 *
 * - Alphanumeric characters: A-Z, a-z, and 0-9
 * - Hyphens: -
 *
 * The requirements for a hypen exist so that a PositionName can
 * be mapped to custom html tags.
 *
 * For example, if the PostionName is `foo-bar` then it could be
 * mapped to the custom html tag `<foo-bar></foo-bar>`.
 *
 * @see https://html.spec.whatwg.org/multipage/custom-elements.html#valid-custom-element-name
 *
 * Also note:
 *
 * A PositionName may not contain a consecutive sequence of 2 or more
 * hyphens, only single hyphens are allowed.
 *
 * A PositionName may not be empty.
 *
 * A PositionName must be between 3 and 70 characters in length.
 *
 */
interface PositionName extends Stringable
{

    /**
     * Return the PositionName's Name.
     *
     * @return Name
     *
     */
    public function name(): Name;

    /**
     * Return the PositionName's Name as a string.
     *
     * @return string
     *
     */
    public function __toString(): string;

}

