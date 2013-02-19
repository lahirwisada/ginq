<?php
/**
 * Ginq: Generator INtegrated Query
 * Copyright 2013, Atsushi Kanehara <akanehara@gmail.com>
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * PHP Version 5.3 or later
 *
 * @author     Atsushi Kanehara <akanehara@gmail.com>
 * @copyright  Copyright 2013, Atsushi Kanehara <akanehara@gmail.com>
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @package    Ginq
 */

namespace Ginq\Predicate;

use Ginq\Core\Predicate;

class PredicateParser
{
    public static function parse($src)
    {
        if (is_string($src)) {
            return new \Ginq\Predicate\PropertyPredicate($src);
        }

        if ($src instanceof \Closure) {
            return new \Ginq\Predicate\DelegatePredicate($src);
        }

        $type = gettype($src);
        throw new \InvalidArgumentException(
            "'predicate' callable expected, got $type");
    }
}