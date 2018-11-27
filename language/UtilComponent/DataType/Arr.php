<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/28
 * Time: 10:14
 */

namespace LanguageStatement\UtilComponent\DataType;


class Arr implements \ArrayAccess,\Countable,\Iterator
{
    /**
     * Determine whether the given value is array accessible.
     *
     * @param  mixed  $value
     * @return bool
     */
    public static function is_array($value)
    {
        return is_array($value) || $value instanceof \ArrayAccess;
    }


    /**
     * @param $offset to modify
     * @param $value new value
     */
    function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    /**
     * @param $offset to retrieve
     * @return value at given offset
     */
    function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    /**
     * @param $offset to delete
     */
    function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    /**
     * @param $offset to check
     * @return whether the offset exists.
     */
    function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    /**
     * @return the number the global function count() should show
     */
    function count()
    {
        // TODO: Implement count() method.
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}