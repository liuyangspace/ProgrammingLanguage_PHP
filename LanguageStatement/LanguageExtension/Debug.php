<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/31
 * Time: 17:55
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class Debug
{
    //其余部分参见 DataType,Process
    public static $configs=[
        'assert.active',//激活 assert() 断言评测。
        'assert.bail',//失败的断言将中止脚本。
        'assert.warning',//失败的断言将中止脚本。
        'assert.callback',//失败的断言将调用用户的函数
        'assert.quiet_eval',//在 断言表达式执行时 error_reporting() 使用当前的设置。
        'assert.exception',//在断言（assert）失败时产生 AssertionError 异常。

        'enable_dl',//该指令仅对 Apache 模块版本的 PHP 有效。针对每个虚拟机或每个目录开启或关闭 dl() 动态加载 PHP 模块。
    ];

    //debug 调试
    public static function assert_options($key,$value){return assert_options($key,$value);}// 设置断言标志
    public static function assert($assertion,$exception){return assert($assertion,$exception);}//检查指定的 assertion 并在结果为 FALSE 时采取适当的行动。

}