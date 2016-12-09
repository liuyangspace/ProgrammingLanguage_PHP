<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/9
 * Time: 11:20
 */
require_once 'DataType.php';

$a='123';
$a = DataType::gettype($a);
var_dump($a);