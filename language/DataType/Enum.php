<?php
/**
 * 枚举
 *  定义 一组指定名称的常量(重复时，仅第一个常量名有效)，大小不可改变
 *  可用于限定取值
 * 用例：
 *  $enum=new Enum('A','B','C','A');
 *  $a=A;
 *  echo $enum->get($a);
 * Reference:
 * SPL:
 * @see \SplEnum
 * @see \SplFixedArray
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplFixedArray
 */

namespace LanguageStatement\DataType;


class Enum extends \LanguageStatement\DataType\Iterator implements \Countable
{
    const ENUM_NAME = 1;//
    const ENUM_POSITION = 2;

    /**
     * 重构父类构建
     * Enum constructor.
     * @param array ...$var
     * @throws \Exception
     */
    public function __construct(...$var)
    {
        $add=1;
        $index=[];
        $arr=[];
        foreach($var as $item){
            if(is_string($item)){
                if(in_array($item,$index,true)){
                    continue;
                }
                define($item,$add);
                $index[]=$item;
                $arr[]=$item;
                $add=$add+1;
            }else{
                throw new \Exception(sprintf('Not string : %s',$item));
            }
        }
        $this->container=\SplFixedArray::fromArray($arr);
    }

    /**
     * 获取变量值对应的常量的名称或位置
     * @param $value
     * @param $throw 抛出异常或返回false
     * @param $type 返回常量名或位置
     * @return mixed
     * @throws \Exception
     */
    public function get($value,$throw=true,$type=Enum::ENUM_NAME)
    {
        $index=$value-1;
        if( $index>=0 && $index<$this->container->count() ){
            if($type===self::ENUM_NAME){
                return $this->container[$index];
            }elseif($type===self::ENUM_POSITION){
                return $value;
            }else{
                throw new \Exception(sprintf('the third parameter must in [ Enum::ENUM_NAME , Enum::ENUM_POSITION ]'));
            }
        }else{
            if($throw){
                throw new \Exception(sprintf('Undefined Enum : %s',$index));
            }else{
                return false;
            }
        }
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->container->toArray();
    }

    // 重构父类
    public function key()
    {
        return $this->container[$this->pointer];
    }

    public function current()
    {
        return $this->pointer+1;
    }

    // Countable
    public function count(){
        return $this->container->count();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray(),JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
    }
}