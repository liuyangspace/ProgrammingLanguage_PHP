<?php
/*
 * 栈
 * list 特征：
 *  后进先出
 * 用例：
 *  建栈：$stack = new ListClass();$stack = new ListClass([1,2,3]);
 *  入栈：$stack->push(1);$stack[]=1;
 *  出栈：$stack->pop();$stack[0];
 *  栈长：$stack->size();
 *  清栈：$stack->clear();unset($stack);
 *  调试：$stack->export();var_dump($stack);
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

class Stack implements \ArrayAccess
{
    //  栈数据存储容器
    protected $stack = array();

    /*
     * 构建 栈
     * ListClass __construct( mixed $var )
     * @param $var
     * @return ListClass
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->stack = array_values($var);
        }elseif(is_string($var)){
            $this->stack = str_split($var);
        }elseif($var===null){
            $this->stack = array();
        }else{
            throw new \Exception('"'.$var.'" is not a array or string !');
        }
    }

    /*
     * 入栈
     * void push( mixed $var )
     * @param $var
     * @return void
     */
    public function push($var)
    {
        $this->stack[] = $var;
    }
    public function offsetSet($offset, $value)
    {
        $this->stack[] = $value;
    }

    /*
     * 出栈
     * mixed pull( void )
     * @param $var
     * @return 弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function pop()
    {
        return array_pop($this->stack);
    }
    public function offsetGet($offset)
    {
        return array_pop($this->stack);
    }

    /*
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->stack = array();
    }

    /*
     * 栈长
     * int size( void )
     * @param void
     * @return 栈内的单元数
     */
    public function size()
    {
        return count($this->stack);
    }

    /*
     * 打印
     * Array export( void )
     * @param void
     * @return
     */
    public function export()
    {
        return $this->stack;
    }
    public function __debugInfo()
    {
        return $this->stack;
    }

    /**
     * Whether a offset exists
     * @param mixed $offset <p>
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return false;
    }

    /**
     * Offset to unset
     * @param mixed $offset <p>
     * @return void
     */
    public function offsetUnset($offset)
    {
        $this->stack = array();
    }

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        return $this->stack;
    }
}