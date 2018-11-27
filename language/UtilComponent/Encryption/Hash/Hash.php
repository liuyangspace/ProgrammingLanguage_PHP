<?php
/**
 * Hash
 */

namespace LanguageStatement\UtilComponent\Encryption\Hash;


class Hash
{
    public static $constants=[
        'HASH_HMAC',//
    ];

    public static function hash($algo,$data,$raw_output=false){return hash($algo,$data,$raw_output);}//生成哈希值 （消息摘要）
    public static function hash_file($algo,$filename,$raw_output=false){return hash_file($algo,$filename,$raw_output);}//使用给定文件的内容生成哈希值
    public static function hash_hmac($algo,$data,$key,$raw_output=false){return hash_hmac($algo,$data,$key,$raw_output);}//使用 HMAC 方法生成带有密钥的哈希值
    public static function hash_hmac_file($algo,$filename,$key,$raw_output=false){return hash_hmac_file($algo,$filename,$key,$raw_output);}//使用 HMAC 方法和给定文件的内容生成带密钥的哈希值

    public static function hash_pbkdf2($algo,$password,$salt,$iterations,$length=0,$raw_output=false){return hash_pbkdf2($algo,$password,$salt,$iterations,$length,$raw_output);}//成所提供密码的 PBKDF2 密钥导出


    public static function hash_algos(){return hash_algos();}//返回已注册的哈希算法列表

    public static function hash_equals($known_string,$user_string){return hash_equals($known_string,$user_string);}//防止时序攻击的字符串比较

    public static function hash_init($algo,$options=0,$key=NULL){return hash_init($algo,$options,$key);}//初始化增量哈希运算上下文
    public static function hash_update($context,$data){return hash_update($context,$data);}//向活跃的哈希运算上下文中填充数据
    public static function hash_update_file($hcontext,$filename,$scontext = NULL){return hash_update_file($hcontext,$filename,$scontext);}//从文件向活跃的哈希运算上下文中填充数据
    public static function hash_update_stream($context,$handle,$length=-1){return hash_update_stream($context,$handle,$length);}//从打开的流向活跃的哈希运算上下文中填充数据
    public static function hash_final($context,$raw_output=false){return hash_final($context,$raw_output);}//结束增量哈希，并且返回摘要结果
    public static function hash_copy($context){return hash_copy($context);}//拷贝哈希运算上下文


}