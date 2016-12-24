<?php
/**
 *  Generator 生成器类，不能用new实例化
 *  yield 是生成器函数的核心关键字,yield会返回一个值给循环调用此生成器的代码并且只是暂停执行生成器函数。
 * 生成器提供了一种更容易的方法来实现简单的对象迭代，相比较定义类实现 Iterator 接口的方式，性能开销和复杂性大大降低。
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Generator;


class Generator //extends \Generator implements \Iterator   //final class
{

    public function current(){}
    public function key(){}
    public function next(){}
    public function rewind(){}
    public function send($value){}
    public function throw(\Exception $exception){}
    public function valid(){}
    public function __wakeup(){}
}