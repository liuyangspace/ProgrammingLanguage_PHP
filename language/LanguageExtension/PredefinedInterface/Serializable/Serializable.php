<?php
/**
 * Serializable 序列化接口
 * 实现此接口的类将不再支持 __sleep() 和 __wakeup()。
 * serialize()，unserialize() 方法 不会调用 __destruct()，__construct()。（自定义调用）
 */

namespace LanguageStatement\LanguageExtension\PredefinedInterface\Serializable;


interface Serializable extends \Serializable
{

    public function serialize();
    public function unserialize($serialized);

}