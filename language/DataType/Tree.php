<?php
/**
 * 树
 * tree 特征：
 *  单向(区别于图，映射,入度小于等于1)一对多关系(区别于线性表)
 * 分类：
 *  无序树：树中任意节点的子结点之间没有顺序关系，这种树称为无序树,也称为自由树;
 *  有序树：树中任意节点的子结点之间有顺序关系，这种树称为有序树；
 *  二叉树：每个节点最多含有两个子树的树称为二叉树；
 *  完全二叉树
 *  满二叉树
 *  霍夫曼树：带权路径最短的二叉树称为哈夫曼树或最优二叉树；
 * 遍历:深度优先遍历(DFS),广度优先遍历(BFS)
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

class Tree
{

    //数据存储容器
    protected $value;

    // 指向 Tree 引用
    protected $children;

    /**
     * 构建
     * Tree __construct( mixed $var. )
     * @param $var
     */
    public function __construct($value,Tree ...$children)
    {
        $this->value=$value;
        $this->children=[];
        foreach($children as $child){
            $this->addChild($child);
        }
    }

    /**
     * 添加孩子
     * @param Tree $tree
     * @return bool
     */
    public function addChild(Tree $tree)
    {
        if(!in_array($tree,$this->children,true)){
            $this->children[]=$tree;
            return true;
        }
        return false;
    }

    /**
     * 移除指定孩子
     * @param Tree $tree
     * @return bool
     */
    public function removeChild(Tree $tree)
    {
        $index=array_search($tree,$this->children,true);
        if($index!==false){
            unset($this->children[$index]);
            return true;
        }
        return false;
    }

    /**
     * 判对是否为本节点的孩子
     * @param Tree $tree
     * @return bool
     */
    public function isChild(Tree $tree)
    {
        return in_array($tree,$this->children,true);
    }

}