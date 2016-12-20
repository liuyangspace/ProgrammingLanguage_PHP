<?php
/*
 * 树
 * tree 特征：
 *  仅能初始化，不能修改
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

class Tree
{

    //数据存储容器
    protected $container = array(
        [
            'attribute'=>null,  //mixed     本节点属性容器
            'relation'=>null,   //int       与父节点的关系属性容器
            'children'=>[],     //int array 子节点容器
        ]
    );

    //节点数
    protected $pointNumber=1;

    //节点id计数器
    protected $pointId=0;

    /*
     * 构建
     * Tree __construct( mixed $var. )
     * @param $var
     * @return Tree
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->container[0]['children'] =  $this->initArray($var);
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    /*
     * 将array转为树结构数组
     * array initArray(Array $arr,$parentIndex=0)
     * @param Array $arr
     * @param int $parentIndex  父节点的id
     * @return  array
     */
    public function initArray(Array $arr,$parentIndex=0)
    {
        $ResultArr=array();
        foreach($arr as $key=>$value){
            $index=$this->getNewId();
            $this->container[$index]=[
                'attribute'=>['index'=>$key],
                'relation'=>$parentIndex,
                'children'=>[],
            ];
            if(is_array($value)){
                $this->container[$index]['children']=$this->initArray($value,$index);
            }else{
                $this->container[$index]['attribute']['value']=$value;
            }
            $ResultArr[]=$index;
            $this->pointNumber++;
        }
        return $ResultArr;
    }

    /*
     * 获取新的节点id(数值索引)
     */
    protected function getNewId(){
        return ++$this->pointId;
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