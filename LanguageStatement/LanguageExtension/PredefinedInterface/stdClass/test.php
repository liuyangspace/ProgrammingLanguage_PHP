<?php
/**
 * stdClass usages(用例)
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\stdClass;

// null 转换为对象
$stdClass=(object)null;
var_dump($stdClass);
// array 转换为对象
$stdClass=(object)array(1,2,3);
var_dump($stdClass);
// 其他类型数据 转换为对象
$stdClass=(object)'test';
var_dump($stdClass);
// 对象 添加成员
$stdClass = new \stdClass();
$stdClass->newPreporty='example';
var_dump($stdClass);
var_dump($stdClass->newPreporty);
