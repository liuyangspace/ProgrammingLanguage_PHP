<?php
/**
 * Stomp
 * This extension allows php applications to communicate with any Stomp compliant Message Brokers
 * through easy object oriented and procedural interfaces. » Stomp official site
 *
 * Represents a connection between PHP and a Stomp compliant Message Broker.
 */

namespace LanguageStatement\UtilComponent\Stomp;


class Stomp extends \Stomp
{
    public static $config=[
        'stomp.default_broker',//The default broker URI to use when connecting to the message broker if no other URI is specified.
        'stomp.default_connection_timeout_sec',//The seconds part of the default connection timeout.
        'stomp.default_connection_timeout_usec',//The microseconds part of the default connection timeout.
        'stomp.default_read_timeout_sec',//The seconds part of the default reading timeout.
        'stomp.default_read_timeout_usec',//The microseconds part of the default reading timeout.
    ];

    // 面向对象风格
    // 连接
    public function __construct($broker,$username=null,$password=null,array $headers=null){return parent::__construct($broker,$username,$password,$headers);}//stomp_connect — 打开一个连接
    public function __destruct(){parent::__destruct();}//Closes stomp connection
    // 连接 属性
    public function setReadTimeout($seconds,$microseconds=null){return parent::setReadTimeout($seconds,$microseconds);}//Sets read timeout
    public function etReadTimeout(){return parent::etReadTimeout();}//Gets read timeout
    // 订阅
    public function subscribe($destination,array $headers=null){return parent::subscribe($destination,$headers);}//Registers to listen to a given destination
    public function unsubscribe($destination,array $headers=null){return parent::unsubscribe($destination,$headers);}//Removes an existing subscription
    // 消息
    public function send($destination,$msg,Array $headers=null){return parent::send($destination,$msg,$headers);}//Sends a message
    public function hasFrame(){return parent::hasFrame();}//Indicates whether or not there is a frame ready to read
    public function readFrame($class_name="stompFrame"){return parent::readFrame($class_name);}//Reads the next frame
    public function ack($msg,array $headers=null){return parent::ack($msg,$headers);}//Acknowledges consumption of a message
    // 事物
    public function getSessionId(){return parent::getSessionId();}//Gets the current stomp session ID
    public function begin($transaction_id,array $headers=null){return parent::begin($transaction_id,$headers);}//Starts a transaction
    public function abort($transaction_id,array $headers=null){return parent::abort($transaction_id,$headers);}//Rolls back a transaction in progress
    public function commit($transaction_id,array $headers=null){return parent::commit($transaction_id,$headers);}//Commits a transaction in progress
    // error
    public function error(){return parent::error();}//Gets the last stomp error

    // 过程化风格:
    //
    public static function stomp_connect($broker,$username=null,$password=null,array $headers=null){return stomp_connect($broker,$username,$password,$headers);}//打开一个连接
    public static function stomp_close($link){return stomp_close($link);}//Closes stomp connection
    //
    public static function stomp_set_read_timeout($link,$seconds,$microseconds=null){return stomp_set_read_timeout($link,$seconds,$microseconds);}//Sets read timeout
    public static function stomp_get_read_timeout($link){return stomp_get_read_timeout($link);}//Gets read timeout
    //
    public static function stomp_subscribe($link,$destination,array $headers=null){return stomp_subscribe($link,$destination,$headers);}//Registers to listen to a given destination
    public static function stomp_unsubscribe($link,$destination,array $headers=null){return stomp_unsubscribe($link,$destination,$headers);}//Removes an existing subscription
    //
    public static function stomp_send($link,$destination,$msg,array $headers=null){return stomp_send($link,$destination,$msg,$headers);}//Sends a message
    public static function stomp_has_frame($link){return stomp_has_frame($link);}//Indicates whether or not there is a frame ready to read
    public static function stomp_read_frame($link){return stomp_read_frame($link);}//Reads the next frame
    public static function stomp_ack($link,$msg,array $headers){return stomp_ack($link,$msg,$headers);}//Acknowledges consumption of a message
    //
    public static function stomp_get_session_id($link){return stomp_get_session_id($link);}//Gets the current stomp session ID
    public static function stomp_begin($link,$transaction_id,Array $headers=null){return stomp_begin($link,$transaction_id,$headers);}//Starts a transaction
    public static function stomp_abort($link,$transaction_id,Array $headers=null){return stomp_abort($link,$transaction_id,$headers);}//Rolls back a transaction in progress
    public static function stomp_commit($link,$transaction_id,Array $headers=null){return stomp_commit($link,$transaction_id,$headers);}//Commits a transaction in progress
    //
    public static function stomp_error($link){return stomp_error($link);}//Gets the last stomp error
    /*  */
    public static function stomp_connect_error(){return stomp_connect_error();}//Returns a string description of the last connect error
    public static function stomp_version(){return stomp_version();}//Gets the current stomp extension version
}