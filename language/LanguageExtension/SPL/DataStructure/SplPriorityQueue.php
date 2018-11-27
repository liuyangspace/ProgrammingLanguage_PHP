<?php
/**
 * SplPriorityQueue 优先队列
 */

namespace LanguageStatement\LanguageExtension\SPL\DataStructure;


class SplPriorityQueue extends \SplPriorityQueue implements \Iterator, \Countable
{

    public function __construct(){parent::__construct();}
    //
    public function compare($priority1, $priority2){return parent::compare($priority1, $priority2);}//Compare priorities in order to place elements correctly in the heap while sifting up.
    public function extract(){return parent::extract();}//Extracts a node from top of the heap and shift up.
    public function insert($value, $priority){parent::insert($value, $priority);}//Inserts an element in the queue by sifting it up.
    public function isEmpty(){return parent::isEmpty();}//Checks whether the queue is empty.
    public function recoverFromCorruption(){parent::recoverFromCorruption();}//Recover from the corrupted state and allow further actions on the queue
    public function top(){return parent::top();}//Peeks at the node from the top of the queue
    const EXTR_DATA             = parent::EXTR_DATA;//Extract the data
    const EXTR_PRIORITY         = parent::EXTR_PRIORITY;//Extract the data
    const EXTR_BOTH             = parent::EXTR_BOTH;//Extract the data
    public function setExtractFlags($flags){parent::setExtractFlags($flags);}//
    // Iterator
    public function current(){return parent::current();}//Return current node pointed by the iterator
    public function key(){return parent::key();}//Return current node index
    public function rewind(){parent::rewind();}//Rewind iterator back to the start (no-op)
    public function valid(){return parent::valid();}//Check whether the queue contains more nodes
    public function next(){parent::next();}//Move to next entry
    // Countable
    public function count(){return parent::count();}//Counts the number of elements in the queue

}