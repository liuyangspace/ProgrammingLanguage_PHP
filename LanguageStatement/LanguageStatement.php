<?php

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/8
 * Time: 10:32
 * Description: php语言声明
 * Reference:
 *  http://php.net/manual/zh/reserved.php,
 *  http://php.net/manual/zh/language.types.intro.php
 */

class LanguageStatement
{
    //保留字列表

    /*
     * 关键词列表
     */
    public static $keywords = array(
        '__halt_compiler',  'abstract',         'and',              'array',            'as',
        'break',            'callable',         'case',             'catch',            'class',
        'clone',            'const',            'continue',         'declare',          'default',
        'die',              'do',               'echo',             'else',             'elseif',
        'empty',            'enddeclare',       'endfor',           'endforeach',       'endif',
        'endswitch',        'endwhile',         'eval',             'exit',             'extends',
        'final',            'for',              'foreach',          'function',         'global',
        'goto',             'if',               'implements',       'include',          'include_once',
        'instanceof',       'insteadof',        'interface',        'isset',            'list',
        'namespace',        'new',              'or',               'print',            'private',
        'protected',        'public',           'require',          'require_once',     'return',
        'static',           'switch',           'throw',            'trait',            'try',
        'unset',            'use',              'var',              'while',            'xor',
        //从PHP 7开始 以下关键字不可被用于类名、接口名和trait名，并且它们被禁止用于命名空间。
        'int',              'float',            'bool',             'string',           'true',
        'false',            'null',
        // 以下关键词已经被建议保留。尽管你仍然可以将它们用于类名、接口名和trait名（以及命名空间），但是考虑到在将来的PHP版本中可能会使用，因此非常不推荐去使用它们。
        'resource',         'object',           'mixed',            'numeric',
    );

    /*
     * 预定义常量
     */
    public static $predefinedConstants = array(
        // 魔术常量 ,编译时常量
        '__CLASS__'                     =>  __CLASS__,      //文件中的当前行号。
        '__DIR__'                       =>  __DIR__,        //文件的完整路径和文件名。
        '__FILE__'                      =>  __FILE__,       //文件所在的目录。
        '__FUNCTION__'                  =>  __FUNCTION__,   //函数名称（PHP 4.3.0 新加）。
        '__LINE__'                      =>  __LINE__,       //类的名称（PHP 4.3.0 新加）。
        '__METHOD__'                    =>  __METHOD__,     //Trait 的名字（PHP 5.4.0 新加）。
        '__NAMESPACE__'                 =>  __NAMESPACE__,  //类的方法名（PHP 5.0.0 新加）。
        '__TRAIT__'                     =>  __NAMESPACE__,  //当前命名空间的名称（区分大小写）。
        //内核预定义常量
        'PHP_VERSION'                   =>  PHP_VERSION,            //string
        'PHP_OS'                        =>  PHP_OS,                 //string
        'PHP_SAPI'                      =>  PHP_SAPI,               //string 自 PHP 4.2.0 起可用。参见 php_sapi_name()。
        'PHP_EOL'                       =>  PHP_EOL,                //string 自 PHP 4.3.10 和 PHP 5.0.2 起可用
        'PHP_INT_MAX'                   =>  PHP_INT_MAX,            //(integer) 自 PHP 4.4.0 和 PHP 5.0.5 起可用
        'PHP_INT_SIZE'                  =>  PHP_INT_SIZE,           //(integer) 自 PHP 4.4.0 和 PHP 5.0.5 起可用
        'DEFAULT_INCLUDE_PATH'          =>  DEFAULT_INCLUDE_PATH,   //(string)
        'PEAR_INSTALL_DIR'              =>  PEAR_INSTALL_DIR,       //(string)
        'PEAR_EXTENSION_DIR'            =>  PEAR_EXTENSION_DIR,     //(string)
        'PHP_EXTENSION_DIR'             =>  PHP_EXTENSION_DIR,      //(string)
        'PHP_PREFIX'                    =>  PHP_PREFIX,             //(string) 自 PHP 4.3.0 起可用
        'PHP_BINDIR'                    =>  PHP_BINDIR,             //(string)
        'PHP_DATADIR'                   =>  PHP_DATADIR,            //(string)
        'PHP_SYSCONFDIR'                =>  PHP_SYSCONFDIR,         //(string)
        'PHP_LOCALSTATEDIR'             =>  PHP_LOCALSTATEDIR,      //(string)
        'PHP_CONFIG_FILE_PATH'          =>  PHP_CONFIG_FILE_PATH,   //(string)
        'PHP_CONFIG_FILE_SCAN_DIR'      =>  PHP_CONFIG_FILE_SCAN_DIR,//(string)
        'PHP_SHLIB_SUFFIX'              =>  PHP_SHLIB_SUFFIX,       //(string) 自 PHP 4.3.0 起可用
        'PHP_OUTPUT_HANDLER_START'      =>  PHP_OUTPUT_HANDLER_START,//(integer)
        'PHP_OUTPUT_HANDLER_CONT'       =>  PHP_OUTPUT_HANDLER_CONT,//(integer)
        'PHP_OUTPUT_HANDLER_END'        =>  PHP_OUTPUT_HANDLER_END, //(integer)
        'E_ERROR'                       =>  E_ERROR,                //(integer)
        'E_WARNING'                     =>  E_WARNING,              //(integer)
        'E_PARSE'                       =>  E_PARSE,                //(integer)
        'E_NOTICE'                      =>  E_NOTICE,               //(integer)
        'E_CORE_ERROR'                  =>  E_CORE_ERROR,           //(integer)
        'E_CORE_WARNING'                =>  E_CORE_WARNING,         //(integer)
        'E_COMPILE_ERROR'               =>  E_COMPILE_ERROR,        //(integer)
        'E_COMPILE_WARNING'             =>  E_COMPILE_WARNING,      //(integer)
        'E_USER_ERROR'                  =>  E_USER_ERROR,           //(integer)
        'E_USER_WARNING'                =>  E_USER_WARNING,         //(integer)
        'E_USER_NOTICE'                 =>  E_USER_NOTICE,          //(integer)
        'E_ALL'                         =>  E_ALL,                  //(integer)
        'E_STRICT'                      =>  E_STRICT,               //(integer) 从 PHP 5.0.0 起有效
        '__COMPILER_HALT_OFFSET__'      =>  __COMPILER_HALT_OFFSET__,//(integer) 从 PHP 5.0.0 起有效
        //标准预定义常量 (详见 标准预定义常量.txt)
    );

