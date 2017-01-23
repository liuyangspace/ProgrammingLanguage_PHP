<?php
/**
 * PDO
 *
 * 数据库连:
 *      1,连接异常:如果应用程序不在 PDO 构造函数中捕获异常，zend 引擎采取的默认动作是结束脚本并显示一个回溯跟踪，此回溯跟踪
 *      可能泄漏完整的数据库连接细节，包括用户名和密码。因此有责任去显式（通过 catch 语句）或隐式（通过 set_exception_handler() ）
 *      地捕获异常。
 *      2,持久连接:如果想使用持久连接，必须在传递给 PDO 构造函数的驱动选项数组中设置 PDO::ATTR_PERSISTENT 。如果使用 PDO ODBC
 *      驱动且 ODBC 库支持 ODBC 连接池,建议不要使用持久的 PDO 连接，而是把连接缓存留给 ODBC 连接池层处理。
 * 事务:
 *      1,四大特性（ACID）：原子性（Atomicity）、一致性（Consistency）、隔离性（Isolation）以及持久性（Durability）。
 * 预处理与存储过程:
 *      1,查询仅需解析（或预处理）一次，但可以用相同或不同的参数执行多次。预处理语句占用更少的资源，因而运行得更快。
 *      2,如果应用程序只使用预处理语句，可以确保不会发生SQL 注入。
 * 错误处理:
 *      1,PDO 将只简单地设置错误码，可使用 PDO::errorCode() 和 PDO::errorInfo() 方法来检查语句和数据库对象。
 *      2,除设置错误码之外，PDO 还将发出一条传统的 E_WARNING (程序继续执行) 信息。
 *      3,除设置错误码之外，PDO 还将抛出一个 PDOException 异常类并设置它的属性来反射错误码和错误信息。
 */

namespace LanguageStatement\LanguageExtension\Database\PDO;


class PDO extends \PDO
{
    public static $config=[
        'pdo.dsn.*',// 定义 DSN 别名。
    ];

    public static $dsn=[
        'PDO_MYSQL'=>[// mysql
            'mysql:host=$localhost;port=$port;dbname=$dbname',
            'mysql:unix_socket=/tmp/mysql.sock;dbname=$dbname'
        ],
        'PDO_OCI'=>[// oracle
            'oci:dbname=//$localhost:$port/$dbname;charset=$charset',
        ],
        'PDO_ODBC'=>[// ODBC
            'odbc:$ODBC_DSN;UID=$userName;PWD=$password',
        ],
    ];

