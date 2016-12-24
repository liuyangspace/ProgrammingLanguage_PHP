<?php
/**
 * Iterator usages(用例)
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


class testIterator implements \Iterator
{
    protected $container=array();
    protected $pointer=0;

    public function __construct(Array $param)
    {
        foreach($param as $key=>$value){
            $this->container[]=[
                'key'=>$key,
                'value'=>$value,
            ];
        }

    }

    public function current ()
    {
        return $this->container[$this->pointer]['value'];
    }

    public function key ()
    {
        return $this->container[$this->pointer]['key'];
    }

    public function next ()
    {
        $this->pointer++;
    }

    public function rewind ()
    {
        $this->pointer=0;
    }

    public function valid ()
    {
        return $this->pointer<count($this->container);
    }
}

$iterator=new testIterator([
    1,
    '2'=>2, //2尝试转为数字
    '3',
    'a'=>4
]);
foreach($iterator as $key=>$value){
    var_dump($key);
    var_dump($value);
    echo "\n";
}