    /*
     * 预定义类和接口
     */
    public static $predefinedClasses = array(
        'exception',        'ErrorException',   'php_user_filter',  'Closure',          'Generator',
        'static',           'self',             'parent',
        // PHP7
        'ArithmeticError',  'AssertionError',   'DivisionByZeroError','Error',          'Throwable',
        'ParseError',       'TypeError',
    );

    /*
     * PHP 支持 8 种原始数据类型。
     */
    protected static $dataTypes = array(
        //四种标量类型
        'boolean',          'integer',          'float',            'string',
        //两种复合类型
        'array',            'object',
        //两种特殊类型
        'resource',         'NULL',
        //伪类型
        'mixed',            'number',           'callback',
    );

    /*
     * 判断是否为PHP关键字
     * @param string $word 要验证的关键字
     * @return boolean [ true:是关键字，false:不是关键字]
     */
    public function isKeywords($wordString){
        if(in_array((string)$wordString,self::$keywords,true)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 获取PHP关键字
     * @return Array [关键字]
     */
    public function getKeywords(){
        return self::$keywords;
    }

    /*
     * 判断是否为PHP预定义常量
     * @param string $word 要验证的关键字
     * @return boolean [ true:是预定义常量，false:不是预定义常量]
     */
    public function isPredefinedConstants($wordString){
        return array_key_exists((string)$wordString,self::$predefinedConstants);
    }

    /*
     * 获取PHP预定义常量
     * @return Array [预定义常量]
     */
    public function getPredefinedConstants(){
        return self::$predefinedConstants;
    }

    /*
     * 判断是否为PHP预定义类和接口
     * @param mix $word 要验证的类或接口
     * @return boolean [ true:是预定义类和接口，false:不是预定义类和接口]
     */
    public function isPredefinedClasses($wordString){
        if(is_object($wordString)){
            $wordString = get_class($wordString);
        }
        if(in_array((string)$wordString,self::$predefinedClasses,true)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 获取PHP预定义类和接口
     * @return Array [预定义类和接口]
     */
    public function getPredefinedClasses(){
        return self::$predefinedClasses;
    }
}