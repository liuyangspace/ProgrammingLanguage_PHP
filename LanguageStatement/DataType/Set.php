<?php
/*
 * 集合
 * set 特征：
 *  Set 接口实例存储的是无序的，不重复的数据。
 * 用例：
 *  创建：$set = new Set();$set = new Set([1,2,3]);
 *  添加元素：$set[]=1;
 *  获取元素：$stack->pop();$stack[0];
 *  栈长：$stack->size();
 *  清栈：$stack->clear();unset($stack);
 *  调试：$stack->export();var_dump($stack);
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

//集合
class Set implements \ArrayAccess
{

    //  数据存储容器

    const DIFF_LEFT = 1;

    /*
     * 构建
     * ArrayClass __construct( mixed $var. )
     * @param $var
     * @return ArrayClass
     */
const DIFF_RIGHT = 2;
const DIFF_BOTH = 3;
    protected $container = array();

    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->container = array_unique(array_values($var));
        }elseif(is_string($var)){
            $this->container = array_unique(str_split($var));
        }elseif($var===null){
            $this->container = array();
        }else{
            throw new \Exception('"'.$var.'" is not a array or string !');
        }
    }

    /**
     * 交集
     * Set intersect ( mixed $var1, mixed $var2[, bool $strict=TRUE])
     * @param Set/Array  $var1
     * @param Set/Array  $var2
     * @param bool $strict 是否严格比较（比较类型）
     * @return Set
     */
    public static function intersect($var1,$var2,$strict=TRUE)
    {
        if($var1 instanceof Set){
            $var1=$var1->toArray();
        }
        if($var2 instanceof Set){
            $var2=$var2->toArray();
        }
        if(is_array($var1) && is_array($var2)){
            if($strict){
                $minArr=$var1;
                $maxArr=$var2;
                $set=new Set();
                if(count($var1)>count($var2)){
                    $minArr=$var2;
                    $maxArr=$var1;
                }
                foreach($minArr as $k=>$v){
                    if(in_array($v,$maxArr,true)){
                        $set[$k]=$v;
                    }
                }
                return $set;
            }else{
                return new Set(array_values(array_unique(array_intersect($var1,$var2))));
            }
        }else{
            throw new \Exception('Invalid parameters !');
        }
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
     * 并集
     * Set union ( mixed $var1, mixed $var2[, bool $strict=TRUE])
     * @param Set/Array  $var1
     * @param Set/Array  $var2
     * @param bool $strict 是否严格比较（比较类型）
     * @return Set
     */
    public static function union($var1,$var2,$strict=TRUE)
    {
        if($var1 instanceof Set){
            $var1=$var1->toArray();
        }
        if($var2 instanceof Set){
            $var2=$var2->toArray();
        }
        if(is_array($var1) && is_array($var2)){
            if($strict){
                $minArr=$var1;
                $maxArr=$var2;
                if(count($var1)>count($var2)){
                    $minArr=$var2;
                    $maxArr=$var1;
                }
                $set=new Set($maxArr);
                foreach($minArr as $k=>$v){
                    if(in_array($v,$maxArr,true)){
                    }else{
                        $set[]=$v;
                    }
                }
                return $set;
            }else{
                return new Set(array_values(array_unique(array_merge($var1,$var2))));
            }
        }else{
            throw new \Exception('Invalid parameters !');
        }
    }

    public static function diff($left,$right,$mod=1,$strict=TRUE)
    {
        if($left instanceof Set){
            $left=$left->toArray();
        }
        if($right instanceof Set){
            $right=$right->toArray();
        }
        if(is_array($left) && is_array($right)){
            if($strict){
                $set=new Set();
                foreach($left as $k=>$v){
                    if(in_array($v,$right,true) || $mod==self::DIFF_RIGHT){
                    }else{
                        $set[]=$v;
                    }
                }
                foreach($right as $k=>$v){
                    if(in_array($v,$left,true) || $mod==self::DIFF_LEFT){
                    }else{
                        $set[]=$v;
                    }
                }
                return $set;
            }else{
                switch($mod){
                    case self::DIFF_LEFT:
                        $diffArr=array_diff($left,$right);
                        break;
                    case self::DIFF_RIGHT:
                        $diffArr=array_diff($left,$right);
                        break;
                    case self::DIFF_BOTH:
                        $diffArr=array_merge(array_diff($left,$right),array_diff($right,$var1));
                        break;
                    default:
                        $diffArr=array_diff($left,$right);
                }
                return new Set(array_values(array_unique($diffArr)));
            }
        }else{
            throw new \Exception('Invalid parameters !');
        }
    }

    /**
     * Offset to retrieve
     * @param mixed $offset The offset to retrieve.
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        if($this->offsetExists($offset)){
            return $this->container[$offset];
        }else{
            throw new \Exception('Undefined index : '.$offset);
        }
    }

    /**
     * 差集,交集的非
     * Set diff ( mixed $var1, mixed $var2[, bool $strict=TRUE])
     * @param Set/Array  $var1
     * @param Set/Array  $var2
     * @param mixed  $mod 差集模式，见以下定义的常量
     * @param bool $strict 是否严格比较（比较类型）
     * @return Set
     */
    //
    /**
     * Whether a offset exists
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset,$this->container);
    }//$var1-$var2 的差集

    /**
     * Offset to set
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if(!in_array($value,$this->container,true)){
            $this->container[]=$value;
        }
    }//$var2-$var1 的差集

    public function add($value)
    {
        if(!in_array($value,$this->container,true)){
            $this->container[]=$value;
        }
    }//$var2与$var1 交集的非，或以上两者的并

    /**
     * Offset to unset
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /*
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */

    public function remove($value)
    {
        foreach($this->container as $k=>$v){
            if($v===$value) {
                unset($this->container[$k]);
            }
        }
    }

    public function clear()
    {
        $this->container = array();
    }

    /*
     * 打印
     * Array export( void )
     * @param void
     * @return
     */

    public function export()
    {
        return $this->container;
    }
    public function __debugInfo()
    {
        return $this->container;
    }
}