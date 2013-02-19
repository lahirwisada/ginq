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
namespace Ginq\Iterator;

use Ginq\Util\IteratorUtil;
use Ginq\Core\Predicate;

/**
 * TakeWhileIterator
 * @package Ginq
 */
class TakeWhileIterator implements \Iterator
{
    /**
     * @var \Iterator
     */
    private $it;

    /**
     * @var Predicate
     */
    private $predicate;

    /**
     * @var int
     */
    private $i;

    public function __construct($xs, $predicate)
    {
        $this->it = IteratorUtil::iterator($xs);
        $this->predicate = $predicate;
    }

    public function current()
    {
        return $this->it->current();
    }

    public function key() 
    {
        return $this->it->key();
    }
    
    public function next()
    {
        $this->i++;
        $this->it->next();
    }

    public function rewind()
    {
        $this->i = 0;
        $this->it->rewind();
    }

    public function valid()
    {
        return $this->it->valid()
            && $this->predicate->predicate($this->it->current(), $this->it->key());
    }
}