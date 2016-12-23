<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/23
 * Time: 17:07
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