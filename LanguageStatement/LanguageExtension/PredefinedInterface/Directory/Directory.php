<?php
/**
 * Directory
 * 不能用new实例化，调用 dir() 函数创建
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Directory;


class Directory extends \Directory
{
    /**
     *  属性
     * public string $path ;
     * public resource $handle ;
     */

    public function close($dir_handle){parent::close($dir_handle);}//
    public function read($dir_handle){parent::read($dir_handle);}//
    public function rewind($dir_handle){parent::rewind($dir_handle);}//
}