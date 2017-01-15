<?php
/**
 * php基础：语言声明
 * php statement：
 *  PHP 标记：<?php 和 ?>，<script language="php"> </script>，短标记 <? 和 ?>，<% 和 %>
 *  注释: // ... ?> , # ... ?> , /* ... *\/
 * 表达式:PHP 是一种面向表达式的语言，从这一方面来讲几乎一切都是表达式。
 *  最基本的表达式形式是常量和变量。
 * 命名空间：
 *  命名空间通过关键字namespace来声明。须在其它所有代码(包括带标记<?php非PHP代码,空白符)之前声明(除 declare 关键字以外).
 *  namespace可用在类，函数等之前(用\分隔)，以表示当前命名空间 或 全局命名空间(无前命名空间声明)
 *  作用域：类（包括抽象类和traits）、接口、函数和常量。
 *  单个文件中定义多个命名空间，建议在声明后使用大括号分隔限定。
 *  分类：非限定名称(不包含前缀的类名称),限定名称(包含前缀的类名称),完全限定名称(包含了全局前缀操作符的名称,以 \ 开头)
 *  使用命名空间：use(导入),as(别名)
 *  后备全局函数/常量：非限定名称解析优先策略是 当前命名空间->全局空间
 * 引用 & :
 *  变量别名，不是指针。引用可在函数传参时修改变量。
 *  unset 一个引用，销毁别名，不影响被引用的变量。
 * 相关缩写:
 *  PHP(PHP: Hypertext Preprocessor,超文本预处理器)
 *  CGI(Common Gateway Interface,公共网关接口),
 *  CLI(Command Line Interface,命令行接口),
 *  SAPI(Server Application Programming Interface,服务端应用编程端口)
 *  PECL(The PHP Extension Community Library,)
 *  PEAR(PHP Extension and Application Repository,PHP 扩展和应用仓库)
 *  SPL(Standard PHP Library,PHP标准库)
 *  POSIX(Portable Operating System Interface,可移植操作系统接口)
 *  DTrace(动态跟踪)
 *
 *  HTTP(HyperText Transfer Protocol)
 *  TCP(Transmission Control Protocol)
 *  UDP(User Datagram Protocol)
 *  ICMP(Internet Control Message Protocol)
 * Reference:
 *  http://php.net/manual/zh/langref.php
 */

namespace LanguageStatement;

class LanguageStatement
{
    //保留字列表

    /**
     * 关键词列表
     */
    public static $keywords = array(
        //输出
        'echo',             'print',
        //流程控制 导入
        'include',          'include_once',     'require',          'require_once',
        //流程控制 分支
        'if',               'endif',            'else',             'elseif',           'switch',
        'case',             'default',          'endswitch',
        //流程控制 重用
        'do',               'while',            'endwhile',         'for',              'endfor',
        'foreach',          'endforeach',       'goto',             'declare',          'enddeclare',
        //多用
        'continue',         'break',            'return',
        'as',               //起别名，foreach,类内部,命名空间
        'use',              //命名空间引用，匿名方法外部参数引入
        //编译控制
        'exit',             'die',              '__halt_compiler',  'eval',
        //类型
        'array',            'function',         'callable',
        //类 操作 修饰
        'namespace',        'instanceof',
        'class',            'abstract',         'interface',        'trait',
        'extends',          'implements',       'insteadof',
        'final',            //修饰类（不被继承），修饰方法（不被覆盖）
        'static',           //后期静态绑定，声明静态 变量、属性、方法，
        'public',           'protected',        'private',
        'try',              'catch',            'throw',
        // 创建
        'var',              'new',              'global',           'const',             'list',
        'clone',            //当对象被复制后，PHP 5 会对对象的所有属性执行一个浅复制（shallow copy）。所有的引用属性(别名,对象,资源等)仍然会是一个指向原来的变量的引用。
        // 运算
        'and',              'or',               'xor',
        'unset',            'isset',            'empty',
        //从PHP 7开始 以下关键字不可被用于类名、接口名和trait名，并且它们被禁止用于命名空间。
        'int',              'float',            'bool',             'string',           'true',
        'false',            'null',
        // 以下关键词已经被建议保留。尽管你仍然可以将它们用于类名、接口名和trait名（以及命名空间），但是考虑到在将来的PHP版本中可能会使用，因此非常不推荐去使用它们。
        'resource',         'object',           'mixed',            'numeric',
    );

