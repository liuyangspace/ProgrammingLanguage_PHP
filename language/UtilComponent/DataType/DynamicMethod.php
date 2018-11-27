<?php
/**
 * Dynamic Method,can change this method action.
 */

namespace LanguageStatement\UtilComponent\DataType;

use Closure;
use BadMethodCallException;

trait DynamicMethod
{
    /**
     * The method name;
     *
     * @var string
     */
    protected static $methodName = 'dynamicMethod';

    /**
     * The method;
     *
     * @var Closure|null
     */
    protected static $method = null;

    /**
     * whether check the method name
     *
     * @var bool
     */
    protected static $strict = false;

    /**
     * setMethodName.
     *
     * @param string $methodName
     * @return void
     */
    public static function setMethodName($methodName='dynamicMethod')
    {
        if($methodName){
            static::$methodName=$methodName;
        }
    }

    /**
     * getMethodName.
     *
     * @return string
     */
    public static function getMethodName()
    {
        return static::$methodName;
    }

    /**
     * setMethod.
     *
     * @param callable $method
     * @param null|string $methodName
     */
    public static function setMethod(callable $method,$methodName=null)
    {
        static::$method=$method;
        static::setMethodName($methodName);
    }

    /**
     * getMethod.
     *
     * @return Closure|null
     */
    public static function getMethod()
    {
        return static::$method;
    }

    /**
     * hasMethod.
     *
     * @return bool
     */
    public static function hasMethod()
    {
        return !(static::$method===null);
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
        if ( static::$strict && $method!=static::$methodName) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }

        if (static::$method instanceof Closure) {
            return call_user_func_array(Closure::bind(static::$method, null, static::class), $parameters);
        }

        return call_user_func_array(static::$method, $parameters);
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
        if ( static::$strict && $method!=static::$methodName) {
            throw new BadMethodCallException("Method {$method} does not exist.");
        }

        if (static::$method instanceof Closure) {
            return call_user_func_array(static::$method->bindTo($this, static::class), $parameters);
        }

        return call_user_func_array(static::$method, $parameters);
    }
}