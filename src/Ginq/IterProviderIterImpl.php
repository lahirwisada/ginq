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

require_once dirname(__FILE__) . "/iter.php";

require_once dirname(__FILE__) . "/IterProvider.php";
require_once dirname(__FILE__) . "/Lookup.php";

/**
 * IterProviderIterImpl
 * @package Ginq
 */
class Ginq_IterProviderIterImpl implements Ginq_IterProvider
{

    public function zero()
    {
        require_once dirname(__FILE__) . "/Iterator/ZeroIterator.php";
        return new Ginq_Iterator_ZeroIterator();
    }

    public function range($start, $stop, $step)
    {
        require_once dirname(__FILE__) . "/Iterator/RangeIterator.php";
        return new Ginq_Iterator_RangeIterator($start, $stop, $step);
    }

    public function rangeInf($start, $step)
    {
        require_once dirname(__FILE__) . "/Iterator/RangeInfIterator.php";
        return new Ginq_Iterator_RangeInfIterator($start, $step);
    }

    public function repeat($x)
    {
        require_once dirname(__FILE__) . "/Iterator/RepeatIterator.php";
        return new Ginq_Iterator_RepeatIterator($x);
    }

    public function cycle($xs)
    {
        require_once dirname(__FILE__) . "/Iterator/CycleIterator.php";
        return new Ginq_Iterator_CycleIterator($xs);
    }

    public function select($xs, $selector, $keySelector)
    {
        require_once dirname(__FILE__) . "/Iterator/SelectIterator.php";
        return new Ginq_Iterator_SelectIterator($xs, $selector, $keySelector);
    }

    public function where($xs, $predicate)
    {
        require_once dirname(__FILE__) . "/Iterator/WhereIterator.php";
        return new Ginq_Iterator_WhereIterator($xs, $predicate);
    }

    public function take($xs, $n)
    {
        require_once dirname(__FILE__) . "/Iterator/TakeIterator.php";
        return new Ginq_Iterator_TakeIterator($xs, $n);
    }

    public function drop($xs, $n)
    {
        require_once dirname(__FILE__) . "/Iterator/DropIterator.php";
        return new Ginq_Iterator_DropIterator($xs, $n);
    }

    public function takeWhile($xs, $predicate)
    {
        require_once dirname(__FILE__) . "/Iterator/TakeWhileIterator.php";
        return new Ginq_Iterator_TakeWhileIterator($xs, $predicate);
    }

    public function dropWhile($xs, $predicate)
    {
        require_once dirname(__FILE__) . "/Iterator/DropWhileIterator.php";
        return new Ginq_Iterator_DropWhileIterator($xs, $predicate);
    }

    public function concat($xs, $ys)
    {
        require_once dirname(__FILE__) . "/Iterator/ConcatIterator.php";
        return new Ginq_Iterator_ConcatIterator($xs, $ys);
    }

    public function selectMany($xs, $manySelector)
    {
        require_once dirname(__FILE__) . "/Iterator/SelectManyIterator.php";
        return new Ginq_Iterator_SelectManyIterator($xs, $manySelector);
    }

    public function selectManyWithJoin($xs, $manySelector, $joinSelector)
    {
        require_once dirname(__FILE__) . "/Iterator/SelectManyWithJoinIterator.php";
        return new Ginq_Iterator_SelectManyWithJoinIterator($xs, $manySelector, $joinSelector);
    }

    public function zip($xs, $ys, $joinSelector)
    {
        require_once dirname(__FILE__) . "/Iterator/ZipIterator.php";
        return new Ginq_Iterator_ZipIterator($xs, $ys, $joinSelector);
    }

    public function groupBy($xs, $keySelector, $elementSelector, $groupSelector)
    {
        require_once dirname(__FILE__) . "/Iterator/GroupByIterator.php";
        return new Ginq_Iterator_GroupByIterator($xs, $keySelector, $elementSelector, $groupSelector);
    }

}
