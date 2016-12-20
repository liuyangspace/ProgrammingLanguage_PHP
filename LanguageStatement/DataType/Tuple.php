<?php
/*
 * 元组
 * tuple 特征：
 *  仅能初始化，不能修改
 * 用例：
 *  建栈：$tuple = new ListClass();$tuple = new ListClass([1,2,3]);
 *  入栈：$tuple->push(1);$tuple[]=1;
 *  出栈：$tuple->pop();$tuple[0];
 *  栈长：$tuple->size();
 *  清栈：$tuple->clear();
 *  类型变换：$tuple->toArray();
 *  调试：$tuple->export();var_dump($tuple);
 * Reference:
 *
 */

namespace LanguageStatement\DataType;


class Tuple
{

    //  栈数据存储容器
    protected $tuple = array();

    /*
     * 构建
     * Tuple __construct( mixed $var )
     * @param $var
     * @return Tuple
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->tuple = array_values($var);
        }elseif(is_string($var)){
            $this->tuple = str_split($var);
        }elseif($var===null){
            $this->tuple = array();
        }else{
            throw new \Exception('"'.$var.'" is not a array or string !');
        }
    }

    /*
     * 根据 索引取值
     * mixed get( void )
     * @param $var
     * @return 弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function get($offset)
    {
        $offset = (int)$offset;
        if($this->offsetExists($offset)){
            return $this->tuple[$offset];
        }else{
            throw new \Exception('Undefined index : '.$offset);
        }
    }
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Whether a offset exists
     * @param mixed $offset <p>
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return array_key_exists((int)$offset,$this->tuple);
    }

    /*
     * 不能赋值
     * void push( mixed $var )
     * @param $var
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        throw new \Exception('An invalid operation was attempted on the Tuple !');
    }

    /*
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->tuple = array();
    }

    /*
     * 元组长
     * int size( void )
     * @param void
     * @return 元组内的单元数
     */
    public function size()
    {
        return count($this->tuple);
    }

    /*
     * 打印
     * Array export( void )
     * @param void
     * @return
     */
    public function export()
    {
        return $this->tuple;
    }
    public function __debugInfo()
    {
        return $this->tuple;
    }

    /**
     * Offset to unset 不能删除
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        throw new \Exception('An invalid operation was attempted on the Tuple !');
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->tuple;
    }

}