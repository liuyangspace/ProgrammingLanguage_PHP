<?php
/**
 * Traversable（遍历）接口
 * 检测一个类是否可以使用 foreach 进行遍历的接口。
 * 这是一个无法在 PHP 脚本中实现的内部引擎接口。IteratorAggregate 或 Iterator 接口可以用来代替它。
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\IteratorI;


interface Traversable extends \Traversable
{

}