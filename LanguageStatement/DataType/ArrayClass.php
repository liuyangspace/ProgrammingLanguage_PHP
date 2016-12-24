<?php
/*
 * php基础数据(结构)类型：Array 数组
 *  PHP 中的数组实际上是一个有序映射
 *  可以把它当成真正的数组，或列表（向量），散列表（是映射的一种实现），字典，集合，栈，队列以及更多可能性
 *  数组元素的值也可以是另一个数组，树形结构和多维数组也是允许的。
 *  键定义为字符串是，数组将尝试转为数字
 *  定义数组:
 *      $array = array()
 *      $array = []
 *      $array[0] = ''
 * Reference:
 *  http://php.net/manual/zh/language.types.array.php
 */

namespace LanguageStatement\DataType;


class ArrayClass extends PHPArray implements \ArrayAccess
{
    //  数据存储容器
    protected $container = array();

    /*
     * 构建
     * ArrayClass __construct( mixed $var,... )
     * @param $var
     * @return ArrayClass
     */
    public function __construct()
    {
        $this->container = func_get_args();
    }

    /*
     * 转换为数组
     */
    public static function toString($var){ return (array)$var; }

    /*
     * 判断是否为数组
     */
    public static function isString($var){ return is_array($var); }

    /**
     * Whether a offset exists
     * @param mixed $offset An offset to check for.
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset,$this->container);
    }

    /**
     * Offset to retrieve
     * @param mixed $offset The offset to retrieve.
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        if(array_key_exists($offset,$this->container)){
            return $this->container[$offset];
        }else{
            throw new \Exception($offset.'Undefined index : '.$offset);
        }
    }

    /**
     * Offset to set
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if($offset){
            $this->container[$offset]=$value;
        }else{
            $this->container[]=$value;
        }
    }

    /**
     * Offset to unset
     * @param mixed $offset The offset to unset.
     * @return void
     */
    public function offsetUnset($offset)
    {
        if(array_key_exists($offset,$this->container)){
           unset($this->container[$offset]);
        }else{
            throw new \Exception($offset.'Undefined index : '.$offset);
        }
    }

    //var_dump()
    public function __debugInfo()
    {
        return $this->container;
    }
}

class PHPArray
{
    /*
     * 数组运算
     */
    public static function union($left,$right){ return $left+$right; }//联合
    public static function equality($left,$right){ return $left==$right; }//相等
    public static function identity($left,$right){ return $left===$right; }//全等
    public static function inequality($left,$right){ return $left!=$right; }//不等
    public static function nonidentity($left,$right){ return $left!==$right; }//不全等
    //差集
    public static function array_diff($arr1,$arr2){ return array_diff($arr1,$arr2); }//计算数组的差集
    public static function array_diff_assoc($arr1,$arr2){ return array_diff_assoc($arr1,$arr2); }//带索引检查计算数组的差集
    public static function array_diff_uassoc($arr1,$arr2,$function){ return array_diff_uassoc($arr1,$arr2,$function); }//用用户提供的回调函数做索引检查来计算数组的差集
    public static function array_diff_key($arr1,$arr2){ return array_diff_key($arr1,$arr2); }//使用键名比较计算数组的差集
    public static function array_diff_ukey($arr1,$arr2,$function){ return array_diff_ukey($arr1,$arr2,$function); }//用回调函数对键名比较计算数组的差集
    public static function array_udiff($arr1,$arr2,$function){ return array_udiff($arr1,$arr2,$function); }//用回调函数比较数据来计算数组的差集
    public static function array_udiff_assoc($arr1,$arr2,$function){ return array_udiff_assoc($arr1,$arr2,$function); }//带索引检查计算数组的差集，用回调函数比较数据
    public static function array_udiff_uassoc($arr1,$arr2,$dataFunction,$keyFunction){ return array_udiff_uassoc($arr1,$arr2,$dataFunction,$keyFunction); }//带索引检查计算数组的差集，用回调函数比较数据和索引
    //交集
    public static function array_intersect($arr1,$arr2){ return array_intersect($arr1,$arr2); }//计算数组的交集
    public static function array_intersect_assoc($arr1,$arr2){ return array_intersect_assoc($arr1,$arr2); }//带索引检查计算数组的交集
    public static function array_intersect_uassoc($arr1,$arr2,$function){ return array_intersect_uassoc($arr1,$arr2,$function); }//带索引检查计算数组的交集，用回调函数比较索引
    public static function array_intersect_key($arr1,$arr2){ return array_intersect_key($arr1,$arr2); }//使用键名比较计算数组的交集
    public static function array_intersect_ukey($arr1,$arr2,$function){ return array_intersect_ukey($arr1,$arr2,$function); }//用回调函数比较键名来计算数组的交集
    public static function array_uintersect($arr1,$arr2,$function){ return array_uintersect($arr1,$arr2,$function); }//计算数组的交集，用回调函数比较数据
    public static function array_uintersect_assoc($arr1,$arr2,$function){ return array_uintersect_assoc($arr1,$arr2,$function); }//带索引检查计算数组的交集，用回调函数比较数据
    public static function array_uintersect_uassoc($arr1,$arr2,$dataFunction,$keyFunction){ return array_uintersect_uassoc($arr1,$arr2,$dataFunction,$keyFunction); }//带索引检查计算数组的交集，用回调函数比较数据

