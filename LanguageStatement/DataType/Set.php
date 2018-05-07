<?php
/**
 * 集合
 *  本集合兼容所有数据类型元素,SplObjectStorage 适用于纯对象元素的集合(效率高)
 * ( SplObjectStorage 参见 LanguageExtension/SPL/DataStructure/SplObjectStorage)
 * set 特征：
 *  存储的是无序的，不重复(值不相等，类型互异,对象非同一实例)的数据。大小可变。
 * 用例：
 *  创建：$set = new Set();$set = new Set([1,2,3]);
 *  添加元素：$set->add(12);
 *  包含元素：$set->contain($var);
 *  删除元素：$set->remove(12);
 *  获取元素：$set->get();
 *  单元数：$set->count();count($set)
 *  清空：$set->clear();
 *  交集：Set::intersect($set1,$set2);
 *  并集：Set::union($set1,$set2);
 *  差集：Set::diff($set1,$set2);
 *  类型变换：$set->toArray();
 *  调试：$set->export();var_dump($set);
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

//集合
use LanguageStatement\LanguageExtension\SPL\DataStructure\SplObjectStorage;

class Set implements \Countable,\Iterator
{

    // 数据 存储容器
    protected $container ;
    // 迭代指针
    protected $pointer ;

    /**
     * 构建
     * Set __construct( Array $var )
     * @param $var
     * @return Set
     */
    public function __construct(Array $var=null)
    {
        $this->container = [];
        $this->pointer=0;
        if($var===null){

        }else{
            foreach($var as $item){
                if(in_array($item,$this->container,true)){
                    continue;
                }
                $this->container[]=$item;
            }
        }
    }

    /**
     * 添加元素
     * @param $value
     */
    public function add($value)
    {
        if(!in_array($value,$this->container,true)){
            $this->container[]=$value;
        }
    }

    /**
     * 移除元素
     * @param $value
     * @return bool true,存在已移除，false 不存在
     */
    public function remove($value)
    {
        foreach($this->container as $k=>$v){
            if($v===$value) {
                unset($this->container[$k]);
                return true;
            }
        }
        return false;
    }

    /**
     * 检测包含
     * @param array ...$var
     * @return bool
     */
    public function contain(...$var)
    {
        foreach($var as $item){
            if(!in_array($item,$this->container,true)){
                return false;
            }
        }
        return true;
    }

    /**
     * 获取当前指针指向的值，并把指针后移
     * @return mixed
     */
    public function get()
    {
        $index=$this->pointer;
        $this->pointer++;
        return $this->container[$index];
    }

    // Iterator
    public function current()
    {
        return $this->container[$this->pointer];
    }

    public function key()
    {
        return $this->pointer;
    }

    public function next()
    {
        $this->pointer++;
    }

    public function valid()
    {
        return isset($this->container[$this->pointer]);
    }

    public function rewind()
    {
        $this->pointer=0;
    }


    // Countable
    public function count()
    {
        return count($this->container);
    }

    /**
     * 交集 严格比较（比较类型,对象须是同一类同一实例）
     * @param Set $var
     * @return Set
     */
    public function intersect(Set $set)
    {
        $intersect=[];
        foreach($this->container as $value){
            if(in_array($value,$set->container,true)){
                $intersect[]=$value;
            }
        }
        return new Set($intersect);
    }

    /**
     * 并集 严格比较（比较类型,对象须是同一类同一实例）
     * @param Set $var
     * @return Set
     */
    public function union(Set $set)
    {
        $union=$this->container;
        foreach($set->container as $value){
            if(!in_array($value,$this->container,true)){
                $union[]=$value;
            }
        }
        return new Set($union);
    }

    /**
     * 差集 除去和$set相同的元素，严格比较（比较类型,对象须是同一类同一实例）
     * @param Set $set
     * @return Set
     */
    public function diff(Set $set)
    {
        $diff=[];
        foreach($this->container as $value){
            if(!in_array($value,$set->container,true)){
                $diff[]=$value;
            }
        }
        return new Set($diff);
    }

    /**
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->container = [];
        $this->pointer=0;
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->container;
    }

    /**
     * 打印
     * Array export( void )
     * @param void
     * @return array
     */
    public function export()
    {
        return $this->container;
    }
    public function __debugInfo()
    {
        return $this->container;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray(),JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
    }
}