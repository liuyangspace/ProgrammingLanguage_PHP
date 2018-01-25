<?php
/**
 * MethodContainer
 * can add,reset,delete,call,static call this class method
 */

namespace LanguageStatement\UtilComponent\DataType;

use Closure;
use \BadMethodCallException;

trait MethodContainer
{
    /**
     * The registered string macros.
     *
     * @var array
     */
    protected static $methods = [];

    /**
     * getMethod
     *
     * @param $name
     * @return false|Closure
     */
    public static function getMethod($name)
    {
        if(static::hasMethod($name)) return static::$methods[$name];
        else return false;
    }

    /**
     * Register a custom macro.if has,return false.
     *
     * @param  string    $name
     * @param  callable  $method
     * @return void|false
     */
    public static function addMethod($name, callable $method)
    {
        if(static::hasMethod($name)) return false;
        static::$methods[$name] = $method;
        return true;
    }

    /**
     * Register a custom macro.if has,reset.
     *
     * @param  string    $name
     * @param  callable  $method
     * @return void
     */
    public static function setMethod($name, callable $method)
    {
        static::$methods[$name] = $method;
    }

    /**
     * deleteMethod
     *
     * @param $name
     * @return bool
     */
    public static function deleteMethod($name)
    {
        if(static::hasMethod($name)){
            unset(static::$methods[$name]);
            return true;
        }
        return false;
    }
    public static function removeMethod($name)
    {
        return static::deleteMethod($name);
    }

    /**
     * Checks if macro is registered.
     *
     * @param  string  $name
     * @return bool
     */
    public static function hasMethod($name)
    {
        return isset(static::$methods[$name]);
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public static function __callStatic($method, $parameters)
    {
        if (! static::hasMethod($method)) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }

        if (static::$methods[$method] instanceof Closure) {
            return call_user_func_array(Closure::bind(static::$methods[$method], null, static::class), $parameters);
        }

        return call_user_func_array(static::$methods[$method], $parameters);
    }

    /**
     * Dynamically handle calls to the class.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     *
     * @throws \BadMethodCallException
     */
    public function __call($method, $parameters)
    {
        if (! static::hasMethod($method)) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }

        if (static::$methods[$method] instanceof Closure) {
            return call_user_func_array(static::$methods[$method]->bindTo($this, static::class), $parameters);
        }

        return call_user_func_array(static::$methods[$method], $parameters);
    }
}