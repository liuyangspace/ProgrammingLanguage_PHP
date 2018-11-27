<?php
/**
 * anonymous
 */

namespace LanguageStatement\UtilComponent\DataType;


class TestClass{

}

class AnonymousProxy
{
    private $testClassProxy;
    private static $testClassName;

    /**
     * AnonymousProxy constructor.
     * @param $testClass
     */
    public function __construct($testClass)
    {
        $this->testClassProxy = $testClass;
        static::$testClassName = get_class($testClass);
    }

    /**
     * proxy static method
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
        return call_user_func_array([static::$testClassName,$method], $parameters);
    }

    /**
     * proxy method
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->testClassProxy,$method], $parameters);
    }
}

$anonymousproxy = new class extends AnonymousProxy{

};

$proxy = new $anonymousproxy();