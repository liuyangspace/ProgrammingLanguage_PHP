<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/23
 * Time: 17:18
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Closure;

$var1=1;

class Class1
{
    public function test(){
    }
}

class Class2
{
    public $publicPro;
    protected $protectedPro;

    public function __construct($param1=1,$param2=2)
    {
        $this->publicPro=$param1;
        $this->protectedPro=$param2;
    }

    public function getClosure(){
        return function(){return $this->protectedPro;};
    }
}
// 创建Closure
$closure=function($param=2)use($var1){
    return 'var:'.$var1.',param:'.$param;
};
// 使用Closure
echo $closure()."\n";
//  Closure绑定到对象
$closure2=$closure->bindTo(new Class1());
echo $closure2()."\n";
// 从对象获取Closure
$closure3=(new Class2(null,"closure param 3!"))->getClosure();
echo $closure3()."\n";
//  Closure绑定$this作用域
$closure4=\Closure::bind($closure3,new Class2(null,"closure param 4!"));
echo $closure4()."\n";
//  Closure绑定$this,访问 public作用域
$closure7=function($param=2)use($var1){
    return $this->publicPro;
};
$closure6=\Closure::bind($closure7,new Class2("closure public param 5!"));
echo $closure6()."\n";
//  Closure绑定$this作用域,访问 protect,private作用域
$closure5=function($param=2)use($var1){
    return $this->protectedPro;
};
$closure6=\Closure::bind($closure5,new Class2(null,"closure private param 6!"),__NAMESPACE__.'\Class2');
echo $closure6()."\n";