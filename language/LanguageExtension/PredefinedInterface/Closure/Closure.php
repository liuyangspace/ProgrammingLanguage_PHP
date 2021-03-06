<?php
/**
 * Closure
 * 匿名函数类，不能用new实例化，
 * 对匿名函数默认实例化此类。
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Closure;


use LanguageStatement\DesignModel\Prototype\Object;

class Closure // extends \Closure    // final class
{
    /*
     * 用于禁止实例化的构造函数
     * $closure = function()use(){};
     */
    private function __construct(){}

    public static function bind(Closure $closure,$new_this,$newscope = 'static'){}//
    public function bindTo($new_this,$newscope = 'static'){}//

    public function __invoke(...$_){}//

}