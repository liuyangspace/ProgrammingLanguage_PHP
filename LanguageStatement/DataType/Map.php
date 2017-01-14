<?php
/**
 * 映射
 * (SplObjectStorage 参见 LanguageExtension/SPL/DataStructure/SplObjectStorage)
 * map 特征：
 *
 * 用例：
 *
 * Reference:
 *
 */

namespace LanguageStatement\DataType;

//图
class Map
{
    // 邻接表

    // 值
    protected $value;
    // 指向其他Map节点的 引用数组
    protected $to = [];
    // 指向本节点的 Map节点引用数组
    protected $from = [];

    /**
     * 构建
     * Map __construct( mixed $var )
     * @param $var
     * @return Map
     */
    public function __construct($value=null,Array $from=[],Array $to=[])
    {
        $this->value=$value;
        foreach($from as $value){
            if($value instanceof Map){
                $this->addFrom($value);
            }
        }
        foreach($to as $value){
            if($value instanceof Map){
                $this->addTo($value);
            }
        }
    }

    /**
     * 添加 向$map节点的映射
     * @param Map $map
     */
    public function addTo(Map $map)
    {
        // add $this to
        if(!in_array($map,$this->to,true)){
            $this->to[]=$map;
        }
        // add $map from
        if(!in_array($this,$map->from,true)){
            $map->addFrom($this);
        }
    }

    /**
     * 检测 向$map节点的映射
     * @param Map $map
     * @return bool
     */
    public function isTo(Map $map)
    {
        if(in_array($map,$this->to,true)){
            return true;
        }
        return false;
    }

    /**
     * 移除 向$map节点的映射
     * @param Map $map
     * @return bool
     */
    public function removeTo(Map $map)
    {
        $index=array_search($map,$this->to,true);
        if($index){
            unset($this->to[$index]);
            return true;
        }
        return false;
    }

    /**
     * 移除 $map向本节点的映射
     * @param Map $map
     * @return bool
     */
    public function removeFrom(Map $map)
    {
        $index=array_search($map,$this->from,true);
        if($index){
            unset($this->from[$index]);
            return true;
        }
        return false;
    }

    /**
     * 添加 $map向本节点的映射
     * @param Map $map
     */
    public function addFrom(Map $map)
    {
        // add $this from
        if(!in_array($map,$this->from,true)){
            $this->from[]=$map;
        }
        // add $map to
        if(!in_array($this,$map->to,true)){
            $map->addTo($this);
        }
    }

    /**
     * 检测 $map向本节点的映射
     * @param Map $map
     * @return bool
     */
    public function isFrom(Map $map)
    {
        if(in_array($map,$this->from,true)){
            return true;
        }
        return false;
    }

    /**
     * 返回 所映射到的节点
     * @return array
     */
    public function  getFrom()
    {
        return $this->from;
    }

    /**
     * 返回 映射到本节点的节点
     * @return array
     */
    public function  getTo()
    {
        return $this->to;
    }

    /**
     * 图节点比较
     * @param Map $map
     * @param bool $strict
     * @return bool
     */
    public function compare(Map $map,$strict=false)
    {
        if($strict){
            if( $this->value===$map->value
                && $this->to===$map->to
                && $this->from===$map->from
            ){
                return true;
            }else{
                return false;
            }
        }else{
            return $this->value===$map->value;
        }

    }

    /**
     * 获取值
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * 设置值
     * @param $value
     */
    public function setValue($value)
    {
        $this->value=$value;
    }

    /**
     * 打印
     * Array export( void )
     * Array __debugInfo( void )
     * @param void
     * @return array
     */
    public function export()
    {
        return [
            'value' => $this->value,
            'from'  => $this->from,
            'to'    => $this->to,
        ];
    }
    public function __debugInfo()
    {
        return [
            'value' => $this->value,
            'from'  => $this->from,
            'to'    => $this->to,
        ];
    }
}