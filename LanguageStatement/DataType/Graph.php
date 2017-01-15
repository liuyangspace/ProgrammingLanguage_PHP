<?php
/**
 * 图
 * (参见 SplFixedArray,SplObjectStorage LanguageExtension/SPL/DataStructure)
 * Graph 特征：
 *  存储结构:邻接矩阵,邻接表,十字链表
 *  遍历:深度优先遍历(DFS),广度优先遍历(BFS)
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
    //数据存储容器 邻接表
    protected $container ;

    /**
     * 构建
     * Graph __construct( mixed $var. )
     * @param $var
     * @return Graph
     */
    public function __construct(Map ...$node)
    {
        foreach($node as $value){
            $this->addNode($value);
        }
    }

    /**
     * 添加节点
     * @param Map $node
     * @return bool
     */
    public function addNode(Map $node)
    {
        if(!in_array($node,$this->container,true)){
            $this->container[]=$node;
            return true;
        }
        return false;
    }

    /**
     * 添加边
     * @param Map $from
     * @param Map $to
     */
    public function addEdge(Map $from,Map $to)
    {
        $from->addTo($to);
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