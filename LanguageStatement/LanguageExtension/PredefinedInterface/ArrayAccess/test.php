<?php
/**
 * ArrayAccess usages(用例)
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\ArrayAccess;


class testArrayAccess implements \ArrayAccess
{
    protected $container=array();

    public function __construct(Array $param)
    {
        $this->container=$param;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset,$this->container);
    }

    public function offsetGet($offset)
    {
        return $this->container[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->container[$offset]=$value;
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
}
// 创建 ArrayAccess
$arr=[1,"2"=>2,'3','a'=>4];//var_dump($arr);
$arrayAccess=new testArrayAccess($arr);
//
var_dump($arrayAccess);
// 数组取值
var_dump($arrayAccess['2']);
// 数组赋值
$arrayAccess['5']=5;
var_dump($arrayAccess);
// unset
unset($arrayAccess['a']);
var_dump($arrayAccess);
// 不存在的键抛出异常
//var_dump($arrayAccess['6']);