    /**
     * PHP 运算符
     */
    public static $Operators = array(
        //按照优先级从高到低列出了运算符。同一行中的运算符具有相同优先级，此时它们的结合方向决定求值顺序。http://php.net/manual/zh/language.operators.precedence.php
        'clone','new',              //clone 和 new
        '[',                        //array()
        '**',                       //求幂
        '++','--','~','(int) (float) (string) (array) (object) (bool)','@', // 递增，递减，按位取反，强制类型转换，错误控制运算符
        'instanceof',               //类型运算符
        '!',                        //逻辑非
        '*','/','%',                //算术运算符
        '+','-','.',                //算术运算符和字符串运算符
        '<<','>>',                  //位运算符
        '<','<=','>','>=',          //比较运算符
        '==','!=','===','!==','<>','<=>',//比较运算符 ( <=> PHP7 )
        '&',                        //按位与和引用
        '^',                        //按位异或
        '|',                        //按位或
        '&&',                       //逻辑与
        '||',                       //逻辑或
        '??',                       //NULL 合并操作符 PHP7开始提供。
        '? :',                      //三元运算符
        '=','+=','-=','*=','**=','/=','.=','%=','&=','|=','^=','<<=','>>=',//赋值运算符
        'and',                      //逻辑与
        'xor',                      //逻辑异或
        'or',                       //逻辑或
    );

    /**
     * PHP 支持 8 种原始数据类型。
     */
    public static $dataTypes = array(
        //四种标量类型
        'boolean',          'integer',          'float',            'string',
        //两种复合类型
        'array',            'object',
        //两种特殊类型
        'resource',         'NULL',
        //伪类型
        'mixed',            'number',           'callback',
    );

    /**
     * 预定义常量(常用部分)
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
        // 内核预定义常量
        'PHP_VERSION'                   =>  PHP_VERSION,            //string
        'PHP_OS'                        =>  PHP_OS,                 //string
        'PHP_SAPI'                      =>  PHP_SAPI,               //string 自 PHP 4.2.0 起可用。参见 php_sapi_name()。
        'PHP_EOL'                       =>  PHP_EOL,                //string php换行符（\n/\r）自 PHP 4.3.10 和 PHP 5.0.2 起可用
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
        // 标准预定义常量 (详见 StandardPredefinedConstants.txt)
        'DIRECTORY_SEPARATOR'           =>  DIRECTORY_SEPARATOR,    //系统分隔符
        // self::$standardPredefinedConstants
    );

    /**
     * 预定义变量
     */
    public static $predefinedVariables = array(
        // 超全局变量
        '$GLOBALS',     //高可用，引用全局作用域中可用的全部变量
        '$_SERVER',     //低可用，服务器和执行环境信息
        '$_GET',        //HTTP GET 变量
        '$_POST',       //HTTP POST 变量
        '$_FILES',      //HTTP 文件上传变量
        '$_REQUEST',    //HTTP Request 变量
        '$_SESSION',    //Session 变量
        '$_ENV',        //环境变量
        '$_COOKIE',     //HTTP Cookies
        //
        '$php_errormsg',//前一个错误信息
        '$HTTP_RAW_POST_DATA',//原生POST数据
        '$http_response_header',//HTTP 响应头
        '$argc',        //传递给脚本的参数数目
        '$argv',        //传递给脚本的参数数组
    );

    /**
     * 魔术方法
     */
    public static $magicMethods = array(
        '__construct()',    //构造函数 void __construct ([ mixed $args [, $... ]] ),
        '__destruct()',     //析构函数 void __destruct ( void )
        '__call()',         //在对象中调用一个不可访问方法时，__call() 会被调用。 public mixed __call ( string $name , array $arguments )
        '__callStatic()',   //在静态上下文中调用一个不可访问方法时，__callStatic() 会被调用。public static mixed __callStatic ( string $name , array $arguments )
        '__get()',          //读取不可访问属性的值时，__get() 会被调用。public mixed __get ( string $name )
        '__set()',          //在给不可访问属性赋值时，__set() 会被调用。public void __set ( string $name , mixed $value )
        '__isset()',        //当对不可访问属性调用 isset() 或 empty() 时，__isset() 会被调用。public bool __isset ( string $name )
        '__unset()',        //当对不可访问属性调用 unset() 时，__unset() 会被调用。public void __unset ( string $name )
        '__sleep()',        /*
                             * serialize() 函数会检查类中是否存在一个魔术方法 __sleep()。
                             * 如果存在，该方法会先被调用，然后才执行序列化操作。
                             * 此功能可以用于清理对象，并返回一个包含对象中所有应被序列化的变量名称的数组。
                             * 如果该方法未返回任何内容，则 NULL 被序列化，并产生一个 E_NOTICE 级别的错误。
                             * public array __sleep ( void )
                             */
        '__wakeup()',       //经常用在反序列化操作中，例如重新建立数据库连接，或执行其它初始化操作。void __wakeup ( void )
        '__toString()',     //__toString() 方法用于一个类被当成字符串时应怎样回应。public string __toString ( void )
        '__invoke()',       //当尝试以调用函数的方式调用一个对象时，__invoke() 方法会被自动调用。mixed __invoke ([ $... ] )
        '__set_state()',    //自 PHP 5.1.0 起当调用 var_export() 导出类时，此静态 方法会被调用。static object __set_state ( array $properties )
        '__clone()',        //当复制完成时，如果定义了 __clone() 方法，则新创建的对象（复制生成的对象）中的 __clone() 方法会被调用，可用于修改属性的值（如果有必要的话）。void __clone ( void )
        '__debugInfo()',    //This method is called by var_dump() when dumping an object to get the properties that should be shown. array __debugInfo ( void )
        '__autoload()',     //spl_autoload_register() 提供了一种更加灵活的方式来实现类的自动加载。因此，不再建议使用 __autoload() 函数，在以后的版本中它可能被弃用。
    );

