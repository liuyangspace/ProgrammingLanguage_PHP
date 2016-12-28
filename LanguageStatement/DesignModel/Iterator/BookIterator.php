<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/28
 * Time: 22:38
 */

namespace LanguageStatement\DesignModel\Iterator;


class BookIterator implements Iterator
{

    protected $pointer=0;
    protected $bookCollection;

    public function __construct(BookCollection $bookCollection)
    {
        $this->bookCollection=$bookCollection;
    }

    public function current()
    {
        return $this->bookCollection->getBook($this->pointer);
    }

    public function next()
    {
        $this->pointer++;
    }

    public function valid()
    {
        $next=$this->bookCollection->getBook($this->pointer);
        if($next===null){
            return false;
        }else{
            return true;
        }
    }

}