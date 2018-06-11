<?php
/**
 * 栈
 * stack 特征：
 *  后进先出,大小可变 (LIFO)
 * 用例：
 *  建栈：$stack = new ListClass();$stack = new ListClass([1,2,3]);
 *  入栈：$stack->push(1);$stack->input(1);
 *  出栈：$stack->pop();$stack->output();
 *  栈长：$stack->count();
 *  清栈：$stack->clear();
 *  调试：$stack->export();var_dump($stack);
 *  类型变换：$tuple->toArray();$tuple->__toString()
 * Reference:
 *
 * SPL:
 * @see \SplStack
 * @see \LanguageStatement\LanguageExtension\SPL\DataStructure\SplStack
 */

namespace LanguageStatement\DataType;

class Stack implements \Countable
{
    //  栈数据存储容器
    protected $container ;

    /**
     * 构建 栈
     * Stack __construct( array $var )
     * @param $var
     * @return Stack
     */
    public function __construct(Array $var=null)
    {
        $this->container = new \SplStack();
        if($var===null){

        }else{
            foreach($var as $value){
                $this->container->push($value);
            }
        }
    }

    /**
     * 入栈
     * void push( mixed $var )
     * @param $var
     * @return void
     */
    public function push($value)
    {
        $this->container->push($value);
    }
    public function input($value)
    {
        $this->container->push($value);
    }

    /**
     * 出栈
     * mixed pull( void )
     * @param $var
     * @return mixed 弹出队首的值,如果 array 为 空则返回 NULL。
     */
    public function pop()
    {
        return $this->container->pop();
    }
    public function output()
    {
        return $this->container->pop();
    }

    /**
     * 清空
     * void clear( void )
     * @param $var
     * @return void
     */
    public function clear()
    {
        $this->container = new \SplStack();
    }

    /**
     * Checks whether the stack is empty.
     * @return bool
     */
    public function isEmpty()
    {
        return $this->container->isEmpty();
    }

    /**
     * 栈长
     * int size( void )
     * @param void
     * @return int 栈内的单元数
     */
    public function count()
    {
        return $this->container->count();
    }

    /**
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

    /**
     * 类型变换
     * @param void
     * @return array
     */
    public function toArray()
    {
        $arr=[];
        foreach($this->container as $value){
            $arr[]=$value;
        }
        return array_reverse($arr);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray(),JSON_PRETTY_PRINT|JSON_FORCE_OBJECT);
    }
}