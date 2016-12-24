<?php
/**
 * Generator usages(用例)
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Generator;


function generatorFunction($start,$end,$step=1)
{
    for ($i = $start; $i <= $end; $i+=$step) {
        //yield 生成器关键字，每次调用函数，返回数据并暂停函数
        yield $i;
    }
}
// 实例化
$generator=generatorFunction(1,5);
// 生成器
var_dump($generator);
// 重置指针 如果迭代已经开始了，这里会抛出一个异常。
$generator->rewind();
var_dump($generator->current());
// 当前指针 指向的数据
var_dump('value:'.$generator->current());
// 指针移动(迭代)的次数
var_dump('key:'.$generator->key());
//  遍历
foreach($generator as $value){
    var_dump($value);
}
// 检查迭代器是否被关闭
var_dump($generator->valid());
// 移动指针
$generator->next();
var_dump($generator->current());

