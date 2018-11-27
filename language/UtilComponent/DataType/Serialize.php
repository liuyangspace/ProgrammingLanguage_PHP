<?php
/**
 *
 */

namespace LanguageStatement\UtilComponent\DataType;


class Serialize implements \Serializable
{
    /**
     * serialize() 函数会检查类中是否存在一个魔术方法 __sleep()。
     * 如果存在，该方法会先被调用，然后才执行序列化操作。
     * 此功能可以用于清理对象，并返回一个包含对象中所有应被序列化的变量名称的数组。
     * 如果该方法未返回任何内容，则 NULL 被序列化，并产生一个 E_NOTICE 级别的错误。
     * public array __sleep ( void )
     */
    public function __sleep()
    {
        // TODO: Implement __sleep() method.
    }

    /**
     * __wakeupunserialize() 会检查是否存在一个 __wakeup()方法。
     * 如果存在，则会先调用 __wakeup 方法，预先准备对象需要的资源。
     * __wakeup() 经常用在反序列化操作中，例如重新建立数据库连接，或执行其它初始化操作。
     */
    public function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }
}