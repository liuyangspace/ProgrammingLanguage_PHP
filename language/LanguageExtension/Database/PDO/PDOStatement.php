<?php
/**
 * PDOStatement
 * 代表一条预处理语句，并在该语句被执行后代表一个相关的结果集。
 * 由 PDO:prepare，PDO:query 实例化
 */

namespace LanguageStatement\LanguageExtension\Database\PDO;


class PDOStatement extends \PDOStatement implements \Traversable
{
    /* 属性 */
    public $queryString;
    /* 常量 参见 PDO */

    // attribute
    public function getAttribute($attribute){return parent::getAttribute($attribute);}//检索一个语句属性
    public function setAttribute($attribute,$value){return parent::setAttribute($attribute,$value);}//设置一个语句属性
    // 预处理与存储过程
    public function bindParam($parameter,&$variable,$data_type=PDO::PARAM_STR,$length=null,$driver_options=null){return parent::bindParam($parameter,$variable,$data_type,$length,$driver_options);}//将 参数 绑定至 变量名，
    public function bindValue($parameter,$value,$data_type=PDO::PARAM_STR){return parent::bindValue($parameter,$value,$data_type);}//将 值 传递给 参数，
    public function debugDumpParams(){return parent::debugDumpParams();}//打印一条 SQL 预处理命令
    public function setFetchMode($mode){return parent::setFetchMode($mode);}//为语句设置默认的获取模式。
    // 状态变换（ 预处理 <-> 结果集 ）
    public function execute($input_parameters=[]){return parent::execute($input_parameters);}//执行一条预处理语句
    public function closeCursor(){return parent::closeCursor();}//关闭游标，使语句能再次被执行。
    // 结果集
    public function rowCount(){return parent::rowCount();}//返回受上一个 SQL 语句影响的行数
    public function bindColumn($column,&$param,$type=null,$maxlen=null,$driverdata=null){parent::bindColumn($column,$param,$type,$maxlen,$driverdata);}//绑定 列的值 到 变量
    public function columnCount(){return parent::columnCount();}//返回结果集中的列数
    public function fetch($fetch_style=PDO::FETCH_BOTH,$cursor_orientation=PDO::FETCH_ORI_NEXT,$cursor_offset=0){return parent::fetch($fetch_style,$cursor_orientation,$cursor_offset);}//从结果集中获取下一行
    public function fetchAll($fetch_style=PDO::FETCH_BOTH,$fetch_argument=null,$ctor_args=[]){return parent::fetchAll($fetch_style,$fetch_argument,$ctor_args);}//返回一个包含结果集中所有行的数组
    public function fetchColumn($column_number=0){return parent::fetchColumn($column_number);}//从结果集中的下一行返回单独的一列。
    public function fetchObject($class_name="stdClass",$ctor_args=[]){return parent::fetchObject($class_name,$ctor_args);}//获取下一行并作为一个对象返回。
    public function nextRowset(){return parent::nextRowset();}//一些数据库服务支持返回一个以上行集（也被称为结果集）的存储过程。在一个多行集语句句柄中推进到下一个行集
    // error
    public function errorCode(){return parent::errorCode();}//获取跟上一次语句句柄操作相关的 SQLSTATE
    public function errorInfo(){return parent::errorInfo();}//获取跟上一次语句句柄操作相关的扩展错误信息

    // 其他 此函数是实验性的。此函数的表象，包括名称及其相关文档都可能在未来的 PHP 发布版本中未通知就被修改。使用本函数风险自担 。
    public function getColumnMeta($column){parent::getColumnMeta($column);}//返回结果集中一列的元数据

}