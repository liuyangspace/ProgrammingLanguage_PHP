<?php
/**
 * Closure 匿名函数类，不能用new实例化
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Closure;


use LanguageStatement\DesignModel\Prototype\Object;

class Closure //extends \Closure    // final class
{
    /*
     * 用于禁止实例化的构造函数
     * Closure::__construct ( void )
     * $closure = function()use(){};
     */

    public static function bind(Closure $closure,$new_this,$newscope = 'static'){}//
    public function bindTo($new_this,$newscope = 'static'){}//

}