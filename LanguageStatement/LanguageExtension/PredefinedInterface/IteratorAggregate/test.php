<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/24
 * Time: 12:40
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\IteratorAggregate;

class BookIterator implements \Iterator
{
    private $i_position = 0;
    private $booksCollection;

    public function __construct(BookCollection $booksCollection)
    {
        $this->booksCollection = $booksCollection;
    }

    public function current()
    {
        return $this->booksCollection->getTitle($this->i_position);
    }

    public function key()
    {
        return $this->i_position;
    }

    public function next()
    {
        $this->i_position++;
    }

    public function rewind()
    {
        $this->i_position = 0;
    }

    public function valid()
    {
        return !is_null($this->booksCollection->getTitle($this->i_position));
    }
}

class BookCollection implements \IteratorAggregate
{
    private $a_titles = array();

    public function getIterator()
    {
        return new BookIterator($this);
    }

    public function addTitle($string)
    {
        $this->a_titles[] = $string;
    }

    public function getTitle($key)
    {
        if (isset($this->a_titles[$key])){
            return $this->a_titles[$key];
        }
        return null;
    }

    public function is_empty()
    {
        return empty($a_titles);
    }
}

// 聚合迭代
$booksCollection = new BookCollection();
$booksCollection->addTitle('Design Patterns');
$booksCollection->addTitle('PHP7 is the best');
$booksCollection->addTitle('Laravel Rules');
$booksCollection->addTitle('DHH Rules');
foreach($booksCollection as $book){
    var_dump($book);
}
// 迭代
$bookIterator=new BookIterator($booksCollection);
foreach($bookIterator as $book){
    var_dump($book);
}

