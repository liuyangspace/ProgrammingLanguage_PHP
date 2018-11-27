<?php
/**
 * Directory usages(用例)
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Directory;

// 实例化
$directory=dir(__DIR__.'/..');
// 生成器
var_dump($directory);
// 遍历
while($dir=$directory->read()){
    var_dump($dir);
}
// 重置指针
$directory->rewind();
var_dump($directory->read());
// 关闭
var_dump('close:'.$directory->close());