    /*
     * 排序，参考：http://php.net/manual/zh/array.sorting.php
     */
    public static function shuffle(&$arr){ return shuffle($arr); }//将数组打乱
    public static function array_multisort(&$arr,$mode=SORT_ASC){ return array_multisort($arr,$mode); }//依据值,键值关联的保持，数字类型的不保持,第一个数组或者由选项指定
    public static function asort(&$arr,$mode=SORT_REGULAR){ return asort($arr,$mode); }//依据值,保持键,升序
    public static function arsort(&$arr,$mode=SORT_REGULAR){ return arsort($arr,$mode); }//依据值,保持键,降序
    public static function krsort(&$arr,$mode=SORT_REGULAR){ return krsort($arr,$mode); }//依据键,保持键,降序
    public static function ksort(&$arr,$mode=SORT_REGULAR){ return ksort($arr,$mode); }//依据键,保持键,升序
    public static function natcasesort(&$arr){ return natcasesort($arr); }//依据值,保持键,自然排序，大小写不敏感
    public static function natsort(&$arr){ return natsort($arr); }//依据值,保持键,自然排序
    public static function sort(&$arr,$mode=SORT_REGULAR){ return sort($arr,$mode); }//依据值,不保持键,降序
    public static function rsort(&$arr,$mode=SORT_REGULAR){ return rsort($arr,$mode); }//依据值,不保持键,升序
    public static function usort(&$arr,$function){ return usort($arr,$function); }//依据值,不保持键,用户自定义
    public static function uasort(&$arr,$function){ return uasort($arr,$function); }//依据值,保持键,用户自定义
    public static function uksort(&$arr,$function){ return uksort($arr,$function); }//依据键,保持键,用户自定义

    /*
     * 数组函数
     */
    //  数组的内部指针操作
    public static function prev(&$arr){ return prev($arr); }//数组的内部指针倒回一位.
    public static function next(&$arr){ return next($arr); }//返回数组中当前单元的键名。
    public static function reset(&$arr){ return reset($arr); }//将数组的内部指针指向第一个单元
    public static function end(&$arr){ return end($arr); }//将数组的内部指针指向最后一个单元
    public static function each(&$arr){ return each($arr); }//返回数组中当前的键／值对并将数组指针向前移动一步
    public static function current(&$arr){ return current($arr); }//返回数组中的当前单元
    public static function pos(&$arr){ pos($arr); }//current() 的别名
    public static function key(&$arr){ return current($arr); }//返回数组中当前单元的键名。
    //  key value
    public static function array_keys($arr,$search,$strict=false){ return array_keys($arr,$search,$strict); }//返回数组中部分的或所有的键名
    public static function array_key_exists($key,$arr){ return array_key_exists($key,$arr); }//检查给定的键名或索引是否存在于数组中
    public static function key_exists($key,$arr){ return key_exists($key,$arr); }//别名 array_key_exists()
    public static function array_change_key_case($arr,$case=CASE_LOWER){ return array_change_key_case($arr,$case); }//返回字符串键名全为小写或大写的数组
    public static function array_flip($arr){ return array_flip($arr); }//交换数组中的键和值
    public static function array_values($arr){ return array_values($arr); }//返回数组中所有的值
    public static function array_search($values,$arr,$strict=false){ return array_search($values,$arr,$strict); }//在数组中搜索给定的值，如果成功则返回相应的键名
    public static function in_array($values,$arr,$strict=false){ return in_array($values,$arr,$strict); }//检查数组中是否存在某个值
    //  创建 变换 填充
    public static function php_array(){ return array(); }//建立一个数组
    public static function php_list($arr,$var1,$var2){ return list($var1,$var2)=$arr; }//把数组中的值赋给一些变量
    public static function compact($keyName1,$keyName2){ return compact($keyName1,$keyName2); }//建立一个数组，包括变量名和它们的值
    public static function extract(&$arr,$extract_type=EXTR_OVERWRITE,$prefix=NULL){ return extract($arr,$extract_type,$prefix); }//从数组中将变量导入到当前的符号表
    public static function range($start,$limit,$step=1){ return range($start,$limit,$step); }//建立一个包含指定范围单元的数组
    public static function array_combine($keys,$values){ return array_combine($keys,$values); }//创建一个数组，用一个数组的值作为其键名，另一个数组的值作为其值
    public static function array_pad($arr,$num,$values){ return array_pad($arr,$num,$values); }//用给定的值填充数组
    public static function array_fill($keys,$num,$values){ return array_fill($keys,$num,$values); }//用给定的值填充数组
    public static function array_fill_keys($keys,$values){ return array_fill_keys($keys,$values); }//用指定的键和值填充数组
    //  统计
    public static function count($arr){ return count($arr); }//计算数组中的单元数目或对象中的属性个数
    public static function sizeof($arr){ return sizeof($arr); }//count() 的别名
    public static function array_count_values($arr){ return array_count_values($arr); }//统计数组中所有的值出现的次数
    public static function array_sum($arr){ return array_sum($arr); }//计算数组中所有值的和
    public static function array_product($arr){ return array_product($arr); }//计算数组中所有值的乘积
    //  切割
    public static function array_slice($arr,$offset,$length=NULL,$preserve_keys=false){ return array_slice($arr,$offset,$length,$preserve_keys); }//从数组中取出一段
    public static function array_chunk($arr,$size,$preserve_keys=false){ return array_chunk($arr,$size,$preserve_keys); }//将一个数组分割成多个
    //  组合
    public static function array_merge($arr1,$arr2){ return array_merge($arr1,$arr2); }//合并一个或多个数组
    public static function array_merge_recursive($arr1,$arr2){ return array_merge_recursive($arr1,$arr2); }//递归地合并一个或多个数组
    //  取值
    public static function array_shift(&$arr){ return array_shift($arr); }//将数组开头的单元移出数组
    public static function array_unshift(&$arr,$var){ return array_unshift($arr,$var); }//在数组开头插入一个或多个单元
    public static function array_pop(&$arr){ return array_pop($arr); }//将数组最后一个单元弹出（出栈）
    public static function array_push(&$arr,$values){ return array_push($arr,$values); }//将一个或多个单元压入数组的末尾（入栈）
    public static function array_rand($arr,$num=1){ return array_rand($arr,$num); }//从数组中随机取出一个或多个单元
    public static function array_column($arr,$column_key,$index_key){ return array_column($arr,$column_key,$index_key); }//返回数组中指定的一列
    //  替换
    public static function array_replace_recursive($arr1,$arr2){ return array_replace_recursive($arr1,$arr2); }//使用传递的数组递归替换第一个数组的元素
    public static function array_replace($arr1,$arr2){ return array_replace($arr1,$arr2); }//使用传递的数组替换第一个数组的元素
    public static function array_splice(&$arr,$offset,$length=0,$replace){ return array_splice($arr,$offset,$length,$replace); }//把数组中的一部分去掉并用其它值取代
    //  反转
    public static function array_reverse($arr,$preserve_keys=false){ return array_reverse($arr,$preserve_keys); }//返回一个单元顺序相反的数组
    //  遍历
    public static function array_filter($arr,$function,$flag=0){ return array_filter($arr,$function,$flag); }//用回调函数过滤数组中的单元
    public static function array_map($function,$arr){ return array_map($function,$arr); }//将回调函数作用到给定数组的单元上
    public static function array_walk(&$arr,$function,$userdata=NULL){ return array_walk($arr,$function,$userdata); }//使用用户自定义函数对数组中的每个元素做回调处理
    public static function array_walk_recursive(&$arr,$function,$userdata=NULL){ return array_walk_recursive($arr,$function,$userdata); }//对数组中的每个成员递归地应用用户函数
    public static function array_reduce($arr,$function,$initial=NULL){ return array_reduce($arr,$function,$initial); }//用回调函数迭代地将数组简化为单一的值
    //  去重
    public static function array_unique($arr,$mode=SORT_STRING){ return array_unique($arr,$mode); }//移除数组中重复的值

}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/15
 * Time: 9:32
 */