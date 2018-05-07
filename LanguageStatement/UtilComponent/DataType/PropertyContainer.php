<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\DataType;

use \RuntimeException;

trait PropertyContainer
{
    /* 实例化属性 */

    /**
     * @var array
     */
    protected $propertys=[];

    //在给不可访问属性赋值时，__set() 会被调用。public void __set ( string $name , mixed $value )
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->propertys[$name]=$value;
    }

    public function hasProperty($name)
    {
        return isset($this->propertys[$name]);
    }

    //读取不可访问属性的值时，__get() 会被调用。public mixed __get ( string $name )
    public function __get($name)
    {
        if(! static::hasProperty($name)){
            throw new RuntimeException("Property {$name} does not exist.");
        }
        return $this->propertys[$name];
    }

    //当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用。public bool __isset ( string $name )
    public function __isset($name)
    {
        return isset($this->propertys[$name]);
    }

    //当对不可访问属性调用 unset() 时，__unset() 会被调用。public void __unset ( string $name )
    public function __unset($name)
    {
        unset($this->propertys[$name]);
    }

    /* 静态属性 */

    /**
     * @var array
     */
    protected static $staticPropertys=[];

    public static function property($name,$orAdd=true)
    {
        if(!isset(static::$staticPropertys[$name])){
            if(! $orAdd){
                throw new RuntimeException("Static Property {$name} does not exist.");
            }
            static::$staticPropertys[$name]=null;
        }
        return static::$staticPropertys[$name];
    }
}