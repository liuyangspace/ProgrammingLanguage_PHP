<?php
/**
 * SplHeap 堆(抽象类)
 */

namespace LanguageStatement\LanguageExtension\SPL\DataStructure;


abstract class SplHeap extends \SplHeap implements \Iterator, \Countable
{

    public function __construct(){parent::__construct();}

    /*abstract*/ protected function compare($value1, $value2){}// Compare elements in order to place them correctly in the heap while sifting up.

    // Iterator
    public function current(){return parent::current();}//Return current node pointed by the iterator
    public function key(){return parent::key();}//Return current node index
    public function rewind(){parent::rewind();}//Rewind iterator back to the start (no-op)
    public function valid(){return parent::valid();}//Check whether the heap contains more nodes
    public function next(){parent::next();}//Move to the next node
    // Countable
    public function count(){return parent::count();}//Counts the number of elements in the heap.
    //
    public function top(){return parent::top();}//Peeks at the node from the top of the heap
    public function insert($value){parent::insert($value);}//Inserts an element in the heap by sifting it up.
    public function extract(){return parent::extract();}//Extracts a node from top of the heap and sift up.
    public function isEmpty(){return parent::isEmpty();}//Checks whether the heap is empty
    public function recoverFromCorruption(){parent::recoverFromCorruption();}//Recover from the corrupted state and allow further actions on the heap.

}