<?php
/*
 * 图
 * Graph 特征：
 *  分类：有向 无向 有环 无环
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

//图
class Graph
{
    //数据存储容器
    protected $container = array(
        [
            'attribute'=>null,  //mixed     本节点属性容器
            'from'=>[],         //int array 入度 节点id
            'to'=>[],           //int array 出度 节点id
        ]
    );

    //节点数
    protected $pointNumber=1;

    //关系数
    protected $relationNumber=1;

    //节点id计数器
    protected $pointId=0;

    /*
     * 构建
     * Graph __construct( mixed $var. )
     * @param $var
     * @return Graph
     */
    public function __construct($var=null)
    {
        if(is_array($var)){
            $this->container[0]['to'] =  $this->initArray($var);
        }elseif($var===null){

        }else{
            throw new \Exception('"'.$var.'" is not a array or null !');
        }
    }

    /*
     * 将array转为图结构数组
     * array initArray(Array $arr,$parentIndex=0)
     * @param Array $arr
     * @param Array $parentIndex  父节点的id
     * @return  array
     */
    public function initArray(Array $arr,$parentIndex=[0])
    {
        $toIndexes=[];
        foreach($arr as $key=>$value){
            $index=$this->getNewPointId();
            $this->container[$index]=[];
            $tmpArr=[
                'attribute'=>['index'=>$key],
                'from'=>$parentIndex,
                'to'=>[]
            ];
            if(is_array($value)){
                $tmpArr['to']=$this->initArray($value,[$index]);
                $this->relationNumber+=count($tmpArr['to']);
            }else{
                $tmpArr['attribute']['value']=$value;
            }
            $toIndexes[]=$index;
            $this->container[$index]=$tmpArr;
            $this->pointNumber++;
        }
        return $toIndexes;
    }

    /*
     * 获取新的节点id(数值索引)
     */
    protected function getNewPointId(){
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