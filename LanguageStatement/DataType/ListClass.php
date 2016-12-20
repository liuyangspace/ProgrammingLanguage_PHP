<?php
/*
 * 链表
 * list 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

class ListClass implements \ArrayAccess
{
    //数据存储容器
    /*
     * [
     *      'attribute'=> mixed,
     *      'next'=>int
     * ]
     */
    protected $container=array();

    //节点数
    protected $pointNumber=0;

    //节点id计数器
    protected $pointId=-1;

    /*
     * 构建
     * ListClass __construct( mixed $var. )
     * @param $var
     * @return ListClass
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->initArray($var);
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    /*
     * 获取新的节点id(数值索引)
     */
    protected function getNewId(){
        return ++$this->pointId;
    }

    /*
     * 将array转为链表结构数组
     * array initArray(Array $arr)
     * @param Array $arr
     * @return  array
     */
    public function initArray(Array $arr)
    {
        $parentId=null;
        foreach($arr as $key=>$value){
            $index=$this->getNewId();
            $this->container[$index]=array(
                'attribute'=>['index'=>$key,'value'=>$value],
                'next'=>null,
            );
            if($parentId!==null){
                $this->container[$parentId]['next']=$index;
            }
            $parentId=$index;
            $this->pointNumber++;
        }
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

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}

/**
 * Author: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/12 10:32
 */