    /**
     * 预定义类和接口
     */
    public static $predefinedClasses = array(
        'Exception',                    // 所有异常的基类。
        'ErrorException',               // 错误异常。
        'php_user_filter',
        'Generator',                    // 生成器类 Generator 对象不能通过 new 实例化.
        'Traversable',                  //（遍历）接口 ,检测一个类是否可以使用 foreach 进行遍历的接口。
        'Iterator',                     //（迭代器）接口 ,可在内部迭代自己的外部迭代器或类的接口。
        'IteratorAggregate',            //（聚合式迭代器）接口 ,创建外部迭代器的接口。
        'ArrayAccess',                  //（数组式访问）接口  ,提供像访问数组一样访问对象的能力的接口。
        'Serializable',                 //（序列化）接口  ,实现此接口的类将不再支持 __sleep() 和 __wakeup()。
        'Closure',                      // 接口  ,用于代表 匿名函数 的类。
        //
        'final',
        'static',
        'self',
        'parent',
        // PHP7
        'ArithmeticError',
        'AssertionError',
        'DivisionByZeroError',
        'Error',
        'Throwable',
        'ParseError',
        'TypeError',
    );
    public static $extensionInterface = [
        'Reflector',//
        'DateTimeInterface',//
        'JsonSerializable',//影响json_encode
        'SessionHandlerInterface',
        'Countable',
    ];
    public static $extensionClasses = [
        'stdClass',
        '__PHP_Incomplete_Class',//无方法的类，反序列化时的默认类（没有找到该对象的类的定义）
        //date time
        'DateTime',
        'DatePeriod',
        'DateInterval',
        'DateTimeImmutable',
        'DateTimeZone',
        // class interface extension method function property
        'Reflection',
        'ReflectionClass',
        'ReflectionObject',
        'ReflectionException',
        'ReflectionExtension',
        'ReflectionZendExtension',
        'ReflectionFunction',
        'ReflectionMethod',
        'ReflectionFunctionAbstract',
        'ReflectionProperty',
        'ReflectionParameter',
        // directory file
        'Directory',
        'finfo',
        // SPL date structure
        'SplDoublyLinkedList',
        'SplStack',
        'SplQueue',
        'SplHeap',
        'SplMaxHeap',
        'SplMinHeap',
        'SplPriorityQueue',
        'SplFixedArray',
        'SplObjectStorage',
        // SPL interface
        'OuterIterator',
        'RecursiveIterator',
        // session 会话管理器
        'SessionHandler',
    ];


    /**
     * 判断是否为PHP关键字
     * @param string $wordString 要验证的关键字
     * @return boolean [ true:是关键字，false:不是关键字]
     */
    public function isKeywords ($wordString){
        if(in_array((string)$wordString,self::$keywords,true)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 获取PHP关键字
     * Array getKeywords( void )
     */
    public function getKeywords (){ return self::$keywords; }

    /**
     * 判断是否为PHP预定义常量
     * @param string $wordString 要验证的关键字
     * @return boolean [ true:是预定义常量，false:不是预定义常量]
     */
    public function isPredefinedConstants ($wordString){
        return array_key_exists((string)$wordString,self::$predefinedConstants);
    }

    /**
     * 获取PHP预定义常量
     * Array getPredefinedConstants( void )
     */
    public function getPredefinedConstants (){ return self::$predefinedConstants; }

    /**
     * 判断是否为PHP预定义类和接口
     * @param mixed $wordString 要验证的类或接口
     * @return boolean [ true:是预定义类和接口，false:不是预定义类和接口]
     */
    public function isPredefinedClasses ($wordString){
        if(is_object($wordString)){
            $wordString = get_class($wordString);
        }
        if(in_array((string)$wordString,self::$predefinedClasses,true)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 获取PHP预定义类和接口
     * @return array [预定义类和接口]
     */
    public function getPredefinedClasses (){ return self::$predefinedClasses; }

}

/**
 * Created by PhpStorm.
 * User: liuyang
 * Git: https://github.com/liuyangspace
 * Date: 2016/12/8
 * Time: 10:32
 */