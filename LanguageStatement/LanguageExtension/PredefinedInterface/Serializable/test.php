<?php
/**
 * Serializable Iterator usages(用例)
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Serializable;


use LanguageStatement\LanguageExtension\PredefinedInterface\ArrayAccess\testArrayAccess;

class testSerializable implements \Serializable
{
    protected $property;

    public function __construct($param=null)
    {
        $this->property=$param;
    }

    public function getProperty(){
        return $this->property;
    }

    public function serialize()
    {
        return (string)($this->property*2);
    }

    public function unserialize($serialized)
    {
        $this->property=(int)$serialized/2;
    }
}
// 实例化
$serializable=new testSerializable(111);
var_dump($serializable);
// 序列化
$serializableStr=serialize($serializable);
var_dump($serializableStr);
// 反序列化
$serializable=unserialize($serializableStr);
var_dump($serializable);