    public static $constant=[
        /* 连接属性 */
        // 可读写 (__construct,getAttribute,)
        'PDO::ATTR_AUTOCOMMIT'=>'boolean',//如果此值为 FALSE ，PDO 将试图禁用自动提交以便数据库连接开始一个事务。
        'PDO::ATTR_CASE'=>[//用类似 PDO::CASE_* 的常量强制列名为指定的大小写。
            'PDO::CASE_LOWER',//强制列名小写。
            'PDO::CASE_NATURAL',//保留数据库驱动返回的列名。
            'PDO::CASE_UPPER',//强制列名大写。
        ],
        'PDO::ATTR_ERRMODE'=>[//错误处理
            'PDO::ERRMODE_SILENT',//PDO 将只简单地设置错误码，可使用 PDO::errorCode() 和 PDO::errorInfo() 方法来检查语句和数据库对象。
            'PDO::ERRMODE_WARNING',//除设置错误码之外，PDO 还将发出一条传统的 E_WARNING 信息。
            'PDO::ERRMODE_EXCEPTION',//除设置错误码之外，PDO 还将抛出一个 PDOException 异常类并设置它的属性来反射错误码和错误信息。
        ],
        'PDO::ATTR_ORACLE_NULLS'=>[//在获取数据时将空字符串转换成 SQL 中的 NULL 。
            'PDO::NULL_NATURAL',//不转换。
            'PDO::NULL_EMPTY_STRING',//将空字符串转换成 NULL。
            'PDO::NULL_TO_STRING',//将 NULL 转换成空字符串。
        ],
        'PDO::ATTR_PERSISTENT',//请求一个持久连接，而非创建一个新连接。
        'PDO::ATTR_PREFETCH',//设置预取大小来为你的应用平衡速度和内存使用。并非所有的数据库/驱动组合都支持设置预取大小。
        'PDO::ATTR_TIMEOUT',//设置连接数据库的超时秒数。
        'MYSQL_ATTR_USE_BUFFERED_QUERY',//（在MySQL中可用）： 使用缓冲查询。
        // 只读 (getAttribute,)
        'PDO::ATTR_SERVER_VERSION',//只读属性；返回 PDO 所连接的数据库服务的版本信息。
        'PDO::ATTR_CLIENT_VERSION',//只读属性；返回 PDO 驱动所用客户端库的版本信息。
        'PDO::ATTR_SERVER_INFO',   //只读属性。返回一些关于 PDO 所连接的数据库服务的元信息。
        'PDO::ATTR_CONNECTION_STATUS',//
        'PDO::ATTR_DRIVER_NAME',//返回驱动名称。 列如：mysql
        // 只写
        'PDO::ATTR_DEFAULT_FETCH_MODE'=>[//设置默认的提取模式。
            'PDO::FETCH_LAZY',//将结果集中的每一行作为一个对象返回，此对象的变量名对应着列名。在 PDOStatement::fetchAll() 中无效。
            'PDO::FETCH_ASSOC',//将对应结果集中的每一行作为一个由列名索引的数组返回。
            'PDO::FETCH_NAMED',//将对应结果集中的每一行作为一个由列名索引的数组返回。
            'PDO::FETCH_NUM',//将对应结果集中的每一行作为一个由列号索引的数组返回，从第 0 列开始。
            'PDO::FETCH_BOTH',//将对应结果集中的每一行作为一个由列号和列名索引的数组返回，从第 0 列开始。
            'PDO::FETCH_OBJ',//将结果集中的每一行作为一个属性名对应列名的对象返回。
            'PDO::FETCH_BOUND',//返回 TRUE 且将结果集中的列值分配给通过 PDOStatement::bindParam() 或 PDOStatement::bindColumn() 方法绑定的 PHP 变量。
            'PDO::FETCH_COLUMN',//从结果集中的下一行返回所需要的那一列。
            'PDO::FETCH_CLASS',//返回一个所请求类的新实例，映射列到类中对应的属性名。
            'PDO::FETCH_INTO',//更新一个请求类的现有实例，映射列到类中对应的属性名。
            'PDO::FETCH_FUNC',//允许在运行中完全用自定义的方式处理数据。（仅在 PDOStatement::fetchAll() 中有效）。
            'PDO::FETCH_GROUP',//根据值分组返回。通常和 PDO::FETCH_COLUMN 或 PDO::FETCH_KEY_PAIR 一起使用。
            'PDO::FETCH_UNIQUE',//只取唯一值。
            'PDO::FETCH_KEY_PAIR',//获取一个有两列的结果集到一个数组，其中第一列为键名，第二列为值。
            'PDO::FETCH_CLASSTYPE',//根据第一列的值确定类名。
            'PDO::FETCH_SERIALIZE',//类似 PDO::FETCH_INTO ，但是以一个序列化的字符串表示对象。
            'PDO::FETCH_PROPS_LATE',//设置属性前调用构造函数。自 PHP 5.2.0 起可用。
        ],
        //
        'PDO::ATTR_CURSOR_NAME',//获取或设置使用游标的名称。当使用可滚动游标和定位更新时候非常有用。
        'PDO::ATTR_CURSOR',//选择游标类型。 PDO 当前支持 PDO::CURSOR_FWDONLY 和 PDO::CURSOR_SCROLL。一般为 PDO::CURSOR_FWDONLY，除非确实需要一个可滚动游标。
        'PDO::ATTR_STATEMENT_CLASS',//设置从PDOStatement派生的用户提供的语句类。 不能用于持久的PDO实例。需要 array(string 类名, array(mixed 构造函数的参数))。
        'PDO::ATTR_FETCH_CATALOG_NAMES',//将包含的目录名添加到结果集中的每个列名前面。目录名和列名由一个小数点分开（.）。此属性在驱动层面支持，所以有些驱动可能不支持此属性。
        'PDO::ATTR_FETCH_TABLE_NAMES',//将包含的表名添加到结果集中的每个列名前面。表名和列名由一个小数点分开（.）。此属性在驱动层面支持，所以有些驱动可能不支持此属性。
        'PDO::ATTR_STRINGIFY_FETCHES'=>'boolean',//提取的时候将数值转换为字符串
        'PDO::ATTR_MAX_COLUMN_LEN',//
        'PDO::ATTR_EMULATE_PREPARES'=>'boolean',//启用或禁用预处理语句的模拟。 有些驱动不支持或有限度地支持本地预处理。


    ];

    public function __construct($dsn,$username,$passwd,$options){parent::__construct($dsn,$username,$passwd,$options);}
    public static function getAvailableDrivers(){return parent::getAvailableDrivers();}//返回一个可用驱动的数组
    // attribute
    public function getAttribute($attribute){return parent::getAttribute($attribute);}// 取回一个数据库连接的属性
    public function setAttribute($attribute,$value){return parent::setAttribute($attribute,$value);}//设置属性(效果并不等价于在构造函数中设置)
    //
    public function exec($statement){parent::exec($statement);}//执行一条 SQL 语句，并返回受影响的行数
    public function query($statement,$mode=PDO::ATTR_DEFAULT_FETCH_MODE,$arg3=null){parent::query($statement, $mode, $arg3);}//执行一条 SQL 语句，并返回 PDOStatement 实例的结果集
    public function prepare($statement,$driver_options=[]){return parent::prepare($statement,$driver_options);}//Prepares a statement for execution and returns a statement object
    public function quote($string, $parameter_type = PDO::PARAM_STR){return parent::quote($string, $parameter_type);}//Quotes a string for use in a query.
    public function lastInsertId($name = null){return parent::lastInsertId($name);}//返回最后插入行的ID或序列值
    // transaction
    public function inTransaction(){return parent::inTransaction();}//检查是否在一个事务内
    public function beginTransaction(){return parent::beginTransaction();}//启动一个事务 ,关闭自动提交模式。
    public function rollBack(){return parent::rollBack();}//回滚一个事务
    public function commit(){return parent::commit();}//提交一个事务,据库连接返回到自动提交模式直到下次调用 PDO::beginTransaction() 开始一个新的事务为止。
    // error
    public function errorCode(){return parent::errorCode();}//获取跟数据库句柄上一次操作相关的 SQLSTATE
    public function errorInfo(){return parent::errorInfo();}//Fetch extended error information associated with the last operation on the database handle
}