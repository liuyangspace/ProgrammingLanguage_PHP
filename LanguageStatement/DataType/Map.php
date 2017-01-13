<?php
/**
 * 映射 参见 SplObjectStorage (LanguageExtension/SPL/DataStructure/SplObjectStorage)
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
    //应射 关系（函数）
    protected $value;

    //指向其他Map节点的 引用数组
    protected $to = [];

    //指向本节点的 Map节点引用数组
    protected $from = [];

    /*
     * 构建
     * Map __construct( mixed $var. )
     * @param $var
     * @return Map
     */
    public function __construct($value=null,Array $from=[],Array $to=[])
    {
        $this->value=$value;
    }

    public function addTo(Map $map)
    {
        // add $this to
        $hasTo=false;
        foreach($this->to as $toMap){
            if($map->compare($toMap)){
                $hasTo=true;
            }
        }
        if(!$hasTo){
            $this->to[]=$map;
        }
        // add $map from
        $hasFrom=false;
        foreach($map->from as $fromMap){
            if($this->compare($fromMap)){
                $hasFrom=true;
            }
        }
        if(!$hasFrom){
            $map->addFrom($this);
        }
    }

    public function isTo(Map $map)
    {
        foreach($this->to as $toMap){
            if($map->compare($toMap)){
                return true;
            }
        }
        return false;
    }

    public function removeTo(Map $map)
    {

    }

    public function removeFrom(Map $map)
    {

    }

    public function addFrom(Map $map)
    {
        // add $this from
        $hasFrom=false;
        foreach($this->from as $fromMap){
            if($map->compare($fromMap)){
                return;
            }
        }
        if(!$hasFrom){
            $this->to[]=$map;
        }
        // add $map to
        $hasTo=false;
        foreach($map->to as $fromMap){
            if($this->compare($fromMap)){
                $hasTo=true;
            }
        }
        if(!$hasTo){
            $map->addTo($this);
        }
    }

    public function isFrom(Map $map)
    {
        foreach($this->from as $fromMap){
            if($map->compare($fromMap)){
                return true;
            }
        }
        return false;
    }

    public function  getFrom()
    {
        return $this->from;
    }

    public function  getTo()
    {
        return $this->to;
    }


    public function compare(Map $map)
    {
         return $this===$map;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value=$value;
    }

    /*
     * 打印
     * Array export( void )
     * Array __debugInfo( void )
     * @param void
     * @return Array
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