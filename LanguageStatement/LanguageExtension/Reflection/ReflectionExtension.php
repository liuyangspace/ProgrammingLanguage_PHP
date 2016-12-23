<?php
/**
 * 扩展类
 */

namespace LanguageStatement\LanguageExtension\Reflection;


class ReflectionExtension extends \ReflectionExtension
{
    //final private void __clone ( void )
    public function __construct($name){parent::__construct($name);}
    public function __toString(){parent::__toString();}
    public static function export($name, $return = false){parent::export($name, $return);}//导出可以被反射的扩展。输出格式同CLI argument --re [extension].
    public function info(){parent::info();}//输出扩展信息
    public function getClasses(){parent::getClasses();}//从扩展中获取类列表。
    public function getClassNames(){parent::getClassNames();}//获取类名称
    public function getConstants(){parent::getConstants();}//获取常量
    public function getDependencies(){parent::getDependencies();}//获取依赖，包括必需的、冲突的、可选的。
    public function getFunctions(){parent::getFunctions();}//获取扩展中定义的函数。
    public function getINIEntries(){parent::getINIEntries();}//获取扩展在ini配置文件中的配置。
    public function isPersistent(){parent::isPersistent();}//返回扩展是否持久化载入
    public function isTemporary(){parent::isTemporary();}//返回扩展是否是临时载入
    //
    public function getName(){parent::getName();}//获取扩展名称
    public function getVersion(){parent::getVersion();}//获取扩展版本号

}