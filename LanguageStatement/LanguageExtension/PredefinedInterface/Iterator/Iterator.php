<?php
/**
 * Iterator（迭代器）接口
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Iterator;


interface Iterator extends \Iterator,\Traversable
{

    public function current ();//返回当前元素
    public function key ();//返回当前元素的键
    public function next ();//向前移动到下一个元素
    public function rewind ();//返回到迭代器的第一个元素
    public function valid ();//检查当前位置是否有